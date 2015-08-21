<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'node_id',
        'user_id',
        'type',
        'title',
        'seo_title',
        'description',
        'keywords',
        'outline',
        'content',
        'order',
        'views',
        'status',
        'recommend',
        'hot',
        'show_index'
    ];

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function node(){
        return $this->belongsTo('App\Node');
    }

    public function scopeShowIndex($query){
        return $query->where('show_index', 1)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    public function scopeRecommends($query){
        return $query->where('recommend', 1)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    public function scopeHots($query){
        return $query->where('hot', 1)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    public function scopeShowOrNot($query, $flag){
        return $query->where('status', $flag)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    public function scopeGroup($query, $type){
        return $query->where('type', $type)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }
}
