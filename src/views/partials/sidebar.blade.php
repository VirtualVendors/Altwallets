<ul id="nav">
	<li class="{{Request::is('/') ? 'open' : ''}}">
    	<a href="{{route('home')}}">
			<i class="fa fa-home"></i>Home
		</a>
  	</li>
@if(Auth::guest())
    <li class="{{Request::is('login') ? 'open' : ''}}">
      <a href="{{route('login')}}"><i class="fa fa-sign-in"></i>Login</a>
    </li>
  @else
    @if(Auth::user()->super)
      <li class="has_sub {{Request::is('admin*') ? 'open' : ''}}">
		<a href="#">
			<i class="fa fa-cogs"></i>
			Admin
			<span class="pull-right">
				<i class="fa fa-chevron-right"></i>
			</span>
		</a>
		<ul>
			<li>
				<a href="{{route('admin.dashboard')}}">Dashboard</a>
			</li>
			<li>
				<a href="{{route('admin.users.index')}}">Users</a>
			</li>
			<li>
				<a href="{{route('admin.currencies.index')}}">Currencies</a>
			</li>
		</ul>
    </li>
    @endif
    <li class="{{Request::is('profile') ? 'open' : ''}}">
      <a href="#"><i class="fa fa-user"></i>My Profile</a>
    </li>
    <li>
      <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
    </li>
  @endif
</ul>