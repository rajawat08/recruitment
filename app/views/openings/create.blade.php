@extends('layouts.master')

@section('title')
	Create New Opening
@stop

@section('content')
    <div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Create New Opening
				&middot; {{ link_to_route('openings.index', 'Back' ,null, ['class'=>"btn btn-info btn-xs"]) }}

				</header>
				<div class="panel-body">
					@include('openings.form')

				</div>
			</section> 
		</div>
	</div>
	
	</section>
	</section>
@endsection