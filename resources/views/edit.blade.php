@extends('base')
@section('title','Edit')
@section('content')
<form action="{{route('editpost',$users->id)}}" method="post">
    @csrf
    <label for="">Todo</label>
    <input type="text" name="name" placeholder="Create Todo" value="{{$users->name}}">
    <label for="">Date</label>
    <input type="date" name="date" value="{{$users->date}}">
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection