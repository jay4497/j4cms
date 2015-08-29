@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('node manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'add']) }}">{{ lang('node add') }}</a>
        </p>
    </div>
    <table class="table">
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
                    @forelse($nodes as $node)
                        <option value="{{ $node->id }}">{{ $node->name }}</option>
                        @foreach($node->children as $snode)
                            <option value="{{ $snode->id }}">- {{ $snode->name }}</option>
                        @endforeach
                    @empty
                        <option value="0">{{ lang('no data') }}</option>
                    @endforelse
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
        <tr>
            <td colspan="5">
                <table class="table">
                    @forelse($node->children as $snode)
                    <tr>
                        <td><input type="checkbox" class="check" /></td>
                        <td>{{ $snode->id }}</td>
                        <td>{{ $snode->name }}({{ $snode->order }})</td>
                        <td>{{ $snode->path }}</td>
                        <td>
                            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'edit', 'id' => $snode->id]) }}">{{ lang('edit') }}</a>
                            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'del', 'id' => $snode->id]) }}">{{ lang('delete') }}</a>
                        </td>
                    </tr>
                    <!-- sub node -->
                    <tr>
                        <td colspan="5">
                            <table class="table">
                                @forelse($snode->children as $tnode)
                                <tr>
                                    <td><input type="checkbox" class="check" /></td>
                                    <td>{{ $tnode->id }}</td>
                                    <td>{{ $tnode->name }}({{ $tnode->order }})</td>
                                    <td>{{ $tnode->path }}</td>
                                    <td>
                                        <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'edit', 'id' => $tnode->id]) }}">{{ lang('edit') }}</a>
                                        <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'del', 'id' => $tnode->id]) }}">{{ lang('delete') }}</a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td>{{ lang('no data') }}</td> </tr>
                                @endforelse
                            </table>
                        </td>
                    </tr>
                    <!-- end sub node -->
                    @empty
                    <tr><td>{{ lang('no data') }}</td></tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <!-- end sub node -->
        @empty
        <tr><td colspan="5">{{ lang('no data') }}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@stop