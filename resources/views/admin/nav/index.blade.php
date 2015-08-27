@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('nav manage') }}</div>
    <div class="panel-body">

    </div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>{{ lang('title') }}({{ lang('orderby') }})</th>
            <th>{{ lang('url') }}</th>
            <th>{{ lang('bind node') }}</th>
            <th>{{ lang('status') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($navigates as $nav)
        <tr>
            <td><input type="checkbox" value="{{ $nav->id }}" /></td>
            <td>{{ $nav->title }}({{ $nav->order }})</td>
            <td>{{ $nav->url }}</td>
            <td>{{ $nav->node->name }}</td>
            <td>{{ $nav->order }}</td>
            <td>
                <a href="">{{ lang('edit') }}</a>
                <a href="">{{ lang('delete') }}</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="6">{{ lang('no data') }}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@stop