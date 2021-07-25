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
						<h1 class="title1 text-{{$text}}">Upload Proof of payment</h1>
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
							<div>
								<form method="post" action="{{action('App\Http\Controllers\SomeController@savedeposit')}}" enctype="multipart/form-data">
									@csrf
									{{-- <input type="hidden" name="amount" value="{{$amount}}"> --}}
									<input type="hidden" name="pay_type" value="{{$pay_type}}">
									<input type="hidden" name="plan_id" value="{{$plan_id}}">
										<h5 class="text-{{$text}}">Upload Payment proof after payment.</h5>
										<input type="file" name="proof" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}">
									<br>
									<label for="amount">Amount</label>
									<input type="number" name="amount" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}"> 
									<br>
									<h5 class="text-{{$text}}">Payment Mode Used:</h5>
									<select name="payment_mode" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}" required>
										<option>Select Payment Method Used</option>
										<option>Moon Pay</option>
										<option>Simplex</option>
										<option>Easycrypto</option>
										<option>Binance</option>
										<option>Coinbase</option>
										<option>Coinjar</option>
										<option>Advcash</option>
										<option>Itelz</option>
										<option>Safello</option>
										<option>Paybis</option>
										<option>Coinmama</option>
										<option>Paxful</option>
										<option>Localbitcoin</option>
										<option>Banxa</option>
										<option>Bit2me</option>
										<option>Nordikoin</option>
										<option>Bitonic</option>
										<option>Cointree</option>
										
									</select>
									<br> <br>
									<div >
										<input type="submit" class="btn btn-{{$text}}" value="Submit payment">
									</div> 
									{{-- <input type="hidden" name="amount" value="{{$amount}}"> --}}
									{{-- <input type="hidden" name="pay_type" value="{{$pay_type}}"> --}}
									{{-- <input type="hidden" name="plan_id" value="{{$plan_id}}"> --}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							</div>
							{{-- @endif --}}
						</div>
					</div>







				</div>
			</div>
    @endsection
