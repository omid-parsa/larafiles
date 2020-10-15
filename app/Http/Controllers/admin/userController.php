<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('admin.user.index', compact('users'))->with('panel_title', 'Users List'); // views/admin/user/file.blade.php
    }

    public function create()
    {
        return view('admin.user.create')->with('panel_title', 'Add New User');// views/admin/user/create.blade.php
    }

    public function store(UserRequest $userRequest)
    {
//        $this->validate(request(), [
//            'full_name'=> 'required',
//            'email'=>'required|email',
//            'password'=>'required|min:6|max:20'
//        ]
////            ,[   // this third argument  is for defining custom messages
////                'full_name.required' => 'Please enter full name',
////                'email.required' => 'Please enter email',
////                'email.email' => 'The email format is not correct',
////                'password.required' => 'Please enter password',
////                'password.min' => 'Password should be at least 6 characters',
////                'password.max' => 'Password should be at last 20 characters'
////            ]
//        );
//        dd(request()->all());
        $user_data=[
            'name' => request()->full_name,
            'email' => request()->email,
            'password' => request()->password,
            'role' => request()->role,
            'wallet' => request()->wallet
        ];
//        dd($userData);
        $new_object_user=User::create($user_data);

        if( $new_object_user instanceof User){
            $dataItem=$new_object_user;
            return redirect()->route('admin.users')->with(['success' => 'The user is added successfully!', 'updated_data' => $dataItem]);
        }
    }

    public function delete($user_id)
    {
        if($user_id && ctype_digit($user_id)){
//            User::destroy($user_id); // this command could delete the row without using the following codes and without creating an object
            $userItem=User::find($user_id);
            if($userItem && $userItem instanceof User){
                $userItem->delete();
                return redirect(route('admin.users'))->with('success', 'The user is deleted successfully!');
            }
        }
    }

    public function edit($user_id)
    {
        if($user_id && ctype_digit($user_id)){
            $userItem=User::find($user_id);
            if($userItem && $userItem instanceof User){
                return view('admin.user.edit', compact('userItem'))->with(['panel_title'=>'Edit User Information']);
            }

        }
    }

    public function update(UserRequest $userRequest, $user_id)
    {
//        dd(request()->role);
//        dd(request()->except('password', '_token'));
        $input_data=[
            'name' => request()->full_name,
            'email' => request()->email,
            'role' => request()->role,
            'wallet' => request()->wallet
        ];
        $userItem=User::find($user_id);
        $userItem->update($input_data);
        $users=User::all();
//        return redirect()->back();
        return redirect(route('admin.users'))->with('updated_user_data', $userItem)->with('success', 'The user`s information is updated!');
//        return  view('admin.user.file', compact('userItem', 'users'))->with('success', 'The user`s information is updated!');
    }

    public function packages(Request $request, $user_id)
    {
        $user=User::find($user_id);
        $user_packages=$user->packages()->get();

        return view('admin.user.packages', compact('user_packages'))->with('panel_title', 'User`s Packages');
    }
}
