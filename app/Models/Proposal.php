<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
	protected $attributes = [
		'subject' => null, // [type:string, nullable]
		'client_id' => null, // [type:int, nullable, model: Client]
		'contact_id' => null, // [type:int, nullable, model: Contact]

		'start_date' => null, // [type:date, nullable]
		'end_date' => null, // [type:date, nullable]

		'currency_id' => null, // [type:int, nullable, model: Currency]

		'language_id' => null, // [type:int, nullable, model: Language]

		'country_id' => null, // [type:int, nullable, model: Country]
		'city' => null, // [type:string, nullable]
		'state' => null, // [type:string, nullable]
		'address' => null, // [type:string, nullable]
		'zip' => null, // [type:string, nullable]

		'user_id' => null, // [type:int, nullable, model: User]
	];

	protected $casts = [
		'subject' => 'string',
		'client_id' => 'int',
		'contact_id' => 'int',
		'start_date' => 'date',
		'end_date' => 'date',
		'currency_id' => 'int',
		'language_id' => 'int',
		'country_id' => 'int',
		'city' => 'string',
		'state' => 'string',
		'address' => 'string',
		'zip' => 'string',
		'user_id' => 'int',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
