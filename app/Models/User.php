<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model  implements 
      Interfaces\DataInterface
{
   
  public function getDataCollection()
  {
       return  \Cache::remember('users', 160, function()
        {
            return  collect(json_decode(file_get_contents('http://jsonplaceholder.typicode.com/users')));
            
        });
   
  }
}