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
                                        <h1>Add Game</h1>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="card-title">Card title</h2>

                                                        <form action="/games" method="POST"
                                                              enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    Game Name
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="name"
                                                                           class="form-control {{ $errors->has('name') ? 'text-danger' : '' }}"
                                                                           placeholder="Game Name"
                                                                           value="{{ old('name') }}">
                                                                    @if($errors->has('name'))
                                                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    Aantal Spelers
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" name="aop"
                                                                           class="form-control {{ $errors->has('aop') ? 'text-danger' : '' }}"
                                                                           placeholder="Aantal Spelers"
                                                                           value="{{ old('aop') }}">
                                                                    @if($errors->has('aop'))
                                                                        <div class="text-danger">{{ $errors->first('aop') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    Datum Van Release
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="date" name="dor"
                                                                           class="form-control {{ $errors->has('dor') ? 'text-danger' : '' }}"
                                                                           placeholder="Datum Van Release"
                                                                           value="{{ old('dor') }}">
                                                                    @if($errors->has('dor'))
                                                                        <div class="text-danger">{{ $errors->first('dor') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    Hoelang duurt dit spelletje?
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" name="time"
                                                                           class="form-control {{ $errors->has('time') ? 'text-danger' : '' }}"
                                                                           placeholder="Tijd" value="{{ old('time') }}">
                                                                    @if($errors->has('time'))
                                                                        <div class="text-danger">{{ $errors->first('time') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-4">
                                                                    Omschrijving
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <textarea name="description" id="" cols="30"
                                                                              placeholder="Omschrijving"
                                                                              rows="5"
                                                                              class="form-control {{ $errors->has('description') ? 'text-danger' : '' }}">{{old('description')}}</textarea>
                                                                    @if($errors->has('description'))
                                                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12" align="right">
                                                                    <input type="submit" class="btn btn-secondary"
                                                                           value="Klik">
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