@extends('Admin.Main')

@section('content')
@section('css')
<link rel="stylesheet" href="public/Admin/css/add.css"/>
@endsection
@section('js')
<script  src="public/Admin/js/add.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<div class="content"> 
                <div class="row"> 
                <div class="col-md-12"> 
                            <a href="admin/product/create" class="btn btn-success float-right m-2">Add</a> 
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>        
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody> 
                            @foreach($product as $products)          
                                <tr>
                                    <th scope="row">{{$products -> id}}</th>
                                    <td>{{$products -> name}}</td>
                                    <td>{{number_format($products -> price)}}</td>
                                    <td><img class="produtct_image_150 " src="public{{$products -> feature_image_path}}" alt=""></td>   
                                    <td>{{$products->category->name }}</td>
                                    <td>  
                                           <a href="{{route('product.edit',['id' => $products -> id])}}"
                                               class="btn btn-default">Edit</a> 
                                            <a href=""
                                            data-url="{{route('product.delete',['id' => $products -> id])}}"
                                               class="btn btn-danger action_delete">Delete</a> 
                                    </td>
                                </tr>
                      @endforeach 
                            </tbody>
                        </table>
                        {{$product -> links('layout.paginationlinks')}}
                    </div>
                
                </div>
            </div>
        </div>
             
@endsection