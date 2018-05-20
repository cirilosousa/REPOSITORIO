@extends('layouts.app')

@section('title', 'User list')

@section('content')

	@if(count($users))
	    <table class="table table-striped">
	    <thead>
	        <tr>
	        	<th>Photo</th>
	            <th>Name</th>
	            <th>Associations</th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach ($users as $user)
   			<tr>
	            <td><img src="{{ asset('/storage/profiles/' . $user->profile_photo) }}"></td>
	     		<td>{{$user->name}}</td>	
	     		<td>
	               	<a class="btn btn-xs btn-primary" href="">Associated</a>
	                <a class="btn btn-xs btn-primary" href="">Associate-of</a>
	            </td>
			</tr>
	    @endforeach
	    </table>

	@else
		<h2>No users found</h2>
	@endif

@endsection