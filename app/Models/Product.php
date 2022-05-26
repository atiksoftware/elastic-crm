<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $attributes = [
		'name' => null, // [type:string, nullable]
		'description' => '', // [type:text, dbType:text]

		'price' => 0, // [type:float, default: 0]

		'tax_id' => null, // [type:int, nullable, model: Tax]

		'product_category_id' => null, // [type:int, nullable, model: ProductCategory]
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
