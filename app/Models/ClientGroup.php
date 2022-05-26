<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
	protected $attributes = [
		'name' => null, // [type:string, nullable]
	];

	protected $casts = [
		'name' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
