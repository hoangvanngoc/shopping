<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
   protected $table = 'customers';

   public function Bill(){
       return $this->hasOne('App\Models\bill','customer_id','id');
   }
}
