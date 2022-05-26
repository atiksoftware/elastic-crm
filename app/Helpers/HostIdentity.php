<?php

namespace App\Helpers;

use App\Models\Host;

class HostIdentity
{
	private $host;

	public function __construct(Host $host)
	{
		$this->host = $host;
	}

	private function getDomainName()
	{
		return $this->host->domain_name;
	}

	public function getUsername(): string
	{
		$hash = sha1($this->getDomainName());

		$domain_name = $this->getDomainName();

		$domain_name = preg_replace('/[^a-zA-Z0-9]/', '', $domain_name);

		$domain_name = strtolower($domain_name);

		return $domain_name . substr($hash, 0, 4);
	}

	public function getPassword(): string
	{
		$app_key = config('app.key');

		$hash = sha1($app_key . $this->getDomainName());

		return substr($hash, 0, 10);
	}
}
