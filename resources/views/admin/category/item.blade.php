<tr class="{{session('updated_data') && session('updated_data')->category_id==$category->category_id ? 'bg-info': ''}}">
    <th scope="row">{{$category->category_id}}</th>
    <td>{{$category->category_name}}</td>
    <td>
        @include('admin.category.operations', $category)
    </td>
</tr>
