@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
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

      <div class="row">
        <div class="col-lg-12">
           
                        <center><h1>Add Employee</h1></center>
                           <div class="panel-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form class="form-horizontal" method="POST"  action="{{route('employes.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group"><label class="col-sm-2 control-label">First Name :</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="first_name" placeholder="First Name"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Last Name :</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="last_name" placeholder="Last Name"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Email :</label>
                                        <div class="col-sm-10"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">
								 Phone :</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="phone_number" placeholder="Phone Number"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Company :</label>
                                        <div class="col-sm-10">
                                            <select name="company_id" class="form-control">
                                                @foreach ($campanies as $campany)
                                                    <option value="{{$campany->id}}">{{$campany->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                    </div>
                            
    
                            </form>
                            </div>
                     
                    </div>
            </div>
        </div>


@endsection

