<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
        @include('home.css')
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
        @include('home.services')


        @include('home.footer')    
   </body>
</html>