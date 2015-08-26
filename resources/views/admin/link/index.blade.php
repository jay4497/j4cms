@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ lang('link manage') }}</div>
    <div class="panel-body">
    @include('layouts.info')
    <p>
        <input type="checkbox" />{{ lang('select all') }}
        <a class="btn btn-default" href="">{{ lang('delete') }}</a>
    </p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>{{ lang('link title') }}</th>
            <th>{{ lang('link url') }}</th>
            <th>{{ lang('link image') }}</th>
            <th>{{ lang('operate') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($links as $link)
        <tr>
            <td><input type="checkbox" /> </td>
            <td>{{ $link->title }}</td>
            <td>{{ $link->url }}</td>
            <td><img src="{{ $link->image }}" /></td>
            <td>
                <a href="">{{ lang('edit') }}</a>
                <a href="">{{ lang('delete') }}</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">{{ lang('no data') }}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@stop