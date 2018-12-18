<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['name', 'board_id', 'sprint_id', 'created_by'];

    public function board() {
        return $this->belongsTo('App\Board');
    }

    public function sprint() {
        return $this->belongsTo('App\Sprint');
    }

    public function created_by() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function tasks() {
        return $this->hasMany('App\Task');
    }
}
