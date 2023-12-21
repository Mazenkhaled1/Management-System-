<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
        @include('home.css')
        <style>
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
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
        @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
        
     
      <table class="table_design">
        <tr class="th_deg">
          <th>Post Id </th>
          <th>Post Name </th>
          <th>Post Image</th>
          <th>Post Title</th>
          <th>Post Description</th>
          <th>Post Status</th>
          <th>Comments</th>
        </tr>

        <tr>
          <td>21333333</td>
          <td>erfdardsf</td>
          <td>asdfsdafsdf</td>
          <td>adfsdaf</td>
          <td>sdfaasdf</td>
          <td>asdfsdf</td>
          <td><a href="">Add Comment</a></td>
        </tr>

      </table>
      <!-- services section end -->
      <!-- about section start -->
        @include('home.about')
      <!-- about section end -->
      ---------------------------------
      <!-- footer section start -->
        @include('home.footer')    
   </body>
</html>