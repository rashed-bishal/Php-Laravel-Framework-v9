@extends('layouts.main')

@section('title')
Edit a company
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
                <strong>Edit Contact</strong>
              </div>           
              	<form action="{{route('company.update', $company->id)}}" method="POST">
              		@csrf
                  @method('PATCH')
              		@include('includes._form-alt')
              	</form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection