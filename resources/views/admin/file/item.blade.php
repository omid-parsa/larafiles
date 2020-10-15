<tr class="{{session('updated_data') && session('updated_data')->file_id==$file->file_id ? 'bg-info': ''}}">
    <th scope="row">{{$file->file_id}}</th>
    <td>{{$file->file_title}}</td>
    <td>{{$file->file_type}}</td>
    <td>{{$file->file_size}}</td>
    <td>{{$file->file_name}}</td>
    <td>
        @include('admin.file.operations', $file)
    </td>
</tr>
