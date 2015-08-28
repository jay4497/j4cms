@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('feedback manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
        <p>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <a href="{{ action('Admin\FeedBackController@getUpdate', ['act' => 'add']) }}">{{ lang('feedback add') }}</a>
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
                <a class="btn btn-default btn-sm" href="javascript:;" onclick="batchDel('{{ url('admin/feedback') }}')">{{ lang('delete') }}</a>&nbsp;&nbsp;
                {{ lang('mark to') }}
                <select name="_status" onchange="batchUpdate(this, '{{ url('admin/feedback/batch') }}')">
                    <option value="1">{{ lang('have read') }}</option>
                    <option value="0">{{ lang('not read') }}</option>
                    <option value="2">{{ lang('hidden') }}</option>
                </select>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>{{ lang('title') }}</th>
            <th>{{ lang('email') }}</th>
            <th>{{ lang('status') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody id="check-trace">
        @forelse($feedbacks as $feedback)
            <tr>
                <td><input type="checkbox" class="check" value="{{ $feedback->id }}" /></td>
                <td><a href="">{{ $feedback->title }}</a></td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->status }}</td>
                <td>
                    <a href="{{ action('Admin\FeedBackController@getUpdate', ['act' => 'hidden', 'id' => $feedback->id]) }}">{{ lang('hidden') }}</a>
                    <a href="{{ action('Admin\FeedBackController@getUpdate', ['act' => 'delete', 'id' => $feedback->id]) }}">{{ lang('delete') }}</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">{{ lang('no data') }}</td></tr>
        @endforelse
            <tr><td colspan="5">{{ $feedbacks->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop