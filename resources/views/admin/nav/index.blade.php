@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('nav manage') }}</div>
    <div class="panel-body">
        <p>
            &plus; <a href="{{ action('Admin\NavigateController@getUpdate', ['act' => 'add']) }}">{{ lang('nav add') }}</a>
        </p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <td colspan="6">
                <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}" />
                <label class="checkbox-inline">
                    <input type="checkbox" id="check-all" />{{ lang('select all') }}
                </label>
                <button type="button" class="btn btn-default" onclick="batchDel('{{ url('admin/navigate/batch') }}');">{{ lang('delete') }}</button>
                {{ lang('bind to') }}
                <select name="_node" onchange="batchUpdate(this, '{{ url('admin/navigate/batch') }}');">
                    <option value="-7">{{ lang('node') }}</option>
                </select>
                {{ lang('mark to') }}
                <select name="_status" onchange="batchUpdate(this, '{{ url('admin/navigate/batch') }}');">
                    <option value="-7">{{ lang('status') }}</option>
                    <option value="0">{{ lang('hidden') }}</option>
                    <option value="1">{{ lang('show') }}</option>
                </select>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>{{ lang('title') }}({{ lang('orderby') }})</th>
            <th>{{ lang('url') }}</th>
            <th>{{ lang('bind node') }}</th>
            <th>{{ lang('status') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody id="check-trace">
        @forelse($navigates as $nav)
        <tr>
            <td><input type="checkbox" class="check" value="{{ $nav->id }}" /></td>
            <td>{{ $nav->title }}({{ $nav->order }})</td>
            <td>{{ $nav->url }}</td>
            <td>{{ $nav->node->name }}</td>
            <td>{{ $nav->status }}</td>
            <td>
                <a href="{{ action('Admin\NavigateController@getUpdate', ['act' => 'edit', 'id' => $nav->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\NavigateController@getUpdate', ['act' => 'delete', 'id' => $nav->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        <!-- sub nav -->
        @include('layouts.navigate', ['nav' => $nav])
        <!-- end sub nav -->
        @empty
        <tr><td colspan="6">{{ lang('no data') }}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@stop