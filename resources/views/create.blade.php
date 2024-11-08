@extends('base')
@section('title','Create')
@section('content')
<form action="{{route('createpost')}}" method="post">
    @csrf
    <label for="">Todo</label>
    <input type="text" name="name" placeholder="Create Todo">
    <label for="">Date</label>
    <input type="date" name="date">
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection