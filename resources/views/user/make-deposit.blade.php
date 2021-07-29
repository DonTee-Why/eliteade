<?php
	if (Auth::user()->dashboard_style == "light") {
		$bg="light";
		$text = "dark";
	} else {
		$bg="dark";
		$text = "light";
	}
?>
@extends('layouts.app')
@section('styles')
    @parent
	<link rel="stylesheet" href="{{asset('dash/css/stripeglobal.css')}}">
	<link rel="stylesheet" href="{{asset('dash/css/stripenormalize.css')}}">
@endsection

    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
			<div class="content bg-{{$bg}}">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-{{$text}}">Kindly Select Most preferred payment Method</h1>
					</div>
					
					@if(Session::has('message'))
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="fa fa-info-circle"></i> {{ Session::get('message') }}
								</div>
							</div>
						</div>
					@endif
					@if(count($errors) > 0)
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									@foreach ($errors->all() as $error)
									<i class="fa fa-warning"></i> {{ $error }}
									@endforeach
								</div>
							</div>
						</div>
                	@endif
                     @foreach($pics as $pic)
                        <div class="container">                                                
                            <div class="row">
                                <div class='col-lg-4 col-md-4 '>
                                    {{-- <div class='card'> --}}
                                        {{-- <div class='card-body'> --}}
                                            <a href="{{url('/')}}" ><img class="img-fluid" style="max-height: 100px;"
                                            src="{{Storage::url('uploads/'.$pic->image_name)}}" alt="{{$pic->company}}"> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
				</div>
			</div>
    @endsection
