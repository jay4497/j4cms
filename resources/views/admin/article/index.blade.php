@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('article manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\ArticleController@getUpdate', ['act' => 'add']) }}">{{ lang('article add') }}</a>
        </p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <td colspan="6">
                <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}" />
                <label class="checkbox-inline">
                    <input type="checkbox" id="check-all" />{{ lang('select all') }}
                </label>&nbsp;&nbsp;
                <a class="btn btn-default btn-sm" href="javascript:;" onclick="batchDel('{{ url('admin/article') }}')">{{ lang('delete') }}</a>&nbsp;&nbsp;
                <span>
                {{ lang('move to') }}
                <select name="_node" onchange="batchUpdate(this, '{{ url('admin/article/batch') }}')">
                    @foreach($nodes as $node)
                        <option value="{{ $node->id }}">{{ $node->name }}</option>
                        @foreach($node->children as $snode)
                            <option value="{{ $snode->id }}">- {{ $snode->name }}</option>
                            @foreach($snode->children as $tnode)
                                <option value="{{ $tnode->id }}">-- {{ $tnode->name }}</option>
                            @endforeach
                        @endforeach
                    @endforeach
                </select>&nbsp;&nbsp;
                {{ lang('mark to') }}
                <select name="_status" onchange="batchUpdate(this, '{{ url('admin/article/batch') }}')">
                    <option value="1">{{ lang('hidden') }}</option>
                    <option value="2">{{ lang('show') }}</option>
                    <option value="3">{{ lang('hot') }}</option>
                    <option value="4">{{ lang('recommend') }}</option>
                    <option value="5">{{ lang('show index') }}</option>
                </select>
                </span>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>id</th>
            <th>{{ lang('article title') }}({{ lang('orderby') }})</th>
            <th>{{ lang('article node') }}</th>
            <th>{{ lang('article status') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody id="check-trace">
        @forelse($articles as $article)
        <tr>
            <td><input type="checkbox" class="check" value="{{ $article->id }}" /> </td>
            <td>{{ $article->title }}({{ $article->order }})</td>
            <td>{{ nodeChainStr($article->node->id) }}</td>
            <td>{{ $article->status }}</td>
            <td>
                <a href="{{ action('Admin\ArticleController@getUpdate', ['act' => 'edit', 'id' => $article->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\ArticleController@getUpdate', ['act' => 'del', 'id' => $article->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">{{ lang('no data') }}</td></tr>
        @endforelse
        <tr><td colspan="5">{{ $articles->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop