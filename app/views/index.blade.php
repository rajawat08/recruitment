@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-lg-12">
      
      <section class="panel">
          <div class="panel-body" style="height:500px;">              
              <div class="task-thumb-details">
                  <h1><a href="">{{Auth::user()->name}}</a></h1>
                  <p>{{Auth::user()->status}}</p>
              </div>
          </div>
          
      </section>
      
  </div>
  
</div>		
              
@endsection

