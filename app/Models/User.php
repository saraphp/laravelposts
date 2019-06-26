<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model  implements interfaces\DataInterface
{
   
  public function getData()
  {
       return  \Cache::remember('users', 160, function()
        {
            return  json_decode(file_get_contents('http://jsonplaceholder.typicode.com/users'));
            
        });
   
  }

  public function getDataCollection()
  {
            return  collect($this->getData());
   
  }
}