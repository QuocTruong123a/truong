@extends('Admin.Main')

@section('content')

<div class="content">
           
                <div class="row"> 
                <div class="col-md-12">
                      
                            <a href="{{ asset('admin/categories/create') }}" class="btn btn-success float-right m-2">Add</a>
                     
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)

                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                       
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                               class="btn btn-default">Edit</a>
                                     
                                       
                                            <a href="{{ route('category.delete', ['id' => $category->id]) }}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a>
                                      

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                   {{$categories -> links('layout.paginationlinks')}}

                </div>
            </div>
        </div>
             
@endsection