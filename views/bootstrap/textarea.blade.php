@extends('form::bootstrap.layout')
@section('element')
    <textarea name="{{$name}}" type="text" @include('form::bootstrap.includes.attribute',['attributes'=>$attributes])>{{$value}}</textarea>
@endsection