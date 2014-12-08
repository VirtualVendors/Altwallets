<ul class="nav navbar-nav">
  <li class="{{Request::is('/') ? 'open' : ''}}">
    <a href="{{route('home')}}">Home</a>
  </li>
</ul>
<ul class="nav navbar-nav">
 
</ul>
<ul class="nav navbar-nav pull-right">
  @if(Auth::guest())
    <li class="{{Request::is('register*') ? 'open' : ''}}">
      <a href="{{route('register')}}">Register</a>
    </li>
    <li class="{{Request::is('login') ? 'open' : ''}}">
      <a href="{{route('login')}}">Login</a>
    </li>
  @else
    @if(Auth::user()->super)
      <li class="{{Request::is('admin*') ? 'open' : ''}}">
        <a href="{{route('admin.dashboard')}}">Admin</a>
      </li>
    @endif
    <li class="{{Request::is('profile') ? 'open' : ''}}">
      <a href="#">My Profile</a>
    </li>
    <li>
      <a href="{{route('logout')}}">Logout</a>
    </li>
  @endif
</ul>