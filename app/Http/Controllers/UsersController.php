<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
class UsersController extends Controller
{
    public $model;

    public function __construct(\App\Models\User $model) {
        $this->model = $model;
        $this->Post = new \App\Models\Post;
    }

    public function index()
    {
        $data['users'] = $this->model->getDataCollection();
        return $data['users'];
        //return \App\Http\Resources\UserResource::collection($data['users']);
    }
 
    function getUsersWithPosts()
    {
        $posts=  $this->Post->getDataCollection();
        $users= $this->model->getDataCollection();
        $data['users'] =   $users->map(function ($item, $key) use($posts) {
            return [
                'id'            => $item->id,
                'name' => $item->name,
                'username' => $item->username,
                'email' => $item->email,
                'address' => $item->address,
                'phone' => $item->phone,
                'website' => $item->website,
                'company' => $item->company, 
                'posts'     => $posts->Where('userId', $item->id),
            ];
           
        })->all();
        return  $data['users'];

    }
}
