@extends('admin.layouts.app')

@section('datafield')
    <header id="header">
        <div class="header-inner">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Battle_of_Waterloo_1815.PNG" alt="img"
                 style="width: 100%;">
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
                                        <h1>Battles</h1>
                                        <hr>
                                        <a href="/battles/create/" class="btn btn-secondary">Add battle</a>
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
                        <h1>Alle battles</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
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
                                title: 'Amount of battles'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="piechart"></div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <p>Populairste game is</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection