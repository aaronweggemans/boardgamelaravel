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
                                        <h1>Details {{ $game->name }}</h1>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="card-title">Card title</h2>

                                                        <div class="row mb-2">
                                                            <div class="col-md-4">
                                                                Game Naam
                                                            </div>

                                                            <div class="col-md-8">
                                                                {{ $game->name }}
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-4">
                                                                Aantal speler
                                                            </div>

                                                            <div class="col-md-8">
                                                                {{ $game->aop }}
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-4">
                                                                Datum van release
                                                            </div>

                                                            <div class="col-md-8">
                                                                {{ $game->dor }}
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-4">
                                                                Hoelang duurt dit spelletje?
                                                            </div>

                                                            <div class="col-md-8">
                                                                {{ $game->time }} uur
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-4">
                                                                Korte omschrijving
                                                            </div>

                                                            <div class="col-md-8">
                                                                {{ $game->description }}
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-12" align="right">
                                                                <a href="/games/{{$game->id}}/edit" class="btn btn-secondary">Pas game aan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection