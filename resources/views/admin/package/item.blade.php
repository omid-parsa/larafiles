<tr class="{{session('updated_data') && session('updated_data')->package_id==$package->package_id ? 'bg-info': ''}}">
    <th scope="row">{{$package->package_id}}</th>
    <td>{{$package->package_title}}</td>
    <td>{{$package->package_price}}</td>
    <td>
        @include('admin.package.operations', $package)
    </td>
</tr>
