<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('shared.links')
</head>

<body id="page-top">

  <div id="wrapper">
    @include('layouts.header')

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('layouts.menu')

        @yield('content')
      </div>
      @include('layouts.footer')
    </div>
  </div>
  @yield('script')

</body>

</html>
