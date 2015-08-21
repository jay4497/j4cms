<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ad';

    protected $fillable = ['title', 'description', 'url', 'type', 'image', 'code', 'width', 'height', 'position_id', 'start_show', 'end_show', 'order'];

    /**
     * show list of ads that show by an image
     * @param $query
     * @return mixed
     */
    public function scopeImageAd($query){
        return $query->where('type', '0')
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    /**
     * show list of ads that show by some codes
     * @param $query
     * @return mixed
     */
    public function scopeCodeAd($query){
        return $query->where('type', '1')
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    /**
     * show list of ads being actived now
     * @param $query
     * @return mixed
     */
    public function scopeActivedAd($query){
        return $query->where('start_show', '<=', \Carbon::now())
                    ->where('end_show', '>=', \Carbon::now())
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    /**
     * show list of ads that have been timeout
     * @param $query
     * @return mixed
     */
    public function scopeTimeOutAd($query){
        return $query->where('end_show', '<', \Carbon::now())
                    ->orderBy('order', 'asc')
                    ->orderby('id', 'desc');
    }

    /**
     * show list of ads that have been not started to show
     * @param $query
     * @return mixed
     */
    public function scopeNoShowedAd($query){
        return $query->where('start_show', '>', \Carbon::now())
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }

    /**
     * show list of ads all in one position_id
     * @param $query
     * @param $position
     * @return mixed
     */
    public function scopeGroupAd($query, $position){
        return $query->where('position_id', $position)
                    ->orderBy('order', 'asc')
                    ->orderBy('id', 'desc');
    }
}
