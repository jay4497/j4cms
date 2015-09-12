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