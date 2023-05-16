<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notifirell;
use App\Models\User;

use Auth;

class Notification extends Controller
{
    public static function info($message, $user, $priority = 1)
    {
        Notifirell::create([
            'type' => 1,
            'priority' => $priority,
            'message' => $message,
            'user' => $user,
            'status' => 1,
        ]);

        // Bildirimi gönderme işlemleri
    }

    public static function warning($message, $user, $priority = 1)
    {
        Notifirell::create([
            'type' => 2,
            'priority' => $priority,
            'message' => $message,
            'user' => $user,
            'status' => 1,
        ]);

        // Bildirimi gönderme işlemleri
    }

    public static function error($message, $user, $priority = 1)
    {
        Notifirell::create([
            'type' => 3,
            'priority' => $priority,
            'message' => $message,
            'user' => $user,
            'status' => 1,
        ]);

        // Bildirimi gönderme işlemleri
    }

    public static function success($message, $user, $priority = 1)
    {
        Notifirell::create([
            'type' => 3,
            'priority' => $priority,
            'message' => $message,
            'user' => $user,
            'status' => 1,
        ]);

        // Bildirimi gönderme işlemleri
    }

    public static function read($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->status = 0;
            $notification->save();
        }
    }
}
