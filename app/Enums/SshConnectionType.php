<?php

namespace App\Enums;

enum SshConnectionType: int
{
	case PASSWORD = 1;
	case PRIVATE_KEY = 2;
}
