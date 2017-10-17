<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentRequest extends Model
{
    protected $fillable = ['component_id', 'request_id'];
}
