@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Forms</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @isset ($message)
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    @endisset

                    @isset ($data)
                        @foreach($data as $record)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{$record->name}}</label>
                            </div>
                            <div class="col-md-2 text-center">
                                <label for="name" class="col-form-label">Accept</label>
                                <label for="name" class="col-form-label text-center">|</label>
                                <label for="name" class="col-form-label text-md-right">Reject</label>
                            </div>
                        </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
