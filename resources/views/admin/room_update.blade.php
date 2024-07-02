<!DOCTYPE html>
<html>

<head>

<base href="/public">
    @include ('admin.css')
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
        .div_des{
            padding-top: 30px;
        }
        .div_center{
            text-align: center;
            padding: 40px;
        }
    </style>
</head>

<body>
    @include ('admin.header')
    @include ('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <h1 style="font-size:30px; font-weight:bold;">Update Room</h1>
                    <form action="{{ url('edit_room',$data->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                    <div class="div_des">
                    <label>Room title</label>
                    <input type="text" name="title" value="{{$data->room_title}}">
                    </div>
                    <div class="div_des">
                    <label>Description</label>
                    <textarea name="description" >{{$data->description}}</textarea>
                    </div>
                    <div class="div_des">
                    <label>Price</label>
                    <input type="number" name="price" value="{{$data->price}}">
                    </div>
                    <div class="div_des">
                    <label>Room Type</label>
                    <select name="type">
                        <option value="{{$data->room_type}}">{{$data->room_type}}</option>
                        <option selected value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                    </div>
                    <div class="div_des">
                    <label>Free WI-FI</label>
                    <select name="wifi">
                    <option selected value="{{$data->WI_FI}}">{{$data->WI_FI}}</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    </div>
                    <div class="div_des">
                    <label>Current Image</label>
                    <img style="margin: auto;" width="100" src="/room/{{$data->image}}" alt="">
                    </div>


                    <div class="div_des">
                    <label>Upload Image</label>
                    <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Update Room">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include ('admin.footer')
</body>

</html>