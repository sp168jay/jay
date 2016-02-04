<?php
//use DB;
//use Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ["as" => "home", function () {
    return view('index');
}]);

Route::get('about', ["as" => "about", function () {
    return view('about');
}]);

Route::get('blog', ["as" => "blog", function () {
    return view('blog');
}]);

Route::get('contact', ["as" => "contact", function () {
    return view('contact');
}]);

Route::get('vendorWelcome', ["as" => "vendorWelcome", function () {
    return view('vendor.vendorWelcome');
}]);

Route::get('subLayout',function(){
   return view('subLayout'); 
});

Route::get('API/fileUpload/',function(){
   return view('fileUpload'); 
});

Route::post('API/fileUploadGo',function(){
//    $file = Request::input('user_file');
//    $fileName = \Carbon\Carbon::now().".".Request::file('user_file')->getClientOriginalExtension();
//    $fileName = str_replace(":","-",$fileName);
//    $fileName = str_replace(" ","_",$fileName);
    
    if(Request::hasFile('user_file'))
    {
//        return "上傳成功～";
        if(Request::file('user_file')->isValid())
        {
//            Request::file('user_file')->move(".",$fileName);
            $fileName = Request::file('user_file')->getRealPath();
            $image = Image::make($fileName)->encode('png', 100);
            
            $photo = \App\Models\Photo::find(1);
            $photo->data = $image;
            $photo->save();
            
//            $user = new \App\Models\User;
//            $user->data = file_get_contents($fileName)->encode('png',80);
//            $user->save();
            
//            return view('fileUploadSuccess',['user_file'=>$fileName]);
//            return redirect("API/fileUploadSuccess/")->with('fileName',$fileName);
            
            $data = \App\Models\Photo::find(1);
            $response = Response::make($data->data, 200);
            $response->header('Content-Type', 'image/jpeg');
            return $response;
        }
        else
        {
            return "上傳失敗...";
        }
    }
    else
    {
        return "上傳失敗...";
    }
});

Route::get('API/fileUploadSuccess/{fileName}',["as" => "fileUploadSuccess", function ($fileName) {
   return view('fileUploadSuccess',['user_file' => $fileName]);
}]);

Route::get('welcome', ["as" => "welcome", function () {
    return view('welcome');
    
//    $randomInt = rand(1,99);
//    
//    DB::insert("INSERT INTO student(name,no) VALUES('麥克','$randomInt')");
//    
//    $varFromDB = DB::select('select * from student');
//    
//    return var_dump($varFromDB);
//    $charactorName = DB::character_set_name();
//        return "目前連結的編碼是:$charactorName<br>";
}]);

Route::get("dataInput/{data}", ["as" => "Input", function($data){
    return "你輸入的是：$data";
}]);

Route::get("dataInputOptional/{data?}", ["as" => "InputOptional", function($data = null){
    return "你輸入的是：$data";
}]);

Route::get("dataInputMulti/{data} - {data2}", ["as" => "InputMulti", function($data, $data2){
    return "你輸入的是：$data, $data2";
}]);

Route::get('API/user_id={user_id}', ["as" => "API/user_id=", function ($user_id) {
    return \App\Models\User::find($user_id);
}]);

Route::get('API/all', ["as" => "API/all", function () {
    return \App\Models\User::all();
}]);

Route::get('API/all_asc', ["as" => "API/all", function () {
//    return \App\Models\User::where('id','>',0)->orderBy('user_name','asc')->get();
    $photos = \App\Models\Photo::where('id','>',0)->orderBy('by_user','asc')->get();
    return view('fileUploadSuccess',['datas' => $photos]);
}]);

Route::get('API/email={email}', ["as" => "API/all", function ($email) {
//    return \App\Models\User::find($user_id)->toJson();
    
//    return \App\Models\User::find($user_id)->user_name;
    
//    return \App\Models\User::where('id','like','%yahoo%')->get();
//    return \App\Models\User::where('email','like','%yahoo%')->get()->toJson();
    
//    return \App\Models\User::where('email','like','%yahoo%')->orderBy('email','desc')->get();
    
    return \App\Models\User::where('email','like',"%".$email."%")->get();
//    return \App\Models\User::where('email','like','%yahoo%')->get()->count();
}]);

Route::get('API/email', ["as" => "API/all", function () {//asc,desc
    return App\Models\User::where('email','like','%yahoo%')->orderBy('email','desc')->get();
}]);

Route::get('API/getPhotosFrom({user})', ["as" => "API/all", function ($user) {
    
    return App\Models\User::where('user_name','=',$user)->photos()->get();
}]);

Route::get('API/PhotosFrom{user}', ["as" => "API/all", function ($user) {
    $photos = App\Models\User::where('user_name','=',$user)->first()->photos;//找到之後，取得第一筆，然後執行 model 中的 photos()
    return view('photosFromUser',['datas' => $photos]);//回傳一個陣列
}]);

Route::get('API/{user}FromPhotos', ["as" => "API/all", function ($user) {
    $user = App\Models\Photo::where('by_user','=',$user)->first()->user;//找到之後，取得第一筆，然後執行 model 中的 user()
//    dd($user);//類似 php 的 var_dump
    return view('userFromPhotos',['data' => $user]);//回傳一筆資料，不是陣列
}]);




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
