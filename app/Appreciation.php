<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
