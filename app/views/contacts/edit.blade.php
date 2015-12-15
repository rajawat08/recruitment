@extends('layouts.master')
@section('title')
	Edit Contact | {{$contact->first_name." ".$contact->last_name}}
@stop
@section('content')

    <div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Edit
				&middot;<small>{{ link_to_route('contacts.index', 'Back',null,['class' => 'btn btn-info btn-xs']) }}</small>
				</header>
				<div class="panel-body">
					@include('contacts.form', array('model' => $contact))

				</div>
			</section> 
		</div>
	</div>
	
@endsection