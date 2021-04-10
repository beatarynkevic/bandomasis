@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create reservoir</div>

                <div class="card-body">
                    <form method="POST" action="{{route('reservoir.store')}}">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title')}}">
                            <small class="form-text text-muted">Please enter reservoir title</small>
                        </div>
                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area')}}">
                            <small class="form-text text-muted">Please enter area</small>
                        </div>
                        <div class="form-group">
                            <label>About</label>
                            <textarea id="summernote" name="reservoir_about"></textarea>
                            <small class="form-text text-muted">Parasykite ka nors :) </small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-outline-success">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });

</script>
@endsection
