@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('show feedback') }}</div>
    <div class="panel-body">
        <p>
            <a href="{{ url('admin/feedback') }}"><< {{ lang('back') }}</a>
            <button type="button" class="btn btn-default">{{ lang('delete') }}</button>
            <button type="button" class="btn btn-default">{{ lang('hidden') }}</button>
        </p>
        <h3>{{ $feedback->title }}<span>{{ $feedback->created_at }}</span></h3>
        <p>{{ $feedback->phone }}, {{ $feedback->email }}</p>
        <p>{{ $feedback->content }}</p>
        <p>from: {{ $feedback->ip }}, {{ $feedback->agent }}</p>
    </div>
</div>
@stop