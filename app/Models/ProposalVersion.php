<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalVersion extends Model
{
	protected $attributes = [
		'proposal_id' => null, // [type:int, nullable, model: Proposal]

		'quantity_as' => 1, // [type:int, default: 1] // 1:Pieces, 2:Hours, 2:Pieces/Hours

		'sub_total' => 0, // [type:float, default: 0]
		'line_discount' => 0, // [type:float, default: 0]
		'general_discount' => 0, // [type:float, default: 0]
		'gross_total' => 0, // [type:float, default: 0]
		'total_tax' => 0, // [type:float, default: 0]
		'total' => 0, // [type:float, default: 0]

		'description' => '', // [type:string, dbText:text, nullable]
	];

	protected $casts = [
		'proposal_id' => 'int',
		'quantity_as' => 'int',
		'sub_total' => 'float',
		'line_discount' => 'float',
		'general_discount' => 'float',
		'gross_total' => 'float',
		'total_tax' => 'float',
		'total' => 'float',
		'description' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
