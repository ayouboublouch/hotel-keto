<!DOCTYPE html>
<html>

<head>
    @include ('admin.css')
</head>

<body>
    @include ('admin.header')
    @include ('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">


                <center>
                    <h1 style="font-size: 40px; font-weight:bolder; color:white;">Gallery</h1><br><br>
                    <div class="row">
                        @foreach ($gallery as $gallery)
                        <div class="col-md-4">
                            <img style="height: 200px!important; width:300px!important;" src="/gallery/{{$gallery->image}}" alt="" >
                            <br>
                            <a href="{{url('delete_gallery',$gallery->id)}}" class="btn btn-danger">Delete image</a>
                        </div>
                        @endforeach
                    </div>


            </div>


        </div>





        <form action="{{url('upload_gallery')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 30px;">
                <label style="color: white;font-weight:bold" for="">Upload Image</label>
                <input type="file" name="image" id="" required>

                <input class="btn vtn-primary" type="submit" value="Add Image">
            </div>
        </form>
        </center>
    </div>
    </div>
    </div>
    @include ('admin.footer')
</body>

</html>