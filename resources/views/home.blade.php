@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="container">
 	<div>
 <ul class="nav nav-tabs">
    <li class="active"><a href="{{ url('home/') }}">Dashboard</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Company <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{ route('companies.index') }}">All companies</a></li>
        <li><a href="{{ route('companies.create') }}">Add Company</a></li>                    		
      </ul>
	  
    </li>
	<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Employee <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{ route('employes.index') }}">All Employes</a></li>
        <li> <a href="{{ route('employes.create') }}">Add Employee</a></li>                    		
      </ul>
    </li>
    <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
	</li>
  </ul>
  </div>
  <div style="height:10px"></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

            </div>
				
                </div>
            </div>
        </div>
    
@endsection
