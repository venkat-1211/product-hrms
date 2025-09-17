<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use Modules\Common\Models\Module;
use Modules\SuperAdmin\Models\Company;
use Modules\Common\Actions\HandleFormSubmission;
use Modules\Auth\Http\Requests\ProfileUpdateRequest;

class AuthController extends Controller
{

    protected $authRepository;
    protected $commonRepository;
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function index()
    {
        return view('auth::dashboards.super-admin-dashboard');
    }

    public function loginForm(Company $company = null)
    {
        return view('auth::auth.login', compact('company'));
    }

    public function login(LoginRequest $request, ?Company $company = null)
    {
        return $this->authRepository->login($request, $company);
    }

    public function logout(?Company $company = null)
    {
        return $this->authRepository->logout($company);
    }

    public function companyIndex()
    {
        return view('auth::dashboards.company-dashboard');
    }

    public function profile()
    {
        return view('auth::auth.profile');
    }

    public function profileUpdate(ProfileUpdateRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if ($this->authRepository->profileUpdate($request, $handler, $company)) {
            return redirect()
                ->route('company.profile', $company->account_url)
                ->with('success', 'Profile updated successfully.');
        }

        return back()->with('error', 'Failed to update profile.');
    }
}
