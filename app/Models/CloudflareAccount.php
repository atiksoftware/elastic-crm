<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloudflareAccount extends Model
{
	protected $attributes = [
		'name' => null, // [type:string, nullable]
		'token' => null, // [type:string, nullable]
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
