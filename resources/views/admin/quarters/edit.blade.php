@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">Tahrirlash</div>
                    <div class="box-body">
                        <a href="{{ url('/admin/quarters') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Orqaga</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($quarter, [
                            'method' => 'PATCH',
                            'url' => ['/admin/quarters', $quarter->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.quarters.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            
        </div>
    </div>
@endsection
