@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List of members</h2>
                    <div class="make-inline">
                        <form action="{{route('member.index')}}" method="get" class="make-inline">
                            <div class="form-group make-inline">
                                <label>Member: </label>
                                <select class="form-control" name="id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif>Select reservoir</option>
                                    @foreach ($reservoirs as $reservoir)
                                    <option value="{{$reservoir->id}}" @if($filterBy==$reservoir->id) selected @endif>
                                        {{$reservoir->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info ">Filter</button>
                        </form>
                        <a href="{{route('member.index')}}" class="btn btn-info">Clear filter</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($members as $member)
                        <li class="list-group-item list-line">
                            <div>
                                {{$member->name}} {{$member->surname}}
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('member.edit',[$member])}}" class="btn btn-info">EDIT</a>
                                <form method="POST" action="{{route('member.destroy', [$member])}}">
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
