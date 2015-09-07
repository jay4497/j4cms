@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ \Request::route('act') == 'add'? lang('link add'): lang('link edit') }}</div>
    <div class="panel-body">
        @include('layouts.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="title" class="control-label col-sm-2">{{ lang('title') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($link)? $link->title: old('title') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-2">{{ lang('description') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description">{{ isset($link)? $link->description: old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="control-label col-sm-2">{{ lang('url') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="url" name="url" value="{{ isset($link)? $link->url: old('url') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="control-label col-sm-2">{{ lang('image') }}</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="image" id="image" />
                    <input type="hidden" id="get-image" />
                </div>
                <div class="col-sm-2">
                    <input type="button" class="btn btn-sm btn-default" onclick="imageUpload('image', '{{ url('rs/upload/image') }}');" value="{{ lang('upload') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="order" class="control-label col-sm-2">{{ lang('orderby') }}</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="order" name="order" value="{{ isset($link)? $link->order: old('order') }}" />
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-primary">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@stop