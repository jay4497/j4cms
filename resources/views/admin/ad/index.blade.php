@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('ad manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\AdController@getUpdate', ['act' => 'add']) }}">{{ lang('ad add') }}</a>
        </p>
        <form class="form-inline" method="GET" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="key" id="key" placeholder="{{ lang('search key') }}" />
            </div>
            <button type="submit" class="btn btn-sm btn-default">{{ lang('search') }}</button>
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <td colspan="6">
                <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}" />
                <label class="checkbox-inline">
                    <input type="checkbox" id="check-all" />{{ lang('select all') }}
                </label>&nbsp;&nbsp;
                <a href="javascript:;" class="btn btn-default btn-sm" onclick="batchDel('{{ url('admin/ad') }}')">{{ lang('delete') }}</a>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>{{ lang('title') }}({{ lang('orderby') }})</th>
            <th>{{ lang('type') }}</th>
            <th>{{ lang('image') }}</th>
            <th>{{ lang('position') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody id="check-trace">
        @forelse($ads as $ad)
        <tr>
            <td><input type="checkbox" class="check" value="{{ $ad->id }}" /></td>
            <td>{{ $ad->title }}({{ $ad->order }})</td>
            <td>{{ $ad->type }}</td>
            <td><img src="{{ $ad->image }}" /></td>
            <td>{{ $ad->position_id }}</td>
            <td>
                <a href="{{ action('Admin\AdController@getUpdate', ['act' => 'edit', 'id' => $ad->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\AdController@getUpdate', ['act' => 'delete', 'id' => $ad->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="6">{{ lang('no data') }}</td></tr>
        @endforelse
        <tr><td colspan="6">{{ $ads->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop