<link rel="stylesheet" href="{{static_asset('vendor/editor/css/editormd.min.css')}}" />
<div id="editormd">
    <textarea style="display:none;" name="{{$name}}">{{$value}}</textarea>
</div>
<script src="https://pandao.github.io/editor.md/examples/js/jquery.min.js"></script>
<script src="{{static_asset('vendor/editor/editormd.min.js')}}"></script>
<script>
    $(function(){
        testEditor = editormd("editormd", {
            width: "100%",
            height: 300,
            codeFold : true,
            //syncScrolling : false,
            //saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
            //searchReplace : true,
            //watch : false,                // 关闭实时预览
            //htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启
            //toolbar  : false,             //关闭工具栏
            //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
            emoji : true,
            taskList : true,
            tocm            : true,         // Using [TOCM]
            tex : true,                   // 开启科学公式TeX语言支持，默认关闭
            flowChart : true,             // 开启流程图支持，默认关闭
            sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
            //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
            //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
            //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
            //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
            //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
            imageUpload : false,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "./php/upload.php",
            path    : "{{static_asset('vendor/editor/lib/')}}",
            @foreach($attribute as $k=>$v)
            {{$k}}:'{{$v}}',
            @endforeach
        });
    })

</script>