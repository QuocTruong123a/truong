@extends('Admin.Main')
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm tài khoản</h3>
              </div>
              @include('alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('admin/user/store')}}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="" class="form-control" name="email" id="exampleInputEmail1" placeholder="Nhập email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu</label>
                    <input type="" class="form-control" name="password" id="exampleInputEmail1" placeholder="Nhập mật khẩu">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
@endsection