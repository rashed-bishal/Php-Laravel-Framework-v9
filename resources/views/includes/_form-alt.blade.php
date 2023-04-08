<div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group row">
          <label for="first_name" class="col-md-3 col-form-label">Name</label>
          <div class="col-md-9">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$company->name ?? old('name')}}"/>
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="name" class="col-md-3 col-form-label">Address</label>
          <div class="col-md-9">
            <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{$company->address ?? old('address')}}</textarea>
            @error('address')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="phone" class="col-md-3 col-form-label">Website</label>
          <div class="col-md-9">
            <input type="text" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{$company->phone ?? old('phone')}}"/>
            @error('phone')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-md-3 col-form-label">Email</label>
          <div class="col-md-9">
            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$company->email ?? old('email')}}"/>
            @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>
        <input type="hidden" name="id_Contact" value="{{$company->id ?? ''}}"/>
        <hr>
        <div class="form-group row mb-0">
          <div class="col-md-9 offset-md-3">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{route('contacts.index')}}" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </div>
      </div>
    </div>
</div>



    