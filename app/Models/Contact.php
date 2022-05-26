<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $attributes = [
		'client_id' => null, // [type:int, nullable, model: Client]

		'firstname' => null, // [type:string, nullable]
		'lastname' => null, // [type:string, nullable]
		'email' => null, // [type:string, nullable]
		'phone' => null, // [type:string, nullable]
		'profile_image' => null, // [type:string, nullable]

		'job_title' => null, // [type:string, nullable]

		'is_primary' => false, // [type:bool, default: false]
	];

	protected $casts = [
		'client_id' => 'int',
		'firstname' => 'string',
		'lastname' => 'string',
		'email' => 'string',
		'phone' => 'string',
		'profile_image' => 'string',
		'job_title' => 'string',
		'is_primary' => 'bool',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
