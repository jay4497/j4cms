<link rel="stylesheet" href="{{ asset('assets/editor/themes/default/default.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/editor/plugins/code/prettify.css') }}" />
<script charset="utf-8" src="{{ asset('assets/editor/kindeditor.min.js') }}"></script>
<script charset="utf-8" src="{{ asset('assets/editor/lang/zh_CN.js') }}"></script>
<script charset="utf-8" src="{{ asset('assets/editor/plugins/code/prettify.js') }}"></script>
<script>
    KindEditor.ready(function(K) {
        var editor1 = K.create('textarea[name="content"]', {
            // cssPath : '../plugins/code/prettify.css',
            minHeight: 450,
            uploadJson : '{{ asset('php/upload_json.php') }}',
            fileManagerJson : '{{ asset('php/file_manager_json.php') }}',
            allowFileManager : true
        });
        prettyPrint();
    });
</script>