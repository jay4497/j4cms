@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ \Request::route('one') == 1? lang('product'): lang('news') }}{{ \Request::route('two') == 'add'? lang('add'): lang('edit') }}
    </div>
    <div class="panel-body">
        @include('layouts.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="node" class="control-label col-sm-2">{{ lang('node') }}</label>
                <div class="col-sm-3">
                    <select class="form-control" id="node" name="node">
                        @foreach($nodes as $n)
                        <option value="{{ $n->id }}">{{ $n->name }}</option>
                            @foreach($n->children as $snode)
                            <option value="{{ $snode->id }}">- {{ $snode->name }}</option>
                                @foreach($snode->children as $tnode)
                                    <option value="{{ $tnode->id }}">-- {{ $tnode->name }}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="control-label col-sm-2">{{ lang('title') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title')? : $article->title }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="seo_title" class="control-label col-sm-2">{{ lang('seo title') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title')? : $article->seo_title }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-2">{{ lang('description') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description">{{ old('description')? : $article->descrition }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="keywords" class="control-label col-sm-2">{{ lang('keywords') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="keywords" name="keywords" value="{{ old('keywords')? : $article->keywords }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="control-label col-sm-2">{{ lang('ctype') }}</label>
                <div class="col-sm-3">
                    <select class="form-control" name="type" id="type">
                        @foreach(config('j4.content_type') as $k => $v)
                        <option value="{{ $k }}">{{ lang($v) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="control-label col-sm-2">{{ lang('image') }}</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" id="image" name="image" />
                    <input type="hidden" name="get_image" id="get-image" value="{{ old('get_image')? : $article->image }}" />
                </div>
                <div class="col-sm-2">
                    <input type="button" class="btn btn-default" onclick="imageUpload('image', '{{ url('rs/upload/image') }}');" value="{{ lang('upload') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="outline" class="control-label col-sm-2">{{ lang('outline') }}</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="outline" name="outline">{{ old('outline')? : $article->outline }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="control-label col-sm-2">{{ lang('content') }}</label>
                <div class="col-sm-9">
                    <textarea id="content" name="content" class="form-control">{{ old('content')? : $article->content }}</textarea>
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
                    <label class="checkbox-inline">
                        <input type="checkbox" name="show_index" />{{ lang('show index') }}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="views" class="control-label col-sm-2">{{ lang('views') }}</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="views" name="views" value="{{ old('views')? : $article->views }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="order" class="control-label col-sm-2">{{ lang('orderby') }}</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order')? : $article->order }}" placeholder="{{ lang('input order') }}" />
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}" />
            <button class="btn btn-primary" type="submit">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@include('layouts.editor')
@stop