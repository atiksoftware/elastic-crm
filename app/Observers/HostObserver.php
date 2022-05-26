<?php

namespace App\Observers;

use App\Models\Host;
use App\Models\Domain;
use App\Helpers\HostIdentity;

class HostObserver
{
	public function creating(Host $host): void
	{
		$host_identity = new HostIdentity($host);

		$host->username = $host_identity->getUsername();
		$host->password = $host_identity->getPassword();
	}

	public function created(Host $host): void
	{
		$domain = new Domain([
			'server_id' => $host->server->id,
			'host_id' => $host->id,
			'name' => $host->domain_name,
		]);

		$domain->save();
	}

	public function deleting(Host $host): void
	{
		$host->domains->each(function (Domain $domain): void {
			$domain->delete();
		});
	}
}
