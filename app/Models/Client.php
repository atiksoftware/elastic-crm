<?php

namespace App\Models;

use App\Enums\ClientType;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $attributes = [
		'client_type' => ClientType::INDIVIDUAL, // [type: enum, default: 1, enum: ClientType]
		'group_id' => null, // [type:int, nullable, model: ClientGroup]

		'name' => null, // [type:string, nullable]

		'vat' => null, // [type:string, nullable]
		'phone' => null, // [type:string, nullable]
		'website' => null, // [type:string, nullable]

		'currency_id' => null, // [type:int, nullable, model: Currency]
		'language_id' => null, // [type:int, nullable, model: Language]
		'country_id' => null, // [type:int, nullable, model: Country]

		'city' => null, // [type:string, nullable]
		'state' => null, // [type:string, nullable]
		'address' => null, // [type:string, nullable]
		'zip' => null, // [type:string, nullable]

		'billing_country_id' => null, // [type:int, nullable, model: Country]
		'billing_city' => null, // [type:string, nullable]
		'billing_state' => null, // [type:string, nullable]
		'billing_address' => null, // [type:string, nullable]
		'billing_zip' => null, // [type:string, nullable]

		'shipping_country_id' => null, // [type:int, nullable, model: Country]
		'shipping_city' => null, // [type:string, nullable]
		'shipping_state' => null, // [type:string, nullable]
		'shipping_address' => null, // [type:string, nullable]
		'shipping_zip' => null, // [type:string, nullable]
	];

	protected $casts = [
		'client_type' => ClientType::class,
		'group_id' => 'int',
		'name' => 'string',
		'vat' => 'string',
		'phone' => 'string',
		'website' => 'string',
		'currency_id' => 'int',
		'language_id' => 'int',
		'country_id' => 'int',
		'city' => 'string',
		'state' => 'string',
		'address' => 'string',
		'zip' => 'string',
		'billing_country_id' => 'int',
		'billing_city' => 'string',
		'billing_state' => 'string',
		'billing_address' => 'string',
		'billing_zip' => 'string',
		'shipping_country_id' => 'int',
		'shipping_city' => 'string',
		'shipping_state' => 'string',
		'shipping_address' => 'string',
		'shipping_zip' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
