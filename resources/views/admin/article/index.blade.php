@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('article manage') }}</div>
    <div class="panel-body">
        @if(\Request::has('from'))
        <p class="bg-info">
            @if(\Request::input('status') =='success')
                {{ lang('delete success') }}
            @else
                {{ lang('delete failed') }}
            @endif
        </p>
        @endif
        <p>
            <input type="checkbox" class="checkbox" />全选
            <a href="">{{ lang('delete') }}</a>
            {{ lang('move to') }}
            <select>
                @foreach($nodes as $node)
                <option value="{{ $node->id }}">{{ $node->name }}</option>
                    @foreach($node->children as $snode)
                    <option value="{{ $snode->id }}">- {{ $snode->name }}</option>
                        @foreach($snode->children as $tnode)
                        <option value="{{ $tnode->id }}">-- {{ $tnode->name }}</option>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
            {{ lang('mark to') }}
            <select>
                <option value="1">{{ lang('hidden') }}</option>
                <option value="2">{{ lang('show') }}</option>
                <option value="3">{{ lang('hot') }}</option>
                <option value="4">{{ lang('recommend') }}</option>
                <option value="5">{{ lang('show index') }}</option>
            </select>
        </p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>id</th>
            <th>{{ lang('article title') }}({{ lang('orderby') }})</th>
            <th>{{ lang('article node') }}</th>
            <th>{{ lang('article status') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($articles as $article)
        <tr>
            <td><input type="checkbox" class="checkbox" /> </td>
            <td>{{ $article->title }}({{ $article->order }})</td>
            <td>{{ nodeChainStr($article->node->id) }}</td>
            <td>{{ $article->status }}</td>
            <td>
                <a href="{{ action('Admin\ArticleController@getUpdate', ['act' => 'edit', 'id' => $article->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\ArticleController@getUpdate', ['act' => 'del', 'id' => $article->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        @endforelse
        <tr><td colspan="5">{{ $articles->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop