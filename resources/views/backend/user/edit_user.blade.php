@extends('admin.admin_master')

@section('admin')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{route('user.view')}}">Data User</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <form method="post" action="{{route('users.update', $editData->id)}}">
                    @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Update User</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="textNama" value="{{($editData->name)}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Group User</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="selectUser">
                          <option>Pilih Group User</option>
                          <option value="Admin" {{($editData->usertype=="admin"? "selected":"")}}>Admin</option>
                          <option value="User" {{($editData->usertype=="User"? "selected":"")}}>User</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="email" value="{{($editData->email)}}" class="form-control">
                      </div>
                    </div>
                    <!-- <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div> -->
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
            </div>
            </div>
          </div>
        </section>
      </div>
@endsection