<!DOCTYPE html>
<html lang="en">
@include("header")
<body>
    @include("navbar")
    <div class="container">
        <div class="jumbotron">
            <h1>User Profile</h1>
            <h3>Username</h3>
            <p>{{$user->name}}</p>
            <h3>Email</h3>
            <p>{{$user->email}}</p>
        </div>
    </div>
</body>
</html>