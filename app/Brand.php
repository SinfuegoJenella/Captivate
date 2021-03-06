<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes, Uuids;

    public $incrementing = false;
    
    protected $fillable = ['name', 'contact_person', 'about', 'telephone', 'mobile', 'logo', 'tandem_id'];

    public function tandem() {
        return $this->belongsTo('App\Tandem');
    }

    public function jos() {
        return $this->hasMany('App\JobOrder');
    }
}
