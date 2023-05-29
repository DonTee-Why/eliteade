<?php
if (Auth::user()->dashboard_style == 'light') {
    $bg = 'light';
    $text = 'dark';
} else {
    $bg = 'dark';
    $text = 'light';
}

?>

@extends('layouts.app')

@section('content')
    @include('user.topmenu')
    @include('user.sidebar')
    <div class="main-panel bg-{{ $bg }}">
        <div class="content bg-{{ $bg }}">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h2 class="text-{{ $text }} pb-2">Welcome, {{ Auth::user()->name }}!</h2>
                    <br>
                    {{-- <h2 class="text-{{$text}} pb-2"> {{Auth::user()->plan_name}}</h2> --}}

                    @if (Session::has('getAnouc') && Session::get('getAnouc') == 'true')
                        @if ($settings->enable_annoc == 'on')
                            <h5 id="ann" class="text-{{ $text }}op-7 mb-4">{{ $settings->newupdate }}</h5>
                            <script type="text/javascript">
                                var announment = $("#ann").html();
                                console.log(announment);
                                swal({
                                    title: "Annoucement!",
                                    text: announment,
                                    icon: "info",
                                    buttons: {
                                        confirm: {
                                            text: "Okay",
                                            value: true,
                                            visible: true,
                                            className: "btn btn-info",
                                            closeModal: true
                                        }
                                    }
                                });
                            </script>
                        @endif
                        {{ session()->forget('getAnouc') }}
                    @endif

                </div>
                @if (Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Beginning of  Dashboard Stats  -->
                <div class="row row-card-no-pd bg-{{ $bg }} shadow-lg">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{ $bg }}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-download text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Deposited</p>
                                            <h4 class="card-title text-{{ $text }}">
                                                {{ $settings->currency }}{{ number_format($deposited, 2, '.', ',') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{ $bg }}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="flaticon-coins text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Profit</p>
                                            <h4 class="card-title text-{{ $text }}">
                                                {{ $settings->currency }}{{ number_format(Auth::user()->roi, 2, '.', ',') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{ $bg }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-gift text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Bonus</p>
                                            <h4 class="card-title text-{{ $text }}">{{ $settings->currency }}
                                                {{ number_format($total_bonus, 2, '.', ',') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{ $bg }}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="flaticon-coins text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Balance</p>
                                            <h4 class="card-title text-{{ $text }}">
                                                {{ $settings->currency }}{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}
                                            </h4> <br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{ $bg }}">
                            <div class="card-body">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Beginning of chart -->
                <div class="row">
                    <div class="pt-1 col-12">
                        <h3>Personal Trading Chart</h3>
                        @include('includes.chart')

                    </div>


                </div>

            @endsection
