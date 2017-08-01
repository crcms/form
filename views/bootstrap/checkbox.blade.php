{{--@if(\CrCms\Form\Elements\AbstractElement::DISPLAY_SHOW == $display)--}}
{{--<div class="form-group">--}}
    {{--<label>{{$label or $name}}</label>--}}
    {{--<div>--}}
        {{--@foreach($options as $key=>$op)--}}
        {{--<label class="checkbox-inline">--}}
            {{--<input @include('form::bootstrap.includes.attribute',['attributes'=>$attributes,'option'=>['key'=>$key,'value'=>$op]]) type="checkbox" name="{{$name}}[{{$key ?? null}}]" value="{{$key}}" {{empty($value) ? null : in_array($key,(array)$value) ? 'checked' : null}}> {{$op}}--}}
        {{--</label>--}}
        {{--@endforeach--}}
    {{--</div>--}}
    {{--<div>{{$tip or null}}</div>--}}
{{--</div>--}}
{{--@endif--}}


@extends('form::bootstrap.layout')

@section('element')
    <div>
        @foreach($options as $key=>$op)
            <label class="checkbox-inline">
                <input @include('form::bootstrap.includes.attribute',['attributes'=>$attributes,'option'=>['key'=>$key,'value'=>$op]]) type="checkbox" name="{{$name}}[{{$key ?? null}}]" value="{{$key}}" {{empty($value) ? null : in_array($key,(array)$value) ? 'checked' : null}}> {{$op}}
            </label>
        @endforeach
    </div>
@endsection