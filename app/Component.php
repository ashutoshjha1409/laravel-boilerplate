<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['name', 'type', 'owner', 'description', 'status', 'raw_data'];

    public function requests()
    {
        return $this->belongsToMany('App\CmpRequest');
    }
}
