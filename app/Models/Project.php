<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $attributes = [
		'name' => null, // [type:string, nullable]
		'client_id' => null, // [type:int, nullable, model: Client]

		'start_date' => null, // [type:date, nullable]
		'end_date' => null, // [type:date, nullable]
	];

	protected $casts = [
		'name' => 'string',
		'client_id' => 'int',
		'start_date' => 'date',
		'end_date' => 'date',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
