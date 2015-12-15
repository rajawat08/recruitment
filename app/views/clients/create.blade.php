@extends('layouts.master')

@section('title')
   Create New Client
@stop

@section('content')
    <div class="row">
		

		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Add Account 
				&middot; <small>{{ link_to_route('clients.index', 'Back',null,['class' => 'btn btn-info btn-xs']) }}</small>

				</header>
				<div class="panel-body">
					@include('clients.form')

				</div>
			</section> 
		</div>
	</div>
	
	</section>
	</section>
@endsection