<div class="form-group">
    <label>{{$label}}</label>
    <textarea type="text" @foreach($attribute as $k=>$v) {{$k}}="{{$v}}" @endforeach name="{{$name}}">{{$value}}</textarea>
</div>