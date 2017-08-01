@extends('form::bootstrap.layout')

@section('element')
    @foreach($options as $optionItem)
        <label class="radio-inline">
            <input type="radio" name="{{$name}}" value="{{$optionItem['key']}}" {{$optionItem['key']==$value ? 'checked' : null}}  @include('form::bootstrap.includes.attribute',['attributes'=>$attributes,'option'=>$optionItem])> {{$optionItem['value']}}
        </label>
    @endforeach
@endsection