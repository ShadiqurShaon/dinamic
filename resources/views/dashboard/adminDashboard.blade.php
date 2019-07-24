@extends('layouts.app')

@section('content')


<h1>this is admin dashboard</h1>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Bulk upload
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
               
            </form>
        </div>
    </div>
</div>
@endsection