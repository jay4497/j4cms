<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
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
        <li {{ \Request::is('admin/node*')? 'class=active': '' }}>
            <a href="javascript:;">{{ lang('node manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/node') }}">{{ lang('node list') }}</a></li>
                <li><a href="{{ url('admin/node/update/add') }}">{{ lang('node add') }}</a></li>
            </ul>
        </li>
        <li {{ \Request::is('admin/navigate*')? 'class=active': '' }}>
            <a href="javascript:;">{{ lang('nav manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/navigate') }}">{{ lang('nav list') }}</a></li>
                <li><a href="{{ url('admin/navigate/update/add') }}">{{ lang('nav add') }}</a></li>
            </ul>
        </li>
        <li {{ \Request::is('admin/article*')? 'class=active': '' }}>
            <a href="javascript:;">{{ lang('article manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/article/index/2') }}">{{ lang('news list') }}</a></li>
                <li><a href="{{ url('admin/article/update/2/add') }}">{{ lang('news add') }}</a></li>
                <li><a href="{{ url('admin/article/index/1') }}">{{ lang('product list') }}</a></li>
                <li><a href="{{ url('admin/article/update/1/add') }}">{{ lang('product add') }}</a></li>
            </ul>
        </li>
        <li {{ \Request::is('admin/ad*')? 'class=active': '' }}>
            <a href="javascript:;">{{ lang('ad manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/ad') }}">{{ lang('ad list') }}</a></li>
                <li><a href="{{ url('admin/ad/update/add') }}">{{ lang('ad add') }}</a></li>
            </ul>
        </li>
        <li {{ \Request::is('admin/link*')? 'class=active': '' }}>
            <a href="javascript:;">{{ lang('link manage') }}</a>
            <ul class="nav">
                <li><a href="{{ url('admin/link') }}">{{ lang('link list') }}</a></li>
                <li><a href="{{ url('admin/link/update/add') }}">{{ lang('link add') }}</a></li>
            </ul>
        </li>
        <li {{ \Request::is('admin/feedback*') || \Request::is('admin/user*')? 'class=active': '' }}>
            <a href="javascript:;">{{ lang('others') }}</a>
            <ul class="nav">
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
<script type="text/javascript" src="{{ asset('assets/js/jquery.ajaxfileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>