<!DOCTYPE html>
<html lang="en">
@php
$index = "Login"
@endphp
@include('header')
<body>
    @include('navbar')
    <div class="container">
        <div class="jumbotron">
            @include('loginmenu')
        </div>
    </div>
</body>
</html>