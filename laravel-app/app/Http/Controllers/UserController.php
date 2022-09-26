<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Notification;
class UserController extends Controller
{
    public function Index(User $user){
        if (Gate::allows('Manage-Admin', $user)) {
            return redirect()->route('Admin.Dashboard-Admin', ['id' => $user->created_at])->withToastSuccess('Selamat Datang '. $user->name);
        }
        if (Gate::allows('Manage-Customer', $user)) {
            return redirect()->route('home', ['id' => $user->created_at])->withToastSuccess('Selamat Datang '. $user->name);
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
