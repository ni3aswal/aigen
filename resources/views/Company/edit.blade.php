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
           
                        <center><h1> Add Company</h1></center>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
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
                            <form class="form-horizontal" method="POST"  action="{{route('companies.update',$company->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="form-group"><label class="col-sm-2 control-label">Company Name:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{$company->name}}"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">email:</label>
                                        <div class="col-sm-10"><input type="email" class="form-control" name="email" value="{{$company->email}}"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">logo :</label>
                                        <div class="col-sm-10">  <img src="{{ asset('storage/'.$company->logo) }}" style="width: 100px;height: 100px;" alt="" title=""></a></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">logo :</label>
                                        <div class="col-sm-10"><input type="file" name="logo" class="form-control" ></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Web site:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="website" value="{{$company->website}}"></div>
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
        </div>
    </div>

</div>

@endsection

