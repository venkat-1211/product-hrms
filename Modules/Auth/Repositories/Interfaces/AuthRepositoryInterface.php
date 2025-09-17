<?php

namespace Modules\Auth\Repositories\Interfaces;

interface AuthRepositoryInterface
{
    public function login($request, $company);
}