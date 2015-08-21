@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ \Request::route('one') == 'add' ? lang('nav add') : lang('nav edit') }}
        </div>
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal">
                <div class="form-group">
                    <label for="parent" class="control-label col-sm-2">{{ lang('parent') }}</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="parent" id="parent">
                            <option value="0">{{ lang('top lv') }}</option>
                            @include('partials.options.node', ['navs' => $navigates])
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="control-label col-sm-2">{{ lang('title') }}</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title')? : $nav->title }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="url" class="control-label col-sm-2">{{ lang('url') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="url" id="url" value="{{ old('url')? : $nav->url }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">{{ lang('status') }}</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" checked />{{ lang('show') }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" />{{ lang('hidden') }}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="order" class="control-label col-sm-2">{{ lang('orderby') }}</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="order" id="order" value="{{ old('order')? : $nav->order }}" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ lang('submit') }}</button>
            </form>
        </div>
    </div>
@stop