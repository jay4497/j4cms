<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="post" action="{{ url('rs/upload/image') }}">
    <div class="form-group">
        <div class="col-sm-6">
            <input type="file" name="upload_file" class="form-control" />
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-sm btn-default">{{ lang('upload') }}</button>
    </div>
</form>
</body>
</html>