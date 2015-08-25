@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ \Request::route('act') == 'add' ? lang('node add') : lang('node update') }}</div>
    <div class="panel-body">
        @include('layouts.error')
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="parent">{{ lang('parent') }}</label>
                <select>
                    <option value="0">{{ lang('top lv') }}</option>
                    @foreach($nodes as $n)
                    <option value="{{ $n->id }}" {{ isset($node)? $node->id == $n->id? 'selected': '': '' }}>{{ $n->name }}</option>
                        @foreach($n->children as $snode)
                        <option value="{{ $snode->id }}" {{ isset($node)? $node->id == $snode->id? 'selected': '': '' }}>- {{ $snode->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ lang('node name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ isset($node) ? $node->name : old('name') }}" />
            </div>
            <div class="form-group">
                <label for="description">{{ lang('description') }}</label>
                <textarea id="description" name="description" class="form-control">{{ isset($node) ? $node->description : old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="keywords">{{ lang('keywords') }}</label>
                <input type="text" name="keywords" id="keywords" class="form-control" value="{{ isset($node) ? $node->keywords : old('keywords') }}" />
            </div>
            <div class="form-group">
                <label for="image">{{ lang('image') }}</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ isset($node)?$node->image: old('image') }}" />
            </div>
            <div class="form-group">
                <label for="show_type">{{ lang('type') }}</label>
                <select>
                    @foreach(config('j4.show_type') as $k => $v)
                        <option value="{{ $k }}" {{ isset($node) ? $node->show_type == $k? 'selected': '': '' }}>{{ lang($v) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content_type">{{ lang('ctype') }}</label>
                <select>
                    @foreach(config('j4.content_type') as $k => $v)
                        <option value="{{ $k }}" {{ isset($node)? $node->content_type == $k? 'selected': '': '' }}>{{ lang($v) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="link">{{ lang('out link') }}</label>
                <input type="text" id="link" name="link" class="form-control" value="{{ isset($node)? $node->url: old('link') }}" placeholder="{{ lang('input out link') }}" />
            </div>
            <div class="form-group">
                <label for="path">{{ lang('node path') }}</label>
                <input type="text" id="path" name="path" class="form-control" value="{{ isset($node)? $node->path: old('path') }}" />
            </div>
            <div class="form-group">
                <label for="content">{{ lang('content') }}</label>
                <textarea id="content" name="content">{{ isset($node)? $node->content: old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="order">{{ lang('orderby') }}</label>
                <input type="text" id="order" name="order" class="form-control" value="{{ isset($node)?$node->order: old('order') }}" placeholder="{{ lang('input order') }}" />
            </div>
            <button type="submit" class="btn btn-primary">{{ lang('submit') }}</button>
        </form>
    </div>
</div>
@stop