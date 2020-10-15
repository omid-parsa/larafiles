<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Plan;
use App\Models\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function index(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        return view('frontend.subscribe.index', compact('plan'));
    }

    public function register(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        if (!$plan){
            // this is only for example handle errors
            return redirect()->back()->with('error', 'There is no such plan');
        }
        $subscribe_expired_at=Carbon::now()->addDays($plan->plan_days_count);
        $subscribe_data=[
            'subscribe_user_id' => 7,
            'subscribe_plan_id' => $plan_id,
            'subscribe_download_limit' => $plan->plan_limit_download_count,
            'subscribe_created_at' => Carbon::now(),
            'subscribe_expired_at' => $subscribe_expired_at
        ];
        Subscribe::create($subscribe_data);
    }
}
