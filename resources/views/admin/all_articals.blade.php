<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style type="text/css">
    .post_title{
      font-size: 30px;
      font-weight: bold ; 
      text-align: center; 
      padding: 30px ;
      color: white;
    }

    .table_design
    {
      border: 1px solid white ;
      width: 80%; 
      text-align: center; 
      margin-left: 70px

    }
    .th_deg
    {
      background-color: skyblue ; 
    }
  </style>
  </head>
  <body>
    {{-- header --}}
    @include('admin.header')
       <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
          <h1 class="post_title">All Articals</h1>

          <table class="table_design">
            <tr class="th_deg">
              <th>Post Id </th>
              <th>Post Name </th>
              <th>Post Image</th>
              <th>Post Title</th>
              <th>Post Description</th>
              <th>Comments</th>
              <th>Post Status</th>
              <th>Accept</th>
              <th>Reject</th>
            </tr>
@foreach ($allArticals as $artical)
  

            <tr>
              <td>{{$artical->id}}</td>
              <td>{{$artical->name}}</td>
              <td>{{$artical->image}}</td>
              <td>{{$artical->title}}</td>
              <td>{{$artical->Description}}</td>
              <td>{{$artical->Comment}}</td>
              <td>{{$artical->post_status}}</td>
              <td>
                <a href="{{url('accept_post',$artical->id)}}" class="btn btn-outline-secondary">Accept</a>
              </td>
              <td>
                <a href="{{url('reject_post',$artical->id)}}" class="btn btn-primary">Reject</a>
              </td>
            </tr>
@endforeach
          </table>
          {{-- el goz el ha7ot feh el conten --}}
        </div>
       @include('admin.footer')
  </body>
</html>