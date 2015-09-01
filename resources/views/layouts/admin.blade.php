<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ lang('cms admin') }}</title>
<link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="admin-container">
<button class="btn btn-default hidden-md hidden-lg" type="button" id="collapseMenu">button</button>
<div class="col-md-2 hidden-xs hidden-sm admin-menu">
    <h1>{{ lang('') }}</h1>
    <ul class="nav">
        <li>
            <a href="javascript:;">{{ lang('node manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/node') }}">{{ lang('node list') }}</a></li>
                <li><a href="{{ url('admin/node/update/add') }}">{{ lang('node add') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">{{ lang('nav manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/nav') }}">{{ lang('nav list') }}</a></li>
                <li><a href="{{ url('admin/nav/update/add') }}">{{ lang('nav add') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">{{ lang('article manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/article/index/1') }}">{{ lang('news list') }}</a></li>
                <li><a href="{{ url('admin/article/update/1/add') }}">{{ lang('news add') }}</a></li>
                <li><a href="{{ url('admin/article/index/2') }}">{{ lang('product list') }}</a></li>
                <li><a href="{{ url('admin/article/update/2/add') }}">{{ lang('product add') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">{{ lang('others') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/ad') }}">{{ lang('ad list') }}</a></li>
                <li><a href="{{ url('admin/ad/update/add') }}">{{ lang('ad add') }}</a></li>
                <li><a href="{{ url('admin/link') }}">{{ lang('link list') }}</a></li>
                <li><a href="{{ url('admin/link/update/add') }}">{{ lang('link add') }}</a></li>
                <li><a href="{{ url('admin/feedback') }}">{{ lang('feedback list') }}</a></li>
                <li><a href="{{ url('admin/user') }}">{{ lang('user list') }}</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="col-md-9">
    <div class="admin-heading">

    </div>
    @section('content')
    @show
</div>
</div>
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/ajaxfileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>