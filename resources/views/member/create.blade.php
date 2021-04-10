@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add member</div>

                <div class="card-body">
                    <form method="POST" action=" {{route ('member.store') }} ">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="member_name" value="{{old('member_name')}}">
                            <small class="form-text text-muted">Please enter your name</small>
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="member_surname" value="{{old('member_surname')}}">
                            <small class="form-text text-muted">Please enter your surname</small>
                        </div>
                        <div class="form-group">
                            <label>From where</label>
                            <input type="text" class="form-control" name="member_live" value="{{old('member_live')}}">
                            <small class="form-text text-muted">Please enter your city</small>
                        </div>
                        <div class="form-group">
                            <label>Expreience</label>
                            <input type="text" class="form-control" name="member_experience" value="{{old('member_experience')}}">
                            <small class="form-text text-muted">Please enter your experience</small>
                        </div>
                        <div class="form-group">
                            <label>For how long registered</label>
                            <input type="text" class="form-control" name="member_registered" value="{{old('member_registered')}}">
                            <small class="form-text text-muted">Please enter for how long registered</small>
                        </div>

                        <div class="form-group">
                            <select name="reservoir_id">
                                @foreach ($reservoirs as $reservoir)
                                <option value="{{$reservoir->id}}"> {{$reservoir->title}} </option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-outline-success">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
