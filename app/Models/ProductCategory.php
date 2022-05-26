<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	protected $attributes = [
		'name' => null, // [type:string, nullable]
		'sort_order' => 0, // [type:int, default: 0]
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
