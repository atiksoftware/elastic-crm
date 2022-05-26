<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
	protected $attributes = [
		'server_id' => 0, // [type:integer, model:Server] The ID of the server this host belongs to.

		'domain_name' => '', // [type:string, max:255, unique] The domain name of the host.

		'username' => '', // [type:string, size:32] The identity of the host.
		'password' => '', // [type:string, size:16] The password of the host.

		'base_path' => '', // [type:string, size:64] The base path of the host.

		'is_user_created' => false, // [type:boolean] Whether the host was created by the user or not.
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function server()
	{
		return $this->belongsTo(Server::class);
	}

	public function domains()
	{
		return $this->hasMany(Domain::class);
	}

	private function createUserOnServer(): void
	{
		$ssh = $this->server->ssh();
		$ssh->exec("useradd -m -p $(openssl passwd -1 {$this->password}) -d {$this->base_path} {$this->username}");

		$this->is_user_created = false;
		$this->save();
	}

	public function build(): void
	{
		if (!$this->is_user_created) {
			$this->createUserOnServer();
		}
	}
}
