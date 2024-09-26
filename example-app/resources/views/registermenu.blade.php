<form method="POST" action="/register">
  @csrf
  <div class="form-group">
    <label for="InputName">Username</label>
    <input name="name" type="text" class="form-control" id="InputName" placeholder="" required>
    @error('name')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="InputEmail">Email</label>
    <input name="email" type="email" class="form-control" id="InputEmail" placeholder="" required>
    @error('email')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
      <label for="InputPassword">Password</label>
      <input name="password" type="password" class="form-control" id="InputPassword" placeholder="" required>
      @error('password')
      <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
      @enderror
  </div>
  <div class="form-group">
      <label for="InputPasswordConfirmation">Confirm password</label>
      <input name="password_confirmation" type="password" class="form-control" id="InputPasswordConfirmation" placeholder="" required>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>