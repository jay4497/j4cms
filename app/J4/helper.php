<?php

function lang($text){
    return trans('j4.'.$text);
}

function nodeChainStr($chain){
    $result = '';
    foreach ($chain as $c) {
        if($c instanceof App\Node){
            $result .= '>'.$c->name;
        }
    }
    $result = trim($result, '>');
    return $result;
}