@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('node manage') }}</div>
    <div class="panel-body">
        @include('partials.info')
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'add']) }}">{{ lang('node add') }}</a>
        </p>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <td colspan="5">
                <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}" />
                <label class="checkbox-inline">
                    <input type="checkbox" id="check-all" />{{ lang('select all') }}
                </label>&nbsp;&nbsp;
                <a class="btn btn-default btn-sm" href="javascript:;" onclick="batchDel('{{ url('admin/node') }}')">{{ lang('delete') }}</a>&nbsp;&nbsp;
                <span>
                {{ lang('move to') }}
                <select name="_parent" onchange="batchUpdate(this, '{{ url('admin/node/batch') }}')">
                    <option value="-7">{{ lang('node') }}</option>
                    @include('partials.options.node', ['nodes' => $nodes])
                </select>
                </span>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>id</th>
            <th>{{ lang('node name') }}({{ lang('orderby') }})</th>
            <th>{{ lang('node path') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody id="check-trace">
        @forelse($nodes as $node)
        <tr>
            <td><input type="checkbox" class="check" /></td>
            <td>{{ $node->id }}</td>
            <td>{{ $node->name }}({{ $node->order }})</td>
            <td>{{ $node->path }}</td>
            <td>
                <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'edit', 'id' => $node->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'del', 'id' => $node->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        <!-- sub node -->
        @include('partials.node', ['node' => $node])
        <!-- end sub node -->
        @empty
        <tr><td colspan="5">{{ lang('no data') }}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@stop