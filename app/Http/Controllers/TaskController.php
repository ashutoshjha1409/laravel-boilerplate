<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\User;

class TaskController extends Controller
{
     public function index()
    {
        $tasks = User::all();
        return $tasks;//$this->response->array($data->toArray());
    } 
}
