<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function __construct(\App\Models\Post $model) {
        $this->model = $model;
    }

    public function index(){
        $data['posts'] = $this->model->getDataCollection();
        return $data['posts'];
        //return \App\Http\Resources\PostResource::collection($data['posts']);
    }
}
