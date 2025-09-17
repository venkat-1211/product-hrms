<?php

namespace Modules\SuperAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SuperAdmin\Repositories\Interfaces\PackageRepositoryInterface;
use Modules\SuperAdmin\Repositories\Interfaces\CompanyRepositoryInterface;
use Modules\Common\Helpers\EnumInspector;
use Modules\SuperAdmin\Http\Requests\AddCompanyRequest;
use Modules\Common\Actions\HandleFormSubmission;

class CompanyController extends Controller
{
    protected $packageRepository;
    protected $companyRepository;

    public function __construct(PackageRepositoryInterface $packageRepository, CompanyRepositoryInterface $companyRepository)
    {
        $this->packageRepository = $packageRepository;
        $this->companyRepository = $companyRepository;
    }
    public function index()
    {
        $plans = $this->packageRepository->allActivePackages();
        $planTypes = EnumInspector::getEnumValues('packages', 'type');
        $currencies = EnumInspector::getEnumValues('packages', 'currency');
        $companies = $this->companyRepository->all();
        return view('super-admin::company.index', compact('plans', 'planTypes', 'currencies', 'companies'));
    }

    public function dataTable()
    {
        return $this->companyRepository->dataTable();
    }

    public function store(AddCompanyRequest $request, HandleFormSubmission $handler)
    {
        return $this->companyRepository->store($request, $handler);
    }
}
