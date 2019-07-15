@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies</div>
                   <a href="{{ route('companies.create')}}" class=" btn btn-primary btn-outline pull-right" style="margin-top: -7px;" >Add new company </a></center>  
 @if(session()->has('updatedcompany'))
 <div id="msg" class="alert alert-success">
        {{ session()->get('updatedcompany') }}
    </div>
	<script>
	setTimeout(function(){
    $('#msg').hide()
}, 3000) 
	</script>
@endif				   
                <div class="card-body">
                  
<div class="container">           
  <table class="table table-hover">
      <thead>
            <tr>
                <th>{{trans('Company Name')}}</th>
                <th>{{trans('Email')}}</th>
                <th>{{trans('Logo')}}</th>
                <th>{{trans('Website')}}</th>
                <th>{{trans('Action')}}</th>
            </tr>
            </thead>
    <tbody>
                    @forelse($campanies as $company)
                    <tr>
         
                         <td>{{$company->name}}</td>
                         <td>{{$company->email}}</td>
                         <td><img src="{{ url('storage/public/'.$company->logo) }}" alt="" title="" /></td>
                        <td> {{$company->website}}</td>
                        <td>
                                <a href="{{route('companies.edit', ['company' => $company->id])}}" class="fa fa-pencil">
                                    <button class=" btn btn-primary btn-outline pull-right" style="margin-top:-7px;background-color:green;">Edit</button>
									</a>
                                    <form action="{{ route('companies.destroy', ['company' => $company->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class=" btn btn-primary btn-outline pull-right" style="margin-top:-7px;background-color:red;" onclick="return confirm('Are you sure to delete this data');"> Delete</button>
                                    </form>
                        </td>
                        
             </tr>
         
         @empty
             <h1>No Company</h1>
         
         @endforelse
            </tbody>
	
  </table>
   {{ $campanies->links() }}
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
