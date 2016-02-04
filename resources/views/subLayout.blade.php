@extends(‘errors.mainLayout')

@section('titleTest', 'subLayout 測試標題')

@section('menu')
    @parent
    subLayout 測試 menu
@endsection


@section('testContent')
    subLayout 測試內容
@endsection