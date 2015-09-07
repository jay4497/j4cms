@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ \Request::route('act') == 'add' ? lang('node add') : lang('node update') }}</div>
    <div class="panel-body">
        @include('layouts.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="parent" class="control-label col-sm-2">{{ lang('parent') }}</label>
                <div class="col-sm-3">
                    <select name="parent" id="parent">
                        <option value="0">{{ lang('top lv') }}</option>
                        @foreach($nodes as $n)
                        <option value="{{ $n->id }}" {{ isset($node)? $node->id == $n->id? 'selected': '': '' }}>{{ $n->name }}</option>
                            @foreach($n->children as $snode)
                            <option value="{{ $snode->id }}" {{ isset($node)? $node->id == $snode->id? 'selected': '': '' }}>- {{ $snode->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">{{ lang('node name') }}</label>
                <div class="col-sm-9">
                    <input type="text" id="name" name="name" class="form-control" value="{{ isset($node) ? $node->name : old('name') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-2">{{ lang('description') }}</label>
                <div class="col-sm-9">
                <textarea id="description" name="description" class="form-control">{{ isset($node) ? $node->description : old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="keywords" class="control-label col-sm-2">{{ lang('keywords') }}</label>
                <div class="col-sm-9">
                <input type="text" name="keywords" id="keywords" class="form-control" value="{{ isset($node) ? $node->keywords : old('keywords') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="control-label col-sm-2">{{ lang('image') }}</label>
                <div class="col-sm-3">
                <input type="file" name="image" id="image" class="form-control" value="{{ isset($node)?$node->image: old('image') }}" />
                <input type="hidden" name="get-image" />
                </div>
                <div class="col-sm-2">
                    <input type="button" class="btn btn-sm btn-default" onclick="imageUpload('image', '{{ url('rs/upload/image') }}');" value="{{ lang('upload') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="show_type" class="control-label col-sm-2">{{ lang('type') }}</label>
                <div class="col-sm-3">
                <select name="show_type" id="show_type">
                    @foreach(config('j4.show_type') as $k => $v)
                        <option value="{{ $k }}" {{ isset($node) ? $node->show_type == $k? 'selected': '': '' }}>{{ lang($v) }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="content_type" class="control-label col-sm-2">{{ lang('ctype') }}</label>
                <div class="col-sm-3">
                <select name="content_type" id="content_type">
                    @foreach(config('j4.content_type') as $k => $v)
                        <option value="{{ $k }}" {{ isset($node)? $node->content_type == $k? 'selected': '': '' }}>{{ lang($v) }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="link" class="control-label col-sm-2">{{ lang('out link') }}</label>
                <div class="col-sm-9">
                <input type="text" id="link" name="link" class="form-control" value="{{ isset($node)? $node->url: old('link') }}" placeholder="{{ lang('input out link') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="path" class="control-label col-sm-2">{{ lang('node path') }}</label>
                <div class="col-sm-3">
                <input type="text" id="path" name="path" class="form-control" value="{{ isset($node)? $node->path: old('path') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="control-label col-sm-2">{{ lang('content') }}</label>
                <div class="col-sm-9">
                <textarea id="content" name="content">{{ isset($node)? $node->content: old('content') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="order" class="control-label col-sm-2">{{ lang('orderby') }}</label>
                <div class="col-sm-3">
                <input type="text" id="order" name="order" class="form-control" value="{{ isset($node)?$node->order: old('order') }}" placeholder="{{ lang('input order') }}" />
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-primary">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@stop