@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Files</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @isset ($data)
                        @foreach($data as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                    <label for="name" class="col-md-4 col-form-label"><a href="{{ route('download-file',['id'=>$record->id,'name'=>$record->name ]) }}">{{$record->name}}</a></label>
                                @if(Auth::user()->hasAnyRole(['admin']))
                                    <label for="name" class="col-md-4 col-form-label"><a href="{{ route('delete-file',['id'=>$record->id,'name'=>$record->name ]) }}">Delete File</a></label>
                                @endif
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
