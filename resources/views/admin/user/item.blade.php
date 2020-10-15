<tr class="{{session('updated_data') && session('updated_data')->id==$user->id ? 'bg-info' :  ''}}">
    <th scope="row">{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->wallet}}</td>
    <td>{{$user->packages()->count()}}</td>
    <td>
        @include('admin.user.operations', $user)
    </td>
</tr>

