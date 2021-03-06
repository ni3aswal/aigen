@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Company</div>

                <div class="card-body">
                    <form method="POST" action="{{route('companies.update',$company->id) }}" enctype="multipart/form-data">
                        @csrf
						 <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Name :</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$company->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$company->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
						<div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Logo :</label>

                            <div class="col-md-6">
							<img src="{{ URL::asset('storage'.$company->logo) }}" style="width: 100px;height: 100px;" alt="" title=""/>                    
                            </div>
                        </div>
						
                        <div class="form-group row">
						<label for="logo" class="col-md-4 col-form-label text-md-right">Logo :</label>
                         <div class="col-md-6">
                                <input type="file" name="logo" class="form-control" >
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Web site:</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{$company->website}}" required autocomplete="website" autofocus>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
