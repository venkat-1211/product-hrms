<?php

namespace Modules\Auth\Repositories;


use Modules\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use Modules\Common\Data\GenericFormData;
use Modules\SuperAdmin\Models\Company;
use Modules\Auth\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Common\Helpers\FileHelper;

class AuthRepository implements AuthRepositoryInterface
{
    // public function login($request)
    // {
    //     $data = GenericFormData::fromRequest($request, ['email', 'username', 'phone', 'company_id', 'password']);
    //     $companyId = $data->get('company_id');
    //     $password = $data->get('password');
    
    //     // Super Admin: no company, login with email only
    //     if (!$companyId) {
    //         $user = User::whereNull('company_id')
    //             ->where('email', $data->get('email'))
    //             ->first();    
    //         if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $password])) {
    //             return back()->with('error', 'Invalid credentials for Super Admin.');
    //         }
    
    //         return redirect()->route('super-admin-dashboard')->with('success', 'Super Admin login successful!');
    //     }
    
    //     // Get company and its login method
    //     $company = Company::find($companyId);
    //     if (!$company) {
    //         return back()->with('error', 'Company not found.');
    //     }
    
    //     $loginMethod = $company->login_method; // e.g., "username", "email_or_phone", etc.
    //     $user = $this->findUserByLoginMethod($loginMethod, $data, $companyId);
    
    //     if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $password])) {
    //         return back()->with('error', 'Invalid credentials.');
    //     }
    
    //     return redirect()->route('super-admin-dashboard')->with('success', 'Login successful!');
    // }
    // public function login($request, $company)
    // {
    //     $data = GenericFormData::fromRequest($request, ['email', 'username', 'phone', 'username_or_email', 'username_or_phone', 'email_or_phone', 'password']);
    
    //     $email = $data->get('email');
    //     $password = $data->get('password');
    
    //     // 🔒 Superadmin login
    //     if (is_null($company)) {
    //         $user = User::whereNull('company_id')
    //                     ->where('email', $email)
    //                     ->first();
    
    //         if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $password])) {
    //             return back()->with('error', 'Invalid superadmin credentials.');
    //         }
    
    //         return redirect()->route('super-admin-dashboard')->with('success', 'Superadmin login successful!');
    //     }
        
    //     if (!$company) {
    //         return back()->with('error', 'Company not found.');
    //     }
    
    //     // session(['current_company_id' => $company->id]);
    
    //     // You may also check login method dynamically (email/username/phone)
    //     $user = $this->findUserByLoginMethod($company->login_method, $data, $company->id);

    //     if (!$user && !Auth::attempt(['email' => $user?->email, 'password' => $password])) {
    //         return back()->with('error', 'Invalid company credentials.');
    //     }
    
    //     return redirect()->route('company.dashboard', $company)->with('success', 'Company login successful!');
    // }

    public function login($request, $company)
    {
        $data = GenericFormData::fromRequest($request, [
            'email', 'username', 'phone',
            'username_or_email', 'username_or_phone', 'email_or_phone',
            'password'
        ]);

        $password = $data->get('password');
        $remember = $request->filled('remember');

        // 🔒 Superadmin login
        if (is_null($company)) {
            $email = $data->get('email');
            $user = User::whereNull('company_id')->where('email', $email)->first();

            if (!$user || !Hash::check($password, $user->password)) {
                return back()->with('error', 'Invalid superadmin credentials.');
            }

            Auth::login($user, $remember);
            return redirect()->route('super-admin-dashboard')->with('success', 'Superadmin login successful!');
        }

        // ✅ Company login
        if (!$company) {
            return back()->with('error', 'Company not found.');
        }

        session(['current_company_id' => $company->id]);

        // 🔍 Find user by method
        $user = $this->findUserByLoginMethod($company->login_method, $data, $company->id);

        if (!$user || !Hash::check($password, $user->password)) {
            return back()->with('error', 'Invalid credentials.');
        }

        Auth::login($user, $remember);
        return redirect()->route('company.dashboard', $company->account_url)->with('success', 'Company login successful!');
    }

    


    protected function findUserByLoginMethod(string $method, $data, int $companyId)
    {
        $query = User::where('company_id', $companyId)->with('profile');
    
        return match ($method) {
            'email' => $query->where('email', $data->get('email'))->first(),
    
            'username' => $query->where('username', $data->get('username'))->first(),
    
            'phone' => $query->whereHas('profile', fn($q) =>
                $q->where('phone_number', $data->get('phone'))
            )->first(),
    
            'username_or_email' => $query->where(function ($q) use ($data) {
                $value = $data->get('username_or_email');
                $q->where('username', $value)->orWhere('email', $value);
            })->first(),
    
            'username_or_phone' => $query->where(function ($q) use ($data) {
                $value = $data->get('username_or_phone');
                $q->where('username', $value);
            })->orWhereHas('profile', fn($q) =>
                $q->where('phone_number', $data->get('username_or_phone'))
            )->first(),
    
            'email_or_phone' => $query->where(function ($q) use ($data) {
                $value = $data->get('email_or_phone');
                $q->where('email', $value);
            })->orWhereHas('profile', fn($q) =>
                $q->where('phone_number', $data->get('email_or_phone'))
            )->first(),
    
            default => null,
        };
    }
    

    public function logout(?Company $company = null)
    {
        $user = Auth::user();
        Auth::logout();
    
        // Clear session
        session()->forget('current_company_id');
    
        if ($user && $user->company_id) {
            // Get the company slug (account_url)
            $companySlug = optional($user->company)->account_url;
    
            return redirect()->route('company.login.form', ['company' => $companySlug]);
        }
    
        return redirect()->route('login.form');
    }

    public function profileUpdate($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['profile_image', 'first_name', 'last_name', 'email', 'phone_number', 'address', 'country', 'state', 'city', 'postal_code', 'current_password', 'password', 'confirm_password']);

        // User table Update
        $userData = [
            'email' => $genericFormData->get('email'),
            // 'password' => $genericFormData->get('password')
        ];

        // Only update password if filled
        if ($genericFormData->get('password')) {
            $userData['password'] = ($genericFormData->get('password'));
        }

        $userData = GenericFormData::fromArray($userData);
        $user = $handler->update($userData, Auth::user());

        // Profile table
        $profilePath = FileHelper::UploadFile($request->file('profile_image'), 'assets/img/users/profile');
        $profileData = [
            // 'profile_image' => $profilePath ?? '',
            'first_name' => $genericFormData->get('first_name'),
            'last_name' => $genericFormData->get('last_name'),
            'phone_number' => $genericFormData->get('phone_number'),
            'address' => json_encode([
                'address' => $genericFormData->get('address'),
                'country' => $genericFormData->get('country'),
                'state' => $genericFormData->get('state'),
                'city' => $genericFormData->get('city'),
                'postal_code' => $genericFormData->get('postal_code')
            ]),
        ];
        if ($profilePath)
        {
            $profileData['profile_image'] = $profilePath;
        }
        $profileData = GenericFormData::fromArray($profileData);
        $profile = $handler->update($profileData, Auth::user()->profile);
        return $user && $profile;
    }
    

    
}