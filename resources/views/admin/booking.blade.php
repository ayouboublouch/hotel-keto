<!DOCTYPE html>
<html>

<head>
    @include ('admin.css')
    <style>
        .table_des{
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }
        .th_des{
            background-color: skyblue;
            padding: 15px;
        }
        tr{
            border: solid 3px white;
        }
        td{
            padding: 15px;
        }
    </style>
</head>

<body>
    @include ('admin.header')
    @include ('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            <table class="table_des">

<tr>
    <th class="th_des">Room id </th>
    <th class="th_des">Customer name</th>
    <th class="th_des">Email</th>
    <th class="th_des">Phone</th>
    <th class="th_des">Arrival Date</th>
    <th class="th_des">Leaving Date</th>
    <th class="th_des">Status</th>
    <th class="th_des">Room Title</th>
    <th class="th_des">Price</th>
    <th class="th_des">Room Image</th>
    <th class="th_des">Delete</th>
    <th class="th_des">Status Update</th>
    
</tr>
@foreach ($data as $data)
<tr>
    <td>{{$data->room_id}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->phone}}</td>
    <td>{{$data->start_date}}</td>
    <td>{{$data->end_date}}</td>
    <td>
@if ($data->status == 'Approve')

<span style="color:skyblue;">Approved</span>

@endif  
@if ($data->status == 'Rejected')

<span style="color:red;">Rejected</span>

@endif     
@if ($data->status == 'waiting')
<span style="color:yellow;">Waiting</span>
@endif


</td>
    <td>{{$data->room->room_title}}</td>
    <td>{{$data->room->price}}</td>
    <td>
        <img style="width: 200px;" src="/room/{{$data->room->image}}">
    </td>
    <td>
        <a onclick="return confirm('Are you Sure to delete this!!');" class="btn btn-danger" href="{{url('delete_booking',$data->id)}}">Delete</a>
    </td>
    <td>
        <span style="padding: 10px;"><a href="{{url('approve_book',$data->id)}}" class="btn btn-success">Aproved</a></span>
        <a href="{{url('reject_book',$data->id)}}" class="btn btn-warning">Rejected</a>
    </td>
</tr>
@endforeach



</table>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>