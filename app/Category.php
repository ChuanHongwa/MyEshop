<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $table = "category";   
    protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');
}
