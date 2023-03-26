@extends('layouts.main')


@section('navbar')
    @include('includes.navbar')
@endsection

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Contacts</h2>
                    <div class="ml-auto">
                      <a href="{{route('contacts.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col">
                        <select class="custom-select">
                          <option value="" selected>All Companies</option>
                          <option value="1">Company One</option>
                          <option value="2">Company Two</option>
                          <option value="3">Company Three</option>
                        </select>
                      </div>
                      <div class="col">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="button">
                                  <i class="fa fa-refresh"></i>
                                </button>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Company</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($contacts->count())
                        @foreach($contacts as $index => $contact)
                            <tr>
                              <th scope="row">{{$index+$contacts->firstItem()}}</th>
                              <td>{{$contact->first_name}}</td>
                              <td>{{$contact->last_name}}</td>
                              <td>{{$contact->email}}</td>
                              <td>{{$contact->company->name}}</td>
                              <td width="150">
                                <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                              </td>
                            </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table> 

                <nav class="mt-4">
                    {{$contacts->links()}}
                  </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection