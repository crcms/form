

<div class="form-group">
    <label>{{$label or null}}</label>
    <input @foreach($attributes as $k=>$v) {{$k}}="{{$v}}" @endforeach name="{{$name}}" value="{{$value or null}}">
    <p>{{$tip or null}}</p>
</div>