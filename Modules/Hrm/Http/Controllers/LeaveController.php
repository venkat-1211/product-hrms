<?php

namespace Modules\Hrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LeaveController extends Controller
{
    public function leavesEmployeeIndex()
    {
        return view('hrm::leave.leave-employee');
    }
}
