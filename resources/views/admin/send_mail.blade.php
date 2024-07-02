<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    <style>
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
                <h1 style="font-size:30px;font-weight:bold">Mail Send to {{$data->name}}</h1>

                <form action="{{url('mail',$data->id)}}" method="" enctype="multipart/form-data">
                        @csrf
                    <div class="div_des">
                    <label>Greeting</label>
                    <input type="text" name="greeting">
                    </div>
                    <div class="div_des">
                    <label>Mail Body</label>
                    <textarea name="body" ></textarea>
                    </div>
                    <div class="div_des">
                    <label>Action Text</label>
                    <input type="text" name="action_text">
                    </div>
                    <div class="div_des">
                    <label>Action Link</label>
                    <input type="text" name="action_link">
                    </div>
                    <div class="div_des">
                    <label>End Line</label>
                    <input type="text" name="endline">
                    </div>
                    <div class="div_des">
                        <input type="submit" value="Send Mail" class="btn btn_primary">
                    </div>
                    
                    
                    
                    </form>
            </center>
          </div>
        </div>
          </div>
        @include ('admin.footer')
  </body>
</html>