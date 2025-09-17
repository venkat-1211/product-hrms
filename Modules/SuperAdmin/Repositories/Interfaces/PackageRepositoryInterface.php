<?php

namespace Modules\SuperAdmin\Repositories\Interfaces;

interface PackageRepositoryInterface
{
    public function store(array $data, \Closure $handler);
    public function all();
    public function allWithRoles();
    public function allWithModules();
    public function allWithModulesAndRoles();
    public function delete(Model $model, \Closure $handler);
    public function dataTable();
}