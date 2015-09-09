<?php

function lang($text){
    return trans('j4.'.$text);
}

function nodeChainStr($chain){
    $result = '';
    foreach ($chain as $c) {
        if($c instanceof \App\Node){
            $result .= '>'.$c->name;
        }else{
            $result .= gettype($c).gettype($chain);
        }
    }
    $result = trim($result, '>');
    return $result;
}

function getDepth($parent_id){
    $depth = 0;
    $thread = '/';
    if($parent_id > 0){
        $parent = App\Node::find($parent_id);
        if($parent){
            $depth = $parent->depth + 1;
            $thread = $parent->thread.$parent_id.'/';
        }
    }
    return ['depth' => $depth, 'thread' => $thread];
}