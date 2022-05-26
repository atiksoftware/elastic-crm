<?php

namespace App\Models;

use phpseclib3\Net\SFTP;
use phpseclib3\Net\SSH2;
use App\Enums\SshConnectionType;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
	protected $attributes = [
		'name' => '', // [type: string] The name of the server.
		'ip' => '',  // [type: string] The IP address of the server.

		'ssh_connection_type' => SshConnectionType::PASSWORD, // [type: enum, enum: SshConnectionType] The type of SSH connection to use.
		'ssh_username' => null, // [type: string, nullable] The username to use when connecting to the server.
		'ssh_password' => null, // [type: string, nullable] The password to use when connecting to the server.
		'ssh_port' => 22, // [type:integer] The port to use when connecting to the server.

		'ssh_private_key' => '', // [type: string, dbType:text] The private key to use when connecting to the server.
		'ssh_public_key' => '',  // [type: string, dbType:text] The public key to use when connecting to the server.

		'os_users_path' => '/home', // [type: string] The path to the users directory on the server.
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function ssh(): SSH2
	{
		$ssh = new SSH2("{$this->ip}:{$this->ssh_port}");
		if (SshConnectionType::PRIVATE_KEY === $this->ssh_connection_type) {
			$key = PublicKeyLoader::load($this->ssh_private_key);
			if (!$ssh->login($this->ssh_username, $key)) {
				throw new \Exception('Login failed');
			}
		} else {
			if (!$ssh->login($this->ssh_username, $this->ssh_password)) {
				throw new \Exception('Login failed');
			}
		}

		return $ssh;
	}

	public function sftp(): SFTP
	{
		$ssh = new SFTP("{$this->ip}:{$this->ssh_port}");
		if (SshConnectionTypeEnum::KEY === $this->ssh_connection_type) {
			$key = PublicKeyLoader::load($this->ssh_private_key);
			if (!$ssh->login($this->ssh_username, $key)) {
				throw new \Exception('Login failed');
			}
		} else {
			if (!$ssh->login($this->ssh_username, $this->ssh_password)) {
				throw new \Exception('Login failed');
			}
		}

		return $ssh;
	}
}
