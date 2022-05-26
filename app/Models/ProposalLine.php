<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class ProposalLine extends Model
{
	protected $attributes = [
		'proposal_id' => null, // [type:int, nullable, model: Proposal]
		'proposal_version_id' => null, // [type:int, nullable, model: ProposalVersion]
		
		'title' => null, // [type:string, nullable]
		'description' => null, // [type:string, nullable]

		'quantity' => 1, // [type:float, default: 1]
		'unit_price' => 0, // [type:float, default: 0]

		'discount' => 0, // [type:float, default: 0]
		'discount_type' => 1, // [type:int, default: 1] // 1:percentage, 2:fixed

		'tax_id' => null, // [type:int, nullable, model: Tax]

		'total' => 0, // [type:float, default: 0]

		'sort_order' => 0, // [type:int, default: 0]
	]; 

	protected $casts = [
		'proposal_id' => 'int',
		'proposal_version_id' => 'int',
		'title' => 'string',
		'description' => 'string',
		'quantity' => 'float',
		'unit_price' => 'float',
		'discount' => 'float',
		'discount_type' => 'int',
		'tax_id' => 'int',
		'total' => 'float',
		'sort_order' => 'int',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
