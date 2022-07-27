@extends('admin.admin_master')

@section('admin')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data STNK</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{route('stnk.view')}}">Data STNK</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <form method="post" action="{{route('stnks.update', $editData->id)}}">
                    @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data STNK</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Plat</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="noplat" class="form-control" value="{{($editData->noplat)}}" >
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pemilik</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="pemilik" class="form-control" value="{{($editData->pemilik)}}" >
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="harga" class="form-control" value="{{($editData->harga)}}" >
                      </div>
                    </div>
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