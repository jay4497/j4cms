@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ \Request::route('one') == 'add'? lang('user add'): lang('user edit') }}
    </div>
    <div class="panel-body">
        @include('partials.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">{{ lang('user name') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')? : $user->name }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-sm-2">{{ lang('user password') }}</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label col-sm-2">{{ lang('phone') }}</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone')? : $user->phone }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-sm-2">{{ lang('email') }}</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email')? : $user->email }}" />
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-primary">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@stop