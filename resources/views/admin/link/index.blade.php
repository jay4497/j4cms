@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('link manage') }}</div>
    <div class="panel-body">
    @include('layouts.info')
    <p>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <a href="{{ action('Admin\LinkController@getUpdate', ['act' => 'add']) }}">{{ lang('link add') }}</a>
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
            <td colspan="5">
                <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}" />
                <label class="checkbox-inline">
                    <input type="checkbox" id="check-all" />{{ lang('select all') }}
                </label>&nbsp;&nbsp;
                <a class="btn btn-default btn-sm" href="javascript:;" onclick="batchDel('{{ url('admin/link') }}')">{{ lang('delete') }}</a>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>{{ lang('link title') }}</th>
            <th>{{ lang('link url') }}</th>
            <th>{{ lang('link image') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody id="check-trace">
        @forelse($links as $link)
        <tr>
            <td><input type="checkbox" class="check" value="{{ $link->id }}" /></td>
            <td>{{ $link->title }}</td>
            <td>{{ $link->url }}</td>
            <td><img src="{{ $link->image }}" /></td>
            <td>
                <a href="{{ action('Admin\LinkController@getUpdate', ['act' => 'edit', 'id' => $link->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\LinkController@getUpdate', ['act' => 'delete', 'id' => $link->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">{{ lang('no data') }}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@stop