<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = 'feedback';

    protected $fillable = ['title', 'content', 'phone', 'email', 'ip', 'agent', 'status'];

    public function scopeShowByStatus($query, $status){
        return $query->where('status', $status)
                    ->orderBy('id', 'desc');
    }
}
