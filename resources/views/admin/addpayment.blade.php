<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
    $bg="light";
} else {
    $text = "light";
    $bg="dark";
}
?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
        <div class="main-panel">
			<div class="content bg-{{Auth('admin')->User()->dashboard_style}}">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-{{$text}}"> {{$user}} Upload Third Party Payment Gateway</h1>
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
								<div class="alert alert-danger alert-dismissable" role="alert" >
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									@foreach ($errors->all() as $error)
									<i class="fa fa-warning"></i> {{ $error }}
									@endforeach
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
					<div class="mb-4 row">
						<div class="col card p-3 shadow-lg bg-{{$bg}}">
							<div class="accordion accordion-{{$text}} ">
								<form method="post" action="{{url('admin/dashboard/savepaymentmode')}}" enctype="multipart/form-data">
									@csrf
									{{-- <h5 class="text-{{$text}}">Upload Payment proof after payment.</h5> --}}
									<input type="file" name="image_name" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}">
									<br>
									<label for="company" style="color: black !important;">Company Name</label>
									<input type="text" name="company" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}"" required> 
									<br>
									<label for="link" style="color: black !important;">Company Link</label>
									<input type="text" name="link" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}"" required> 
									<br>
									<div >
									<input type="submit" class="btn btn-{{$text}}" value="Save">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    @endsection
