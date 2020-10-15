<tr class="{{session('updated_data') && session('updated_data')->payment_id==$payment->payment_id ? 'bg-info': ''}}">
    <th scope="row">{{$payment->user->name}}</th> {{--   Using relation | user is a method defined in payment model for relation--}}
    <td>{{number_format($payment->payment_amount)}}</td>
    <td>{{$payment->payment_method_return()}}</td>
    <td>{{$payment->payment_gateway_name}}</td>
    <td>{{$payment->payment_res_num}}</td>
    <td>{{$payment->payment_ref_num}}</td>
    <td>{{$payment->updated_at}}</td>
    <td>{{$payment->payment_status_return()}}</td>
    <td>

    </td>
</tr>
