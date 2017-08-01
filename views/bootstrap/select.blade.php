@extends('form::bootstrap.layout')

@section('element')
    <select name="{{$name}}" {{$multiple ? 'multiple' : null}}  @include('form::bootstrap.includes.attribute',['attributes'=>$attributes])>
        @if($optionTip)
            <option value="">{{$optionTip}}</option>
        @endif
    @foreach($options as $optionItem)
        <option value="{{$optionItem['key']}}" {{empty($value) ? null : in_array($optionItem['key'],$value) ? 'selected' : null}}>{{$optionItem['value']}}</option>
    @endforeach
    </select>
@endsection