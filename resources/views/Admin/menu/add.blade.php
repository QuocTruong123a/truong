@extends('Admin.Main')
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Menu</h3>
              </div>
              @include('alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('admin/menu/store')}}" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Menu</label>
                    <input type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="menu">Menu Cha</label>
                    <select name="parent_id" class="form-control" name="parent_id">
                    <option value="0"> Menu Cha </option>
                       {!!$optionSelect!!}
                        
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