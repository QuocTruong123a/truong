@extends('Admin.Main')

@section('content')

<div class="content">
           
                <div class="row"> 
                <div class="col-md-12">
                      
                            <a href="admin/user/create" class="btn btn-success float-right m-2">Add</a>
                     
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên </th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $users)
                                <tr>
                                    <th scope="row">{{$users -> id}}</th>
                                    <td>{{$users -> name}}</td>
                                    <td> 
                                            <a href="{{ route('user.edit', ['id' => $users->id]) }}"
                                               class="btn btn-default">Edit</a>
                                     
                                       
                                            <a href="{{ route('user.delete', ['id' => $users->id]) }}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a> 
                                    </td>
                                </tr> 
                            @endforeach
                            </tbody>
                        </table>
                        {{$user-> links('layout.paginationlinks')}}

                    </div>
                
                </div>
            </div>
        </div>
             
@endsection