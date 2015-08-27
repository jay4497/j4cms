@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('ad manage') }}</div>
    <div class="panel-body">
        @include('layouts.info')
    </div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>{{ lang('title') }}({{ lang('orderby') }})</th>
            <th>{{ lang('type') }}</th>
            <th>{{ lang('image') }}</th>
            <th>{{ lang('position') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($ads as $ad)
        <tr>
            <td><input type="checkbox" value="{{ $ad->id }}" /></td>
            <td>{{ $ad->title }}({{ $ad->order }})</td>
            <td>{{ $ad->type }}</td>
            <td><img src="{{ $ad->image }}" /></td>
            <td>{{ $ad->position_id }}</td>
            <td>
                <a href="{{ action('Admin\AdController@getUpdate', ['act' => 'edit', 'id' => $ad->id]) }}">{{ lang('edit') }}</a>
                <a href="{{ action('Admin\AdController@getUpdate', ['act' => 'delete', 'id' => $ad->id]) }}">{{ lang('delete') }}</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="6">{{ lang('no data') }}</td></tr>
        @endforelse
        <tr><td colspan="6">{{ $ads->render() }}</td></tr>
        </tbody>
    </table>
</div>
@stop