@extends('layouts.main')

@section('title')
{{$company->name}} - Information
@endsection

@section('navbar')
	@include('includes.navbar')
@endsection

@section('content')
	<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Contact Details</strong>
              </div>           
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Name</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$company->name}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-md-3 col-form-label">Address</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$company->address}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="website" class="col-md-3 col-form-label">Website</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$company->website}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$company->email}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                                <a href="{{route('company.show', $company->id)}}" class="btn btn-sm btn-circle btn-outline-info" title ="Show"><i class="fa fa-eye"></i></a>
                          <a href="{{route('company.edit',$company->id)}}" class="btn btn-info">Edit</a>
                          <a href="" class="btn btn-outline-danger"><form action="{{route('company.destroy', $company->id)}}" method="POST">@csrf @method('DELETE')<input value="Delete" type="submit"/></form></a>
                          <a href="{{route('company.index')}}" class="btn btn-outline-secondary">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection