<form method="POST" action="/login">
  @csrf
  <div class="form-group">
    <label for="InputEmail">Email address</label>
    <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" required>
    @error('email')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="InputPassword">Password</label>
    <input name="password" type="password" class="form-control" id="InputPassword" required>
    @error('password')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>