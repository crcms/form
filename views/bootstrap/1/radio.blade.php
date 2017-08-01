<div class="form-group">
    <label>{{$label}}</label>
    @foreach($option as $key=>$op)
    <label class="radio-inline">
        <input @foreach($attribute as $k=>$v) {{$k}}="{{$v}}" @endforeach type="radio" name="{{$name}}" value="{{$key}}" {{$key==$value ? 'checked' : null}}> {{$op}}
    </label>
    @endforeach
</div>