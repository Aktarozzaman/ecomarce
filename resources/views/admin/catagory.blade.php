{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .input_color{
        color: black;
    }
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top:30px;
        border: 3px solid white;
    }

        </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                {{-- message --}}
                @if(session()->has('message'))
                <div class="alert alert-success"> 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>

                @endif

                
                <div class="div_center"> 
                    <h2 class="h2_font">Add Catagory</h2>
                    <form action="{{ url('/add_catagory') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory" placeholder="Enter Your Catagory name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add catagory">
                    </form>

                </div>
                <table class="center">
                    <tr class="center"> 
                        <td>Catagory Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->catagory_name }}</td>
                        <td><a onclick="return confirm('Are You Sure Delete this ?')" class="btn btn-danger" href="{{ url('delete_catagory',$data->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>