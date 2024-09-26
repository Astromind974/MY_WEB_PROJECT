<!DOCTYPE html>
<html lang="en">
@include('header')
<body>
    @include('navbar')
    <div class="container">
        <div class="jumbotron">
            <h1>{{$monster->name}}</h1>
            <img src="{{$monster->image}}" alt="">
            <h2>Faction: {{$monster->faction}}</h2>
            <h2>Rarity: {{$monster->rarity}}</h2>
            <h2>Cost: {{$monster->cost}}</h2>
            <h2>Attack: {{$monster->attack}}</h2>
            <h2>Hp: {{$monster->hp}}</h2>
            <h3>Effect:</h3>
            <p>{{$monster->bio}}</p>
        </div>
    </div>
</body>
</html>