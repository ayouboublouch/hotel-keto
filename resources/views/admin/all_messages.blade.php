<!DOCTYPE html>
<html>

<head>
    <style>
        .table_des{
            border: 2px solid white;
            margin: auto;
            width: 80%;
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
    @include ('admin.css')
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
    <th class="th_des">Name  </th>
    <th class="th_des">Email</th>
    <th class="th_des">Phone</th>
    <th class="th_des">Message</th>
    <th class="th_des">Send Email</th>
</tr>
@foreach ($data as $data)


<tr>
    <td>{{$data->name}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->phone}}</td>
    <td>{{$data->message}}</td>
    <td>
        <a href="{{url('send_mail',$data->id)}}" class="btn btn-success">Send mail</a>
    </td>
    
   
</tr>

@endforeach
</table>
            </div>
        </div>
    </div>
    @include ('admin.footer')
</body>

</html>