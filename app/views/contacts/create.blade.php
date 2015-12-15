@extends('layouts.master')
@section('title')
	Create Contact
@stop
@section('content')
    <div class="row">
		

		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Add Contact 
				&middot; <small>{{ link_to_route('contacts.index', 'Back',null,['class' => 'btn btn-info btn-xs']) }}</small>

				</header>
				<div class="panel-body">
					@include('contacts.form')

				</div>
			</section> 
		</div>
	</div>
	
	</section>
	</section>
@endsection