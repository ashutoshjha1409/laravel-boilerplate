<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpRequest extends Model
{
    protected $fillable = ['component_id', 'user_id', 'start_date', 'end_date'];

    protected $table = 'requests';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function components()
    {
        return $this->belongsToMany('App\Component');
    }
}
