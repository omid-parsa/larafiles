<?php

namespace App\Http\Controllers\admin;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function index()
    {
        $files=File::all();
        return view('admin.file.index', compact('files'))->with('panel_title', 'Files List');

    }

    public function create()
    {
        return view('admin.file.create')->with('panel_title', 'Add New File');
    }

    public function store(Request $request)
    {
//        dd($request->file_title);
//        dd($request->all());
//        dd($request->file('fileItem')->getMimeType());
//        $this->validate($request, [RULES], [MESSAGES]); // first argument is input data, second is rules and third is messages
        $this->validate($request,
        [
            'file_title' => 'required',
            'fileItem' => 'required'
        ],
        []);

        $new_file_data=[
            'file_title' => $request->file_title,
            'file_description' => $request->file_description,
            'file_type' => $request->file('fileItem')->getMimeType(),
            'file_size' => $request->file('fileItem')->getClientSize()
        ];


        // generating a new name for file by str_random function of laravel and appending it to file extension
        $generated_file_name= str_random(45).'.'.$request->file('fileItem')->getClientOriginalExtension();
        // storing file on local server or amazon or by ftp


        // in the following methods we can define the path here we only could define it in the config storage file // store and storeAs are laravel methods
//        $request->file('fileItem')->store('images'); // by store method the file will be uploaded in storage/app/images with a hashed name by laravel
//        $request->file('fileItem')->storeAs('images',$generated_file_name); // by storeAs we can define the file name by ourselves

        //in the following method we can define the path here in code and the name by our selves // move is php method
        $result_of_file_saving=$request->file('fileItem')->move(public_path('images'), $generated_file_name);
        if ($result_of_file_saving instanceof \Symfony\Component\HttpFoundation\File\File){

            $new_file_data['file_name']=$generated_file_name; // adding file_name item to array new_file_data because after moving file we have no access->
            //<- to file file information in request. so we create the new_file_data array before here.

            $new_object_file=File::create($new_file_data); // save information in the database




            if( $new_object_file instanceof File){
                $dataItem=$new_object_file;
                return redirect()->route('admin.files')->with(['success' => 'The file is added successfully!', 'updated_data' => $dataItem]);
            }


        }


    }

    public function edit($file_id)
    {

    }
}
