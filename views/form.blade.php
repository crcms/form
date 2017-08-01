<form action="{{$action}}" method="{{$method}}" @include('form::bootstrap.includes.attribute',['attributes'=>$attributes])>

    @foreach($elements as $element)
        {!! $element !!}
    @endforeach

    <button id="submit">Submit</button>

</form>