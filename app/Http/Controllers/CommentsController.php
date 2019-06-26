<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct(\App\Models\Comment $model) {
        $this->model = $model;
    }

    public function index()
    {
        $data['comments'] = $this->model->getDataCollection();
        return $data['comments'];
        //return \App\Http\Resources\CommentResource::collection($data['comments']);
    }
}
