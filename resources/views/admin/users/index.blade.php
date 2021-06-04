@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
            <div class="box">
                <div class="box-header">Foydalanuvchilar</div>
                <div class="box-body">
                    <a href="{{ url('/admin/users/create') }}" class="btn btn-success add_new btn-sm" title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> Yangi qo'shish
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Qidiruv...">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th><th>Nomi</th><th>Email</th><th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td>
                                    <td>{{ $item->email }}</td>
                                    
                                    <td>
                                        <a href="{{ url('/admin/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'url' => ['/admin/users', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete User',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        
    </div>
</div>
@endsection
