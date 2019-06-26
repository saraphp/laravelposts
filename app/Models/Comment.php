<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements interfaces\DataInterface
{ 
    
    public function getData()
    {
        return  \Cache::remember('comments', 160, function()
            {
                return  json_decode(file_get_contents('http://jsonplaceholder.typicode.com/comments'));
                
            });
    
    }
    public function getDataCollection()
    {
                return  collect($this->getData());
    
    }
}
