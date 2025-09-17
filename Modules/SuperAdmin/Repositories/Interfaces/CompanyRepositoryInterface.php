<?php

namespace Modules\SuperAdmin\Repositories\Interfaces;

interface CompanyRepositoryInterface
{
    public function store(array $data, \Closure $handler);
}