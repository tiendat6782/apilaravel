<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = RoleUser::all();
        return view('admin.role.index', compact('role'));
    }
}
