<?php

namespace Modules\Common\Helpers;

use Illuminate\Support\Facades\Auth;

class PermissionHelper
{
    public static function companyPermission($permission, $companyId = null)
    {
        $user = Auth::user();

        if (! $user) {
            return false;
        }

        // Default to session company if not passed explicitly
        $companyId = $companyId ?? session('company_id');

        // 🔹 Check direct user permissions with company_id
        $hasPermission = $user->permissions()
            ->where('permissions.name', $permission)
            ->where(function ($q) use ($companyId) {
                $q->where('permission_user.company_id', $companyId);
                // ->orWhereNull('permission_user.company_id'); // global fallback
            })
            ->exists();

        if ($hasPermission) {
            return true;
        }

        // 🔹 Check via roles (role -> permissions) with company_id
        return $user->roles()
            ->where('role_user.company_id', $companyId)
            ->whereHas('permissions', function ($q) use ($permission, $companyId) {
                $q->where('permissions.name', $permission)
                  ->where(function ($sub) use ($companyId) {
                      $sub->where('permission_role.company_id', $companyId);
                      // ->orWhereNull('permission_role.company_id'); // global fallback
                  });
            })
            ->exists();
    }
}
