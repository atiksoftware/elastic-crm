<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Domain extends Model
{
	protected $attributes = [
		'server_id' => 0, // [type:integer, model:Server]
		'host_id' => 0, // [type:integer, model:Host]

		'name' => '', // [type:string, size:64]
		'directory_name' => '', // [type:string, size:128]

		'parent_domain_id' => null, // [type:integer, nullable, model:Domain]

		'aliases' => '', // [type:string, size:255, nullable]
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function server()
	{
		return $this->belongsTo(Server::class);
	}

	public function host()
	{
		return $this->belongsTo(Host::class);
	}

	public function path(): Attribute
	{
		return new Attribute(
			get: function () {
				if ($this->is_main) {
					return $this->host->base_path . '/public_html';
				}

				return $this->host->base_path . '/' . $this->directory_name;
			},
		);
	}

	public function aliases(): Attribute
	{
		return new Attribute(
			get: function ($value) {
				if ('' === $value || null === $value) {
					return [];
				}

				return explode(',', $value);
			},
			set: fn ($value) => \is_array($value) ? implode(',', $value) : $value,
		);
	}

	public function getIsMainAttribute(): bool
	{
		return null === $this->parent_domain_id;
	}

	public function getIsSubdomainAttribute(): bool
	{
		return null !== $this->parent_domain_id;
	}

	public function getIsWildcardAttribute(): bool
	{
		return preg_match('/^\*\./', $this->name);
	}

	public function parent_domain()
	{
		return $this->belongsTo(self::class, 'parent_domain_id');
	}
}
