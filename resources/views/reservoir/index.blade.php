@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List of reservoirs</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($reservoirs as $reservoir)
                        <li class="list-group-item list-line">
                            <div class="list-line__reservoirs">
                                <div class="list-line__reservoirs__title">
                                    {{$reservoir->title}}
                                    {{$reservoir->area}}
                                </div>
    
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('reservoir.pdf', [$reservoir])}}" class="btn btn-warning">PDF</a>
                                <a href="{{route('reservoir.edit',[$reservoir])}}" class="btn btn-info">EDIT</a>
                                <form method="POST" action="{{route('reservoir.destroy', [$reservoir])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
