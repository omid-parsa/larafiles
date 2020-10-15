<div class="row">
    <div class="col-12">
        @include('admin.partials.errors')
        <form class="mt-2" action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="category_name">* Category Title:</label>
                <input type="text" class="form-control" name="category_name" id="category_name" value="{{old('category_name', isset($categoryItem) ? $categoryItem->category_name : '')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>