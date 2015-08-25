@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('node manage') }}</div>
    <div class="panel-body">
        @if(\Request::has('from'))
        <p class="bg-info">
            @if(\Request::input('status') == 'success')
            {{ lang('delete success') }}
            @else
            {{ lang('delete failed') }}
            @endif
        </p>
        @endif
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'add']) }}">{{ lang('node add') }}</a>
        </p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <td colspan="5">
                <input type="checkbox" class="checkbox" />{{ lang('select all') }}&nbsp;&nbsp;
                <a class="btn btn-default" href="{{ route('node', ['act' => 'del']) }}">{{ lang('delete') }}</a>&nbsp;&nbsp;
                {{ lang('move to') }}
                <select class="form-control">
                    @forelse($nodes as $node)
                        <option value="{{ $node->id }}">{{ $node->name }}</option>
                        @foreach($node->children as $snode)
                            <option value="{{ $snode->id }}">- {{ $snode->name }}</option>
                        @endforeach
                    @empty
                        <option value="0">{{ lang('no data') }}</option>
                    @endforelse
                </select>
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
        <tbody>
        @forelse($nodes as $node)
        <tr>
            <td><input type="checkbox" class="checkbox" /></td>
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
                        <td><input type="checkbox" class="checkbox" /></td>
                        <td>{{ $snode->id }}</td>
                        <td>{{ $snode->name }}({{ $snode->order }})</td>
                        <td>{{ $snode->path }}</td>
                        <td>
                            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'edit', 'id' => $snode->id]) }}">{{ lang('edit') }}</a>
                            <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'del', 'id' => $snode->id) }}">{{ lang('delete') }}</a>
                        </td>
                    </tr>
                    <!-- sub node -->
                    <tr>
                        <td colspan="5">
                            <table class="table">
                                @forelse($snode->children as $tnode)
                                <tr>
                                    <td><input type="checkbox" class="checkbox" /></td>
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