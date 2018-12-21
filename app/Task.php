<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['card_id', 'jo_id', 'name', 'description', 'created_by', 'assigned_to', 'assigned_by'];

    public function joborder() {
        return $this->belongsTo('App\JobOrder', 'jo_id');
    }

    public function card() {
        return $this->belongsTo('App\Card');
    }

    public function created_by() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function assigned_by() {
        return $this->belongsTo('App\User', 'assigned_by');
    }

    public function assigned_to() {
        return $this->belongsTo('App\User', 'assigned_to');
    }

    public function files() {
        return $this->hasMany('App\TaskFile');
    }
}