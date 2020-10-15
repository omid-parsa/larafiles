<a href="{{route('admin.users.edit', $user->id)}}">
    <i class="fa fa-edit fa-lg text-dark"></i>
</a>
<a href="{{route('admin.users.delete', $user->id)}}">
    <i class="fa fa-trash-o fa-lg text-dark" aria-hidden="true"></i>
</a>
<a title="Display User Packages List" href="{{route('admin.users.packages', $user->id)}}">
    <i class="fa fa-list fa-lg text-dark" aria-hidden="true"></i>
</a>