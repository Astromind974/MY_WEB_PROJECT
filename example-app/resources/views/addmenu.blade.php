<form enctype="multipart/form-data" method="POST" action="/add">
  @csrf
  <div class="form-group">
    <label for="InputName">Name</label>
    <input name="name" type="text" class="form-control" id="InputName" placeholder="" required>
    @error('name')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="InputImage">Image</label>
    <input name="image" type="file" class="form-control" id="InputImage" accept="image/png, image/jpeg, image/jpg">
    @error('image')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="InputFaction">Faction</label>
    <input name="faction" type="text" class="form-control" id="InputFaction" placeholder="" required>
    @error('faction')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="InputRarity">Rarity</label>
    <input name="rarity" type="text" class="form-control" id="InputRarity" placeholder="" required>
    @error('rarity')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-group">
      <label for="InputCost">Cost</label>
      <input name="cost" type="number" min="0" max="10" class="form-control" id="InputCost" placeholder="" required>
      @error('cost')
      <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
      @enderror
  </div>
  <div class="form-group">
      <label for="InputAttack">Attack</label>
      <input name="attack" type="number" min="0" max="20" class="form-control" id="InputAttack" placeholder="" required>
      @error('attack')
      <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
      @enderror
  </div>
  <div class="form-group">
      <label for="InputHp">Hp</label>
      <input name="hp" type="number" min="0" max="20" class="form-control" id="InputHp" placeholder="" required>
      @error('hp')
      <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
      @enderror
  </div>
  <div class="form-group">
      <label for="InputBio">Bio</label>
      <input name="bio" type="text" class="form-control" id="InputBio" placeholder="" required>
      @error('bio')
      <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>