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
                <label for="node" class="control-label col-sm-2">{{ lang('node') }}</label>
                <div class="col-sm-9">
                    <select id="node" name="node">

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="control-label col-sm-2">{{ lang('title') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($article)? $article->title: old('title') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="seo_title" class="control-label col-sm-2">{{ lang('seo title') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ isset($article)?$article->seo_title: old('seo_title') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-2">{{ lang('description') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description">{{ isset($article)?$article->descrition: old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="keywords" class="control-label col-sm-2">{{ lang('keywords') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="keywords" name="keywords" value="{{ isset($article)?$article->keywords: old('keywords') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="control-label col-sm-2">{{ lang('ctype') }}</label>
                <div class="col-sm-9">
                    <select name="type" id="type">
                        @foreach(config('j4.content_type') as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="outline" class="control-label col-sm-2">{{ lang('outline') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="outline" name="outline"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="control-label col-sm-2">{{ lang('content') }}</label>
                <div class="col-sm-9">
                    <textarea id="content" name="content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">{{ lang('flag') }}</label>
                <div class="col-sm-9">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hot" />{{ lang('hot') }}
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="recommend" />{{ lang('recommend') }}
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="status" />{{ lang('hidden') }}
                    </label>
                    <label>
                        <input type="checkbox" name="show_index" />{{ lang('show index') }}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="order" class="control-label col-sm-2">{{ lang('orderby') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="order" name="order" placeholder="{{ lang('input order') }}" />
                </div>
            </div>
            <button class="btn btn-primary" type="submit">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@stop