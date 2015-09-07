@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('user manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\UserController@getUpdate', ['act' => 'add']) }}">{{ lang('user add') }}</a>
        </p>
        <form class="form-inline" method="get" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="key" id="key" placeholder="{{ lang('search key') }}" />
            </div>
            <button type="submit" class="btn btn-sm btn-default">{{ lang('search') }}</button>
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>{{ lang('user name') }}</th>
            <th>{{ lang('phone') }}</th>
            <th>{{ lang('email') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td><input type="checkbox" value="{{ $user->id }}" /></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ action('Admin\UserController@getUpdate', ['act' => 'edit', 'id' => $user->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\UserController@getUpdate', ['act' => 'delete', 'id' => $user->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        @endforeach
        <tr><td colspan="5">{{ $users->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop