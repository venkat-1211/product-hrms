<?php

namespace Modules\SuperAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Repositories\Interfaces\CommonRepositoryInterface;
use Modules\SuperAdmin\Repositories\Interfaces\PackageRepositoryInterface;
use Modules\Common\Actions\HandleFormSubmission;
use Modules\SuperAdmin\Http\Requests\AddPackageRequest;
use Modules\Common\Helpers\EnumInspector;
use Modules\SuperAdmin\Models\Package;
use Modules\Hrm\Repositories\Interfaces\HrmRepositoryInterface;

class PackageController extends Controller
{

    protected $commonRepository;
    protected $packageRepository;
    protected $hrmRepository;
    public function __construct(CommonRepositoryInterface $commonRepository, PackageRepositoryInterface $packageRepository, HrmRepositoryInterface $hrmRepository)
    {
        $this->commonRepository = $commonRepository;
        $this->packageRepository = $packageRepository;
        $this->hrmRepository = $hrmRepository;
    }

    public function index()
    {
        $packages = $this->packageRepository->all();
        $menus = $this->commonRepository->menus();
        $roles = $this->commonRepository->roles();
        $departments = $this->hrmRepository->departments();
        $typeCount = EnumInspector::getEnumCount('packages', 'type');
        return view('super-admin::package.index', compact('packages', 'menus', 'roles', 'typeCount', 'departments'));
    }

    public function indexGrid()
    {
        $packages = $this->packageRepository->allWithModulesAndRoles();
        $menus = $this->commonRepository->menus();
        $roles = $this->commonRepository->roles();
        $typeCount = EnumInspector::getEnumCount('packages', 'type');
        return view('super-admin::package.index-grid', compact('packages', 'menus', 'roles', 'typeCount'));
    }

    public function dataTable() {
        return $this->packageRepository->dataTable();
    }

    public function store(AddPackageRequest $request, HandleFormSubmission $handler)
    {
        return $this->packageRepository->store($request, $handler);
    }

    public function delete(Package $package, HandleFormSubmission $handler)
    {
        return $this->packageRepository->delete($package, $handler);
    }
}
