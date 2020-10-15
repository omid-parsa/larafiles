<div class="row">
    <div class="col-12">
        @include('admin.partials.errors')
        <form class="mt-2" action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="full_name">* Full Name:</label>
                <input type="text" class="form-control" name="full_name" id="full_name" value="{{old('full_name', isset($userItem) ? $userItem->name : '')}}">
            </div>
            <div class="form-group">
                <label for="email">* Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email', isset($userItem) ? $userItem->email : '')}}">
            </div>
            <div class="form-group {{isset($userItem)? 'd-none': ''}}">
                <label for="password">* Password:</label>
                <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label for="role">* Role:</label>
                <select class="form-control" name="role" id="role">
                    <option value="1" {{isset($userItem) && $userItem->role==1 ? 'selected' : ''}}>Typical User</option>
                    <option value="2" {{isset($userItem) && $userItem->role==2 ? 'selected' : ''}}>Manager</option>
                    <option value="3" {{isset($userItem) && $userItem->role==3 ? 'selected' : ''}}>Administrator</option>
                </select>
            </div>
            <div class="form-group">
                <label for="wallet">* Wallet:</label>
                <input type="number" class="form-control" value="{{old('wallet', isset($userItem) ? $userItem->wallet : 0)}}" name="wallet" id="wallet">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>