@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <center><div class="ibox-title">
            <h1>Companies</h1>
			<div style="height:10px;"></div>
			<a href="{{ route('companies.create')}}" class=" btn btn-primary btn-outline pull-right" style="margin-top: -7px;" >Create a new company </a></center>           
            </div>
				
            </div>
            
        </div>
    </div>

<div class="table-responsive">
      
	  
<div class="container">           
  <table class="table table-hover">
      <thead>
            <tr>
			     <th>{{trans('Sr. No.')}}</th>
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
                         <td><img src="{{ url('storage/'.$company->logo) }}" alt="" title="" /></td>
                        <td> {{$company->website}}</td>
                        <td>
                                <a href="{{route('companies.edit', ['company' => $company->id])}}" class="fa fa-pencil">
                                     <button class="button" style="color:blue;">Edit</button>
									</a>
                                    <form action="{{ route('companies.destroy', ['company' => $company->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="fa fa-trash-o" onclick="return confirm('Are you sure to delete this data');"> Delete</button>
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
@endsection
