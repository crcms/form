<div class="form-group">
    <label>{{$label}}</label>

    <div>
        @foreach($option as $key=>$op)
        <label class="checkbox-inline">
            <input @foreach($attribute as $k=>$v) {{$k}}="{{$v}}" @endforeach type="checkbox" name="{{$name}}[{{$valueKey[$key] ?? null}}]" value="{{$key}}" {{in_array($key,$value) ? 'checked' : null}}> {{$op}}
        </label>
        @endforeach
    </div>

</div>