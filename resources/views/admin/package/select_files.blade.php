{{--this view is called in package controller from selectFiles method --}}
{{--it will recieve an array of all files in file table--}}
@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    @if($files && count($files)>0)
        <div class="p-3 table-bordered">
        <form method="post" action="">
            {{ csrf_field() }}

            @foreach($files as $file)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="files[]" value="{{$file->file_id}}"  {{isset($file_ids) && in_array($file->file_id, $file_ids) ? 'checked' : ''}}>
                    <label class="form-check-label" for="exampleCheck1">{{$file->file_title}}</label>
                </div>
            @endforeach
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Apply" name="submit_package_files">
            </div>

        </form>
        </div>
    @endif
@endsection