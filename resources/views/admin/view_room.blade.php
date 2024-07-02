<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css')
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
  </head>
  <body>
    @include ('admin.header')
    @include ('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <table class="table_des">

                <tr>
                    <th class="th_des">Room Title </th>
                    <th class="th_des">Description</th>
                    <th class="th_des">price</th>
                    <th class="th_des">WIFI</th>
                    <th class="th_des">Room Type</th>
                    <th class="th_des">Image</th>
                    <th class="th_des">Delete</th>
                    <th class="th_des">Update</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->room_title}}</td>
                    <td>{!! Str::limit($data->description,150) !!}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->WI_FI}}</td>
                    <td>{{$data->room_type}}</td>
                    <td>
                        <img width="120" src="room/{{$data->image}}">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this !!');" class="btn btn-danger" href="{{url('room_delete',$data->id)}}">Delete</a>
                    </td>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{url('room_update',$data->id)}}">Update</a>
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