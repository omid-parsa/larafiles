<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\File;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index()
    {
        $packages=Package::all();
        return view('admin.package.index', compact('packages'))->with('panel_title', 'Package List');
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.package.create', compact('categories'))->with('panel_title', 'Add New Package');
    }

    public function store(Request $request)
    {

        // validation must be done
        $package_input_data=[
            'package_title'=> $request-> package_title,
            'package_price'=> $request-> package_price
        ];


        $package_object=Package::create($package_input_data);

        if ($request->has('categories')){
            $package_object->categories()->sync($request-> categories );
        }

        if ($package_object && $package_object instanceof Package){
            return redirect(route('admin.packages'))->with(['success' => 'The package is added successfully']);
        }
    }

    public function edit(Request $request, $package_id)
    {
        $categories=Category::all();
        $packageItem=Package::find($package_id);
        $package_categories=$packageItem->categories()->get()->pluck('category_id')->toArray();

        return view('admin.package.edit', compact('packageItem', 'categories' , 'package_categories'))->with('panel_title', 'Edit the Package');
    }

    public function update(Request $request, $package_id)
    {
        $packageItem=Package::find($package_id);
        if ($packageItem){
            $packageItem->update([
                'package_title'=> $request-> package_title,
                'package_price'=> $request-> package_price
            ]);
        }


        $packageItem->categories()->sync($request-> categories );


        if ($packageItem && $packageItem instanceof Package){
            return redirect(route('admin.packages'))->with(['success' => 'The package is updated successfully']);
        }

    }

    public function delete()
    {
        
    }

    public function selectFiles(Request $request, $package_id)
    {
        $files=File::all();// to select all data in the table

        $packageItem=Package::find($package_id);
        $packageFiles=$packageItem->files()->get(); // here we get files related to package from file_package table
        // this is based on relation defined in models and laravel features | packageFiles is a collection and we could execute laravel
        //methods on it for example pluck('file_id') to only extract file ids

        $file_ids=$packageFiles->pluck('file_id')->toArray(); // extracting with pluck create a collection and needs to be converted->
        //<-to array | there is also a function named toJson() "these functions are eloquent"

//        $file_ids=[];  // this is an old way for extracting file ids instead of pluck()
//        foreach ($packageFiles as $file){
//            $file_ids=$file->file_id;
//        }

        return view('admin.package.select_files', compact('files', 'file_ids'))->with(['panel_title' => 'Select Files for the Package']);
    }

    public function selectFilesUpdate(Request $request, $package_id)
    {
        $packageItem=Package::find($package_id); // packageItem is an object of Package model and in fact it is a row of packages table
        //since it is an object from package model it has a function named files that could be used for relation of tables.
        // see comments in Package model

        $files=$request->input('files'); // this an array parameter that we receive from form in 'select_files.blade'| it is name="" of check boxes
        //and in fact the files id


//            $packageItem->files()->attach($files); // calling method function of an object | then attach is a method from Laravel
            // to make relation for tables and then pass an array as parameter to update file_package table.

//            $packageItem->files()->detach($files); // this method is apposite of attach

            $packageItem->files()->sync($files); // this method is better than attach and detach because it do both method`s jobs
            //when you add new files to the package abd unselect some files, this function delete unselected ids and add selected item->
            //<- automatically

        // in many to many relations we use attach and detach | in one to many we use associate and dissociate
            return redirect(route('admin.packages.select-files', compact('package_id')))->with(['success' => 'Files is added to the Package']);

    }
}
