<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
class UsersController extends Controller
{
    public $model;

    public function __construct(\App\Models\User $model) {
        $this->model = $model;
    }

    public function index(){
        $data['users'] = $this->model->getDataCollection();
        return $data['users'];
        //return \App\Http\Resources\UserResource::collection($data['users']);
    }
}
