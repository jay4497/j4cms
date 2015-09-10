<?php

/**
 * Translations
 * @param $text
 * @return string
 */
function lang($text){
    return trans('j4.'.$text);
}

/**
 * Flash data to the session
 * @param array $data
 * @return void
 */
function j4flash($data){
    if(is_array($data)){
        foreach($data as $k => $v){
            \Session::flash($k, $v);
        }
    }
}

/**
 * Display the node's parent and children in the string
 * @param array $chain
 * @return string
 */
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

/**
 * Get the node's properties of depth & thread based on it's parent's id
 * @param $parent_id
 * @return array
 */
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