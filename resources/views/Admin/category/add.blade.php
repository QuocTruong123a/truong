@extends('Admin.Main')
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Danh Mục</h3>
              </div>
              @include('alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('admin/categories/store')}}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="menu">Danh mục cha</label>
                    <select name="parent_id" class="form-control" name="parent_id">
                    <option value="0">Danh Mục Cha </option>
                    {!!$htmlOption!!}       
                </select>
                </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
@endsection