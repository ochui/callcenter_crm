<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    
    use HasFactory;

    protected $table = 'forms';

    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function fields()
    {
        return $this->hasMany('App\Models\FormField', 'form_id', 'id');
    }
}
