@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('user manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
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
                <a href="">{{ lang('edit') }}</a>
                <a href="">{{ lang('delete') }}</a>
            </td>
        </tr>
        @endforeach
        <tr><td colspan="5">{{ $users->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop