<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowlangModel extends Model
{
    //use HasFactory;
     protected $table="know_language";
   protected $primaryKey="id";
   public $incrementing =true;
   protected $keyType='int';
   public $timestamps = false;
}
