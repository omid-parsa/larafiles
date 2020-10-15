<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Categorizable;

    protected $primaryKey='package_id';

    protected $guarded= ['package_id'];
    /**
     * in our database there is a relation between files table and packages table
     * a file could be belongs to a lot of packages
     * and a packages could have a lot files
     * this relation is many to many relation (m-n)
     * based on laravel rules we should create a table in database with file_package
     * why? laravel find it based on alphabets orders sor file should be before package
     * and in our database our related tables to file and package are files and packages but in this name
     * we have to use files and packages without 's ' like file_package
     * define only two columns in new table for primary keys like file_id and package_id and set both as primary key
     * so we define a function here to make this connection( the function name should be files in package model and reverse in file model)
     */
    public function files()
    {
//        return $this->belongsToMany(File::class);
// the following command is for a custom name for table and custom primary key for this model and other model
//                                               other model name          custom table         this model primary key in new table     other model primary key in new table
         return $this->belongsToMany(    File::class,              'file_package',           'package_id',                               'file_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_packages', 'package_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     * this function is used for polymorphic relations
     * table created for this has three columns (category_id | categorizable_id | categorizable_type)
     * category id is used to store the category id that is assigned and saved in categories table
     * categorizable_id is used to save the file|package|or anything`s id that could be related to the mentioned category
     * categorizable_type is the type of the item for example ( App\Models\Package | App\Models\File)
     * table`s name is used for this relation should be plural
     *first argument of morphToMany and morphBymany method  is singular of the table`s name
     * second argument is table`s name
     * third is categorizable_id
     * foth is category_id
     */
// since this function repeats in all models that could categorized we define it as a function in a trait
// you can find it in App\Traits\Categorizable
// we use the trait in the beginning of this class like " use Categorizable;"
    /*
        public function categories()
        {
            return $this->morphToMany(Category::class, 'categorizable', 'categorizables', 'categorizable_id','category_id');
        }
    */

}
