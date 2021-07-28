<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getActivity()
    {
        $activities = Activity::orderBy('created_at', 'DESC')
                     ->with('causer')->get();
        // dd($activities);
        return view('dashboard.activity.index', compact('activities'));
    }
}
