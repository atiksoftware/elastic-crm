<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
	protected $attributes = [
		'name' => null, // [type:string, nullable]
		'rate' => null, // [type:float, nullable]
		'is_default' => false, // [type:bool, false]
	];

	protected $casts = [
		'name' => 'string',
		'rate' => 'float',
		'is_default' => 'bool',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
