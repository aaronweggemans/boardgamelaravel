@extends('admin.layouts.app')

@section('datafield')
    <header id="header">
        <div class="header-inner">
            <img src="{{ asset('images/header.jpeg') }}" alt="img">
            <div class="overlay">
                <div class="header-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-top">
                                    <div class="logo-area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="header-bottom">
                                    <div class="header-bottom-left">
                                        <h1>Laravel Boardgame</h1>
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
                        <h2 class="title">Beste spelers op dit moment</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="features-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="features-left">
                                    <ul class="features-list features-list-left">
                                        <li class="wow fadeInLeft">
                                            <div class="features-content">
                                                @if(empty($battles[0]->users[0]->name))
                                                    <h4>Hier ging iets fout</h4>
                                                @else
                                                    <h4>{{ $battles[0]->users[0]->name }}</h4>
                                                    <small>{{ $battles[0]->score }}</small>
                                                    <p>
                                                        Is heel goed in {{ $battles[0]->games->name }}
                                                        want {{ $battles[0]->games->description }}
                                                    </p>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="wow fadeInLeft">
                                            <div class="features-content">
                                                @if(empty($battles[1]->users[0]->name))
                                                    <h4>Hier ging iets fout</h4>
                                                @else
                                                    <h4>{{ $battles[1]->users[0]->name }}</h4>
                                                    <small>{{ $battles[1]->score }}</small>
                                                    <p>Is heel goed in {{ $battles[1]->games->name }}
                                                        want {{ $battles[1]->games->description }}</p>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="features-right">
                                    <ul class="features-list features-list-right">
                                        <li class="wow fadeInRight">
                                            <div class="features-content">
                                                @if(empty($battles[2]->users[0]->name))
                                                    <h4>Hier ging iets fout</h4>
                                                @else
                                                    <h4>{{ $battles[2]->users[0]->name }}</h4>
                                                    <small>{{ $battles[2]->score }}</small>
                                                    <p>Is heel goed in {{ $battles[2]->games->name }} want
                                                        {{ $battles[2]->games->description }}</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="wow fadeInRight">
                                            <div class="features-content">
                                                @if(empty($battles[3]->users[0]->name))
                                                    <h4>Hier ging iets fout</h4>
                                                @else
                                                    <h4>{{ $battles[3]->users[0]->name }}</h4>
                                                    <small>{{ $battles[3]->score }}</small>
                                                    <p>Is heel goed in {{ $battles[3]->games->name }}
                                                        want {{ $battles[3]->games->description }}</p>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="datacontent">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Alle battles</h1>

                    <p>Hier de set met alle gespeelde battles in dit klassement. Klinkt allemaal heel bijzonder alleen
                        is er een database interactie die de gegevens in de google charts verwerkt.</p>
                    <p>Intressant of niet?</p>
                </div>
                <div class="col-md-8">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages': ['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Games', 'Scores'],
                                    @foreach($battles as $battle)
                                ['{{ $battle->games->name }}', {{ $battle->score }}],
                                @endforeach
                            ]);

                            var options = {
                                backgroundColor: '#F8F8F8',
                                title: 'Amount of battles'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="piechart" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-area">
                        <h1>Alle games in dit systeem</h1>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Game naam</th>
                            <th>Aantal spelers</th>
                            <th>Tijd</th>
                            <th>Omschrijving</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->aop }} Spelers</td>
                                <td>{{ $game->time }} Uur</td>
                                <td>{{ $game->description }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection