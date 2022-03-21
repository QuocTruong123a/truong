@extends('Admin.Main')
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa Danh Mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('category.update',['id' => $category -> id]) }}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input value="{{$category ->name}}" type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="menu">Danh mục cha</label>
                    <select name="parent_id" class="form-control" name="parent_id">
                    <option value="0">Danh Mục Cha </option>
                    {!!$htmlOption!!}       
                </select>
                </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
              </form>
            </div>
@endsection