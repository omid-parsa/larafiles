<?php

namespace App\Http\Controllers\admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {
        $plans=Plan::all();
        return view('admin.plan.index', compact('plans'))->with(['panel_title' => 'Plans List']);
    }

    public function create()
    {
        return view('admin.plan.create')->with(['panel_title'=>'Add New Plan']); // here we send with as an array. we could send more data
    }

    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request,
        [
            'plan_title' => 'required',
            'plan_limit_download_count' => 'required|integer',
            'plan_price' => 'required|integer',
            'plan_days_count' => 'required|integer'
        ],
        [
            'plan_title.required' => 'Please enter the title of the plan (custom message)'
        ]);
        $new_plan_data= [
            'plan_title' => $request->plan_title,
            'plan_limit_download_count' => $request->plan_limit_download_count,
            'plan_price' => $request->plan_price,
            'plan_days_count' => $request->plan_days_count
        ];


        $new_object_plan= Plan::create($new_plan_data);

        if( $new_object_plan instanceof Plan){
            $dataItem=$new_object_plan;
            return redirect()->route('admin.plans')->with(['success' => 'The plan is added successfully!', 'updated_data' => $dataItem]);
        }

    }

    public function edit($plan_id)
    {
        
    }
    public function update($plan_id)
    {

    }
}
