<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function __construct(\App\Models\Post $model) 
    {
        $this->model = $model;
        $this->User = new \App\Models\User;
        $this->Comment = new \App\Models\Comment;   
    }

    public function index()
    {
        $data['posts'] = $this->model->getDataCollection();
        return $data['posts'];
    }
    public function getPostsByUserId($id)
    {
        $data['posts'] = $this->model->getDataCollection()->where('userId',$id)->all();
        return $data['posts'];
        
    }

    public function getPostsWithUser()
    {
        $users=  $this->User->getDataCollection();
        $posts= $this->model->getDataCollection();
        $data['posts'] =   $posts->map(function ($item, $key) use($users) {
            return [
                'id'            => $item->id,
                'title'         => $item->title,
                'body'         => $item->body,
                'user'     => $users->firstWhere('id', $item->userId),
            ];
           
        })->all();

        return $data['posts'];    
    }

    public function getPostsWithComments()
    {
        $comments= $this->Comment->getDataCollection();
        $posts= $this->model->getDataCollection();
        $data['posts'] = $posts->map(function ($item, $key) use($comments) {
            return [
                'id'            => $item->id,
                'title'         => $item->title,
                'body'         => $item->body,
                'comments'     => $comments->where('postId', $item->id),
            ];   
        })->all();

       return  $data['posts'];
        
    }
}
