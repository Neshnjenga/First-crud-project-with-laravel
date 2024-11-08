@extends('base')
@section('title','Index')
@section('content')
<a href="{{route('create')}} " class="btn btn-success">Create Todo</a>
<table class="table">
@if (session('error'))
<p style="color:red;">{{session('error')}}</p>
@endif
@if (session('success'))
<p style="color:green;">{{session('success')}}</p>
@endif
    <tr>
        <th>User_id</th>
        <th>Todo</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach ($users as $user )
    <tr>
        <td>{{$user->user_id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->date}}</td>
        <td>
            <a href="/edit/{{$user->id}}" class="btn btn-primary" onclick="return(confirm('Are You sure you want to update'))">Update</a>
            <a href="/delete/{{$user->id}}" class="btn btn-outline-danger" onclick="return(confirm('Are You sure you want to todo'))">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection