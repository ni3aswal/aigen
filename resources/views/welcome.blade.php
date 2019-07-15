@extends('layouts.app')

@section('content')

<div class="container">
 	
  <div style="height:10px"></div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
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
                <div class="card-header">Search Results</div>
 @if(session()->has('message'))
    <div id="msg" class="alert alert-success">
        {{ session()->get(message) }}
    </div>
	<script>
	setTimeout(function(){
    $('#msg').hide()
}, 3000) 
	</script>
@endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="container">
						@if(isset($users))
						<h2>User details</h2>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Number</th>
									
									</tr>
								</thead>
								<tbody>
									@foreach($users as $dummy)
									<tr>
										<td>{{$dummy->first_name}}</td>
										<td>{{$dummy->last_name}}</td>
										<td>{{$dummy->email}}</td>
										<td>{{$dummy->phone_number}}</td>
										<td>
                                <a href="{{route('employes.edit', ['employee' => $dummy->id])}}" class="fa fa-pencil">
                               <button class=" btn btn-primary btn-outline pull-right" style="margin-top:-7px;background-color:green;">Edit</button>
									</a>								
                                    <form action="{{ route('employes.destroy', ['employee' => $dummy->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class=" btn btn-primary btn-outline pull-right" style="margin-top:-7px;background-color:red;" onclick="return confirm('Are you sure to delete this data');">Delete</button>
                                    </form>
                        </td>
									</tr>
									@endforeach
					 
								</tbody>
							</table>
							{!! $users->render() !!}@endif
						</div>
                </div>

            </div>
				
                </div>
            </div>
        </div>
    
@endsection
