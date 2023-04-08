@extends('layouts.main')

@section('title')
Create a new company
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
                <strong>Add New Company</strong>
              </div>           
              <form action="#" method="POST">
                @csrf
                @include('includes._form-alt')
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection