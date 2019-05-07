@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="app"><br/>
                        <div class="container col-lg-offset-4 col-lg-4">
                            <div class="row">
                                @if(count($errors))
                                    @foreach($errors->all() as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                                
                                <upload-form></upload-form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
