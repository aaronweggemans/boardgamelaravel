@extends('admin.layouts.app')

@section('datafield')
    <header id="header">
        <div class="header-inner">
            <img src="https://compass-ssl.xbox.com/assets/dc/48/dc486960-701e-421b-b145-70d04f3b85be.jpg?n=Game-Hub_Content-Placement-0_New-Releases-No-Copy_740x417_02.jpg"
                 alt="img" style="width: 100%;">
            <div class="overlay">
                <div class="header-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-top"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="header-bottom">
                                    <div class="header-bottom-left">
                                        <h1>Games</h1>
                                        <hr>
                                        <a href="/games/create/" class="btn btn-secondary">Add game</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-area">
                        <h1>Alle Games</h1>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Aantal Speler</th>
                        <th>Tijdsduur</th>
                        @if(Auth::check())
                            <th></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
                        <tr>
                            <td><a href="/games/{{$game->id}}">{{ $game->name }}</a></td>
                            <td>{{ $game->aop }}</td>
                            <td>{{ $game->time }}</td>
                            @if(Auth::check())
                                <td>
                                    <form action="/games/{{ $game->id }} " method="post">
                                        @csrf
                                        {{ method_field("DELETE") }}
                                        <input type="submit" value="Delete game" class="btn btn-danger" />
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection