<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">MyDungeon</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <li><a href="/monsters">Monsters</a></li>
    </ul>
    @guest
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    @endguest
    @auth
    <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
      <li><a href="/profile/{{auth()->user()->id}}"><span class="glyphicon glyphicon-user"></span>{{auth()->user()->name}}</a></li>
      @endif
      <li>
        <form method="POST" action="/logout">
          @csrf
          <button class="btn btn-outline-success my-2 my-sm-0"><span class="glyphicon glyphicon-log-out"></span> Logout</button>
        </form>
      </li>
    </ul>
    @endauth
  </div>
</nav>