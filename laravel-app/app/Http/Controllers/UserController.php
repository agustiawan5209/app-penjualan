<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function Index(User $user){
        if (Gate::allows('Manage-Admin', $user)) {
            return redirect()->route('Admin.Dashboard-Admin', ['id' => $user->created_at])->withToastSuccess('Selamat Datang '. $user->name);
        }
        if (Gate::allows('Manage-Customer', $user)) {
            return redirect()->route('Customer.Dashboard-User', ['id' => $user->created_at])->withToastSuccess('Selamat Datang '. $user->name);
        }
    }
}
