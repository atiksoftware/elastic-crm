<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNote extends Model
{
	protected $attributes = [
		'client_id' => null, // [type:int, nullable, model: Client]
		'user_id' => null, // [type:int, nullable, model: User]
		'note' => null, // [type:string, nullable]
	];

	protected $casts = [
		'client_id' => 'int',
		'user_id' => 'int',
		'note' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
