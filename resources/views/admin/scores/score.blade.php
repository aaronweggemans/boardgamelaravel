@extends('admin.layouts.app')

@section('datafield')
    <style>
        .side {
            float: left;
            width: 15%;
            margin-top: 10px;
        }

        .middle {
            float: left;
            width: 70%;
            margin-top: 10px;
        }

        /* Place text to the right */
        .right {
            text-align: right;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The bar container */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        /* Individual bars */
        .bar-5 {
            width: 100%;
            height: 18px;
            background-color: #4CAF50;
        }

        .bar-4 {
            width: {{ $two }}%;
            height: 18px;
            background-color: #2196F3;
        }

        .bar-3 {
            width: {{ $three }}%;
            height: 18px;
            background-color: #00bcd4;
        }
    </style>
    <header id="header">
        <div class="header-inner">
            <img src="https://i.ytimg.com/vi/vZU51tbgMXk/maxresdefault.jpg" alt="img" style="width: 100%;">
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
                                        <h1>Scores</h1>
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
                        <div class="score">
                            <h1>Top spelers</h1>
                            <div class="row">
                                @if(empty($highest[0]))
                                    Er ging hier iets fout
                                @else
                                    <div class="side">
                                        <div>{{ $highest[0]->users[0]->name }}</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-5"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{ $highest[0]->score }}</div>
                                    </div>
                                @endif

                                @if(empty($highest[1]))
                                    Hier ging iets fout
                                @else
                                    <div class="side">
                                        <div>{{ $highest[1]->users[0]->name }}</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-4"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{ $highest[1]->score }}</div>
                                    </div>
                                @endif
                                @if(empty($highest[2]))
                                    Hier ging iets fout
                                @else
                                    <div class="side">
                                        <div>{{ $highest[2]->users[0]->name }}</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-3"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{ $highest[2]->score }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="mt-4">All players score</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Player name</th>
                    <th>Game</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                @foreach($scores as $score)
                    <tr>
                        <td>
                            @if(!isset($score->users[0]->name))
                                <p class="text-danger">Hier ging iets fout</p>
                            @else
                                {{ $score->users[0]->name }}
                            @endif
                        </td>
                        <td>
                            @if(!isset($score->games->name))
                                <p class="text-danger">Hier ging iets fout</p>
                            @else
                                {{ $score->games->name }}
                            @endif
                        </td>
                        <td>{{$score->score}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $scores->links() }}
        </div>
    </section>
@endsection