@foreach($attributes as $key=>$value)
    @if(isset($option) && $key === 'id')
        {{$key}}="{{$value}}-{{$option['key']}}"
    @else
        {{$key}}="{{$value}}"
    @endif
@endforeach
