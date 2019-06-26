<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model implements interfaces\DataInterface
{
    
    public function getData()
    {
         return  \Cache::remember('posts', 160, function()
          {
              return  json_decode(file_get_contents('http://jsonplaceholder.typicode.com/posts'));
              
          });
     
    }

    public function getDataCollection()
  {
            return  collect($this->getData());
   
  }
}
