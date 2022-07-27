@extends('admin.admin_master')

@section('admin')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data STNK</h1>
              <div class="section-header-breadcrumb">
              <div class="buttons">
                    <a href="{{route('stnk.add')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Add Data</a>
              </div>
            </div>
          </div>

          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table STNK</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>No Plat</th>
                            <th>Pemilik</th>
                            <th>Harga</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($allDataStnk as $key => $stnk)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$stnk->noplat}}</td>
                            <td>{{$stnk->pemilik}}</td>
                            <td>{{$stnk->harga}}</td>
                            <td>
                            <a href="{{route('stnk.edit', $stnk->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('stnk.delete', $stnk->id)}}" id="delete" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection