@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ \Request::route('act') == 'add'? lang('ad add'): lang('ad edit') }}</div>
    <div class="panel-body">
        @include('layouts.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="title" class="control-label col-sm-2">{{ lang('title') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($ad)? $ad->title: old('title') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-2">{{ lang('description') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description">{{ isset($ad)? $ad->description: old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="control-label col-sm-2">{{ lang('type') }}</label>
                <div class="col-sm-3">
                    <select class="form-control" id="type" name="type">
                        @foreach(config('j4.ad_type') as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="control-label col-sm-2">{{ lang('image') }}</label>
                <div class="col-sm-4">
                    <input class="" type="file" id="image" name="image" />
                    <input type="hidden" id="get-image" name="get_image" value="{{ isset($ad)? $ad->image: old('image') }}" />
                </div>
                <div class="col-sm-2">
                    <a href="javascript:;" class="btn btn-sm btn-default" onclick="imageUpload('image', '{{ url('rs/upload/image') }}');">{{ lang('upload') }}</a>
                </div>
            </div>
            <div class="form-group">
                <label for="width" class="control-label col-sm-2">{{ lang('image size') }}</label>
                <div class="col-sm-2">
                    <input type="text" id="width" class="form-control" name="width" value="{{ isset($ad)? $ad->width: old('width') }}" />
                </div>
                <div class="col-sm-2">
                    <input type="text" id="height" name="height" class="form-control" value="{{ isset($ad)? $ad->height: old('height') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="code" class="control-label col-sm-2">{{ lang('code') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="code" name="code">{{ isset($ad)? $ad->code: old('code') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="position_id" class="control-label col-sm-2">{{ lang('ad position') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="position_id" name="position_id" value="{{ isset($ad)? $ad->position_id: old('position_id') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="order" class="control-label col-sm-2">{{ lang('orderby') }}</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="order" name="order" value="{{ isset($ad)? $ad->order: old('order') }}" />
                </div>
            </div>
            <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-primary">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@stop