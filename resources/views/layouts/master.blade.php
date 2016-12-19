<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'Expense Tracker')
  </title>

  <meta charset='utf-8'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" >

  <link href="/css/style.css" type='text/css' rel='stylesheet'>

  {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

  </head>
  <body>

    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Expense Tracker') }}
            </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
              <li><a href="{{ url('/') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
              @else
              <li><a href="/expenses/home"><span class="fa fa-user"></span>{{  Auth::user()->name }}</a></li>
              <li><a href="{{ url('/logout') }}">Logout</a></li>
              @endif
            </ul>
          </div>
        </div>
      </nav>

      <div class="container">

        <section>
          <!-- will be used to show any messages -->
          @if (Session::has('message'))
          <div class="alert alert-success">{{ Session::get('message') }}</div>
          @elseif (Session::has('error_message'))
          <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
          @endif

          {{-- Main page content will be yielded here --}}
          @yield('content')
        </section>
        
        <footer>
        </footer>

        {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
        @yield('body')
      </div>
    </div>

  </body>
  </html>
