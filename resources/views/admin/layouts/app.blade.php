<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="outer-body-navigation">
    <ul class="navigation">
        <li class="list-items">
            <a class="buttons" href="/">
                <div class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="name" data-text="Home">Home</div>
            </a>
        </li>
        <li class="list-items">
            <a class="buttons" href="/users">
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="name" data-text="users">Gebruikers</div>
            </a>
        </li>
        <li class="list-items">
            <a class="buttons" href="/scores">
                <div class="icon">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <div class="name" data-text="score">Score</div>
            </a>
        </li>
        <li class="list-items">
            <a class="buttons" href="/battles">
                <div class="icon">
                    <i class="fa fa-fist-raised" aria-hidden="true"></i>
                    <i class="fa fa-fist-raised" aria-hidden="true"></i>
                </div>
                <div class="name" data-text="score">Battles</div>
            </a>
        </li>
        <li class="list-items">
            <a class="buttons" href="/games">
                <div class="icon">
                    <i class="fa fa-gamepad" aria-hidden="true"></i>
                    <i class="fa fa-gamepad" aria-hidden="true"></i>
                </div>
                <div class="name" data-text="score">Games</div>
            </a>
        </li>
        @if(Auth::check())
            <li class="list-items">
                <a href="/account_details" class="buttons">
                    <div class="icon">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </div>
                    <div class="name" data-text="">Account Opties</div>
                </a>
            </li>
        @else
            <li class="list-items">
                <a class="buttons" href="/login">
                    <div class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                    <div class="name" data-text="b">Login</div>
                </a>
            </li>
        @endif
        @if(Auth::check())
            <li class="list-items">
                <a href="logout" class="buttons">
                    <div class="icon">
                        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                    </div>
                    <div class="name" data-text="">Logout</div>
                </a>
            </li>
        @else
            <li class="list-items">
                <a class="buttons" href="/register">
                    <div class="icon">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </div>
                    <div class="name" data-text="b">Registreer</div>
                </a>
            </li>
        @endif
    </ul>
</div>
@yield('datafield')

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#gamename').change(function () {
            let field_data = $('#gamename option:selected').text();
            let id = $('#gamename option:selected').val();

            let user_response;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '/retrieve/games/' + id + '',
                success: function (response) {
                    $('#amount_of_players').empty();
                    $('#against_field').remove();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: '/retrieve/users/',
                        data: {
                            'field_data': field_data,
                        },
                        success: function (res) {
                            $('.add_battle').prop("disabled", false);
                            retrievedata(res);
                        }
                    });

                    function retrievedata(res) {
                        user_response = res;
                        setdata(user_response);
                    }

                    function setdata() {
                        let firstProp;
                        for (let key in response) {
                            if (response.hasOwnProperty(key)) {
                                firstProp = response[key];
                                let amount_of_players = firstProp.aop;

                                for (let item = 1; item < amount_of_players + 1; item++) {
                                    $('#amount_of_players')
                                        .append("<div class='row mb-2'>" +
                                            "<div class='col-md-4'>Player " + item + " Score</div>" +
                                            "<div class='col-md-2'>" +
                                                "<select name='users[]' id='users"+item+"' class='form-control'>" +
                                                    "<option value=''></option>" +
                                                "</select>" +
                                            "</div>" +
                                            "<div class='col-md-6'>" +
                                                "<input type='text' name='score[]' class='form-control' placeholder='Score'>" +
                                            "</div>" +
                                        "</div>");

                                    user_response.forEach(function (user) {
                                        console.log(user);
                                        $('#users' + item).append("<option value='" + user.id + "'>" + user.name + "</option>");
                                    });
                                }
                                break;
                            }
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        })
    });
</script>
</body>
</html>
