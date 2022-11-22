<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\DiskonController;

class UserController extends Controller
{
    public function Index(User $user){
        $dis = (new DiskonController)->getDiskon();

        if (Gate::allows('Manage-Admin', $user)) {
            return redirect()->route('Admin.Dashboard-Admin', ['id' => $user->created_at])->withToastSuccess('Selamat Datang '. $user->name);
        }
        if (Gate::allows('Manage-Customer', $user)) {
            return redirect()->route('Customer.Dashboard-User', ['id' => $user->created_at])->withToastSuccess('Selamat Datang '. $user->name);
        }
    }
    public function sendOfferNotification() {
        $userSchema = User::first();

        $offerData = [
            'type' => 'User Regis',
            'body' => $userSchema->name . ' Baru Saja Terdaftar',
            'from' => 'Admin',
        ];

        Notification::send($userSchema, new InvoicePaid($offerData));

        dd('Task completed!');
    }
}
