<?php

use App\Models\ActivityLog;

if (!function_exists('activityLog')) {

    function activityLog($action, $module, $description = null)
    {
        ActivityLog::create([

            'user_name' => auth()->user()->name ?? 'System',

            'action' => $action,

            'module' => $module,

            'description' => $description,

        ]);
    }
}