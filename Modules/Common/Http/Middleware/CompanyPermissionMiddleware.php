<?php

namespace Modules\Common\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Common\Helpers\PermissionHelper;

class CompanyPermissionMiddleware
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $companyId = $request->route('company')?->id ?? session('company_id');

        foreach ($permissions as $permission) {
            if (PermissionHelper::companyPermission($permission, $companyId)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized for this company.');
    }
}
