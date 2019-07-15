@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Employee</div>
 @if(session()->has('successemployee'))
   <div id="msg" class="alert alert-success">
        {{ session()->get('successemployee') }}
    </div>
	<script>
	setTimeout(function(){
    $('#msg').hide()
}, 3000) 
	</script>
@endif
                <div class="card-body">
                    <form method="POST" action="{{route('employes.store') }}" enctype="multipart/form-data">
                        @csrf
					<!--  <input name="_method" type="hidden" value="PATCH"> -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name :</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name :</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}" placeholder="Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number :</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone Number" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="company_id" class="col-md-4 col-form-label text-md-right">Company Name :</label>

                            <div class="col-md-6">
                                  <select name="company_id" class="form-control">
                                                @foreach ($campanies as $campany)
                                                    <option value="{{$campany->id}}">{{$campany->name}}</option>
                                                @endforeach
                                            </select>				                
                            </div>
                        </div>
                     
                        
									
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
