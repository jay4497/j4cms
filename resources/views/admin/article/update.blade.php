@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ \Request::route('act') == 'add'? lang('article add'): lang('article edit') }}
    </div>
    <div class="panel-body">
        @include('layouts.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="node">{{ lang('node') }}</label>
                <select>

                </select>
            </div>
            <div class="form-group">
                <label for="title">{{ lang('title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($article)? $article->title: old('title') }}" />
            </div>
        </form>
    </div>
</div>
@stop