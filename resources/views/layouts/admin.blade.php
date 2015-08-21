<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ lang('cms admin') }}</title>
<link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="col-md-3">
    <h1>{{ lang('') }}</h1>
    <ul class="nav">

    </ul>
</div>
<div class="col-md-9">
    <div class="admin-heading">

    </div>
    @section('content')
    @show
</div>
</body>
</html>