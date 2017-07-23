<!-- 
  #########################
  WELCOME TO TWEBOX.COM 
  ########################
 -->
<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials._head')
  </head>

  <body>


    @include('partials._navBar')


    @yield('content')

    @include('partials._footer')

    @include('partials._javascript')

    @yield('scripts')

    @include('partials._messages')

  </body>


</html>