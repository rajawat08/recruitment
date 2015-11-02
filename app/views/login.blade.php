@extends('layouts.login')

@section('content')

    
    
     	{{ Form::open(['route' => 'login.store', 'class' => 'form-signin']) }}
        <h2 class="form-signin-heading">Recruitment CRM</h2>
        <div class="login-wrap">

                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control']) }}
                {{ $errors->first('username', '<div class="text-danger">:message</div>') }}
            
            
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
                {{ $errors->first('password', '<div class="text-danger">:message</div>') }}
                
                <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
                </label>

            
                {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                

            <!-- <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>      -->

        </div>
        {{ Form::close()}}
    

@endsection