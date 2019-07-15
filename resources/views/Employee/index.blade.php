@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees</div>
                   <a href="{{ route('employes.create')}}" class=" btn btn-primary btn-outline pull-right" style="margin-top: -7px;" >Add new Employee </a></center>    
 @if(session()->has('updatedemployee'))
    <div id="msg" class="alert alert-success">
        {{ session()->get('updatedemployee') }}
    </div>
	<script>
	setTimeout(function(){
    $('#msg').hide()
}, 3000) 
	</script>
@endif					   
                <div class="card-body">
                    	  
        <form action="{{route('search') }}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input id="q" type="text" class="form-control" name="q"
                    placeholder="Search users"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search">Search</span>
                    </button>
                </span>
            </div>
        </form> 	  
<div class="container">           
  <table class="table table-hover">
      <thead>
            <tr>
			    
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
				<th>Company</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            </thead>
			
            <tbody>
                    @forelse($employes as $employee)
                    <tr>
                         <td>{{$employee->first_name}}</td>
                         <td>{{$employee->last_name}}</td>
                         <td>{{$employee->email}}</td>
						 <td>{{$employee->company->name}}</td>
                        <td> {{$employee->phone_number}}</td>
                        <td>
                                <a href="{{route('employes.edit', ['employee' => $employee->id])}}" class="fa fa-pencil">
                               <button class=" btn btn-primary btn-outline pull-right" style="margin-top:-7px;background-color:green;">Edit</button>
									</a>								
                                    <form action="{{ route('employes.destroy', ['employee' => $employee->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class=" btn btn-primary btn-outline pull-right" style="margin-top:-7px;background-color:red;" onclick="return confirm('Are you sure to delete this data');">Delete</button>
                                    </form>
                        </td>
                        
             </tr>
         
         @empty
         
             <h1>No Employee</h1>
         
         @endforelse
            </tbody>
           
            </table>
               {{ $employes->links() }}

  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
