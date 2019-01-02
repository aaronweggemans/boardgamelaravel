@extends('admin.layouts.app')

@section('datafield')
    <header id="header">
        <div class="header-inner">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Battle_of_Waterloo_1815.PNG"
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
                                        <h1>Add Game</h1>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="card-title">Add game</h2>
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <form action="/battles" method="POST"
                                                              enctype="multipart/form-data">
                                                            {{ csrf_field() }}

                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    Game Name
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select name="gamename" id="gamename" class="form-control">
                                                                        <option value=""></option>
                                                                        <?php $i = 0;?>
                                                                        @foreach($games as $game)
                                                                            <option value="{{$game->id}}">{{$game->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div id="amount_of_players" class="mb-2">
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-12">
                                                                    <div class="align" align="right">
                                                                        <input type="submit" class="btn btn-secondary add_battle" value="Klik" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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