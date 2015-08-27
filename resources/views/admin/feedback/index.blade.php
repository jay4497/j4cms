@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('feedback manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
        <p>
            <input type="checkbox" />{{ lang('select all') }}
            <a class="btn btn-default" href="javascript:;">{{ lang('delete') }}</a>
            {{ lang('mark to') }}
            <select>
                <option value="1">{{ lang('have read') }}</option>
                <option value="0">{{ lang('not read') }}</option>
                <option value="2">{{ lang('hidden') }}</option>
            </select>
        </p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>{{ lang('title') }}</th>
            <th>{{ lang('email') }}</th>
            <th>{{ lang('status') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($feedbacks as $feedback)
            <tr>
                <td><input type="checkbox" value="{{ $feedback->id }}" /></td>
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