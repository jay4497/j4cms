<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ lang('cms admin') }}</title>
    <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="col-md-3 center-block" style="float:none;">
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ lang('login') }}
        </div>
        <div class="panel-body">
        @include('partials.error')
        <form method="POST" action="{{ url('auth/login') }}">
            <div class="form-group">
                <label class="sr-only">{{ lang('user name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="{{ lang('input name') }}" />
            </div>
            <div class="form-group">
                <label class="sr-only">{{ lang('user password') }}</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="{{ lang('input password') }}" />
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="checkbox" id="remember" name="remember">
                    {{ lang('remember me') }}
                    {{ csrf_field() }}
                </label>
            </div>
            <button class="btn btn-primary" type="submit">{{ lang('login') }}</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>