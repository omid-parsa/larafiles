<?php

namespace App\Http\Controllers\Frontend;

use App\Models\File;
use App\Utility\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function details(Request $request,$file_id)
    {
        $file_item=File::find($file_id);
        $user_id=Auth::user()->id;
        return view('frontend.files.single', compact('file_item', 'user_id'));
    }

    public function download(Request $request, $file_id)
    {
        $user_id=Auth::user()->id;
        if (!User::is_user_subscibed($user_id)){
            return redirect()->route('frontend.files.access');
        }
        $file_item=File::find($file_id);
        if (!$file_item){
            return redirect()->back();
        }else{
            if (!\App\Utility\File::user_can_download($user_id)){
                return redirect()->back();
            }else{
                $base_path=public_path('images\\');
                $file_path=$base_path.$file_item->file_name;

                return response()->download($file_path);
            }
        }

    }

    public function access()
    {
        return view('frontend.files.access');
    }
}
