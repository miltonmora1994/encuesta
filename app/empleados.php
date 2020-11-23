<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    protected $table = 'empleados';
    protected $guarded = ['id'];



		public function getFullNameAttribute()
		{
		    return "{$this->NOMBRE} {$this->APELLIDO}";
		}
}
