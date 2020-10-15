<div class="row">
    <div class="col-12">
        @include('admin.partials.errors')
        <form class="mt-2" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="file_title">* File Title:</label>
                <input type="text" class="form-control" name="file_title" id="file_title" value="{{old('file_title', isset($fileItem) ? $fileItem->file_title : '')}}">
            </div>
            <div class="form-group">
                <label for="file_description">* File Description:</label>
                <textarea name="file_description" class="form-control" id="file_description" cols="30" rows="10">{{old('file_description', isset($fileItem) ? $fileItem->file_description : '')}}</textarea>
            </div>
            <div class="form-group">
                <label for="fileItem"></label>
                <input type="file" name="fileItem">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>