<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
  protected $proxies = '*';
  protected $headers = Request::HEADER_X_FORWADED_AWS_ELB;
}