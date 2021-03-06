<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Conversation extends Model
{
    use Sluggable, Uuids;

    public $incrementing = false;

    protected $fillable = ['name', 'slug', 'type', 'created_by'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function created_by() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function users() {
        return $this->belongsToMany('App\User')->withPivot('added_by')->withTimestamps();
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }
}
