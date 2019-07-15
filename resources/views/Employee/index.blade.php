@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <center><div class="ibox-title">
            <h1>Employees</h1>
			<div style="height:10px;"></div>
			<a href="{{ route('employes.create')}}" class=" btn btn-primary btn-outline pull-right" style="margin-top: -7px;" >Add new Employee </a></center>           
            </div>
            </div>
        </div>
    </div>

<div class="table-responsive">



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
                               <button class="fa fa-trash-o">Edit</button>
									</a>
                                    <form action="{{ route('employes.destroy', ['employee' => $employee->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="fa fa-trash-o" onclick="return confirm('Are you sure to delete this data');">Delete</button>
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

  
@endsection
