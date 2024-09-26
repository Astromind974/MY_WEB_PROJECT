<!DOCTYPE html>
<html lang="en">
@include('header')

<body>
    @include('navbar')
    <div class="container">
        <div class="jumbotron">
            <h1>Monsters</h1>
            <a href="/add" class="btn btn-primary">Add Monster</a>
            @include('searchbar')
        </div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <ul class="list-group">
                @php
                $c = 0
                @endphp
                @foreach ($monsters as $monster)
                <li class="list-group-item"><a href="/monsters/{{$monster->id}}">{{$monster['name']}}</a></li>
                @php
                $c++
                @endphp
                @endforeach
            </ul>
            @if ($c === 0)
            <p>Not found</p>
            @endif
        </div>
    </div>
</body>

</html>