<div class="form-group">
    <label>{{$label}}</label>

        <select name="{{$name}}" @foreach($attribute as $k=>$v) {{$k}}="{{$v}}" @endforeach>
            @foreach($option as $key=>$op)
                <option value="{{$key}}" {{in_array($key,$value) ? 'selected' : null}}>{{$op}}</option>
            @endforeach
        </select>

</div>