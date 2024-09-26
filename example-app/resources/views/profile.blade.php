<!DOCTYPE html>
<html lang="en">
@include("header")
<body>
    @include("navbar")
    <div class="container">
        <div class="jumbotron">
            <h1>User Profile</h1>
            <h2>{{$user->name}}</h2>
            <h2>{{$user->email}}</h2>
        </div>
    </div>
</body>
</html>