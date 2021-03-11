<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalexpModel extends Model
{
    //use HasFactory;
     protected $table="technical_exp";
   protected $primaryKey="id";
   public $incrementing =true;
   protected $keyType='int';
   public $timestamps = false;
}
