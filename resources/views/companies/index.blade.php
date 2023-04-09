@extends('layouts.main')

@section('title')
Company List
@endsection

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
                      <a href="{{route('company.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <form method="GET" action="{{route('company.search', search_C)}}">
                  <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <!-- <div class="col">
                        <select id="companies_id" class="custom-select">
                          <option value="" selected >All Companies</option>
                          @if($companies->count())
                            @foreach($companies as $id => $name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div> -->
                      <div class="col">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="search_C" id="search_C" value="{{request('name')}}" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary" id="btn-refresh" type="button">
                                  <i class="fa fa-refresh"></i>
                                </button>
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Website</th>
                      <th scope="col">Email</th>
                      <th scope="col">Actions</th>
                    </tr>D
                  </thead>
                  <tbody>
                    @if($companies->count())
                        @foreach($companies as $index => $company)
                            <tr>
                              <th scope="row">{{$index}}</th>
                              <td>{{$company->name}}</td>
                              <td>{{$company->website}}</td>
                              <td>{{$company->email}}</td>
                              <td width="150">
                                <a href="{{route('company.show', $company->id)}}" class="btn btn-sm btn-circle btn-outline-info" title ="Show"><i class="fa fa-eye"></i></a>
                                <a href="{{route('company.edit',$company->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <form method="POST" action="{{route('company.destroy', $company->id)}}">@csrf @method('DELETE') <input type="submit" class="btn btn-sm btn-circle btn-outline-danger"  title="Delete" value="×"></a></form>
                              </td>
                            </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table> 

                <nav class="mt-4">
                    {{$companies->links()}}
                  </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection