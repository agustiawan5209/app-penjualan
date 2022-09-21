<?php

namespace App\Http\Controllers;

use RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class Message extends Controller
{
    /**
     * getData
     *
     * @param  mixed $notifiable
     * @param  mixed $notification
     * @return void
     */
    protected function getData($notifiable, Notification $notification)
    {
        if (method_exists($notification, 'toDatabase')) {
            return is_array($data = $notification->toDatabase($notifiable))
                                ? $data : $data->data;
        }

        if (method_exists($notification, 'toArray')) {
            return $notification->toArray($notifiable);
        }

        throw new RuntimeException('Notification is missing toDatabase / toArray method.');
    }
}
