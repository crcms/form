@extends('form::bootstrap.layout')
@section('element')
    <div class="input-group">
        @if($icon)
            <div class="input-group-addon"><i class="{{$icon}}"></i></div>
        @endif
        <input type="{{$type}}" @include('form::bootstrap.includes.attribute',['attributes'=>$attributes]) name="{{$name}}" value="{{$value}}">
    </div>
@endsection


{{--@component('form::bootstrap.layout',['display'=>$display,'tip'=>$tip])--}}
    {{--<div class="input-group">--}}
    {{--@if($icon)--}}
    {{--<div class="input-group-addon"><i class="{{$icon}}"></i></div>--}}
    {{--@endif--}}
    {{--<input @include('form::bootstrap.includes.attribute',['attributes'=>$attributes]) name="{{$name}}" value="{{$value}}">--}}
    {{--</div>--}}
{{--@endcomponent--}}