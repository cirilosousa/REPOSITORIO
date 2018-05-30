@extends('layouts.app')

@section('title', 'My Associates List')

@section('content')
	@if(count($associates))

	    <table class="table table-striped">
		    <thead>
		        <tr>
		            <th>Name</th>
		            <th>Email</th>
		        </tr>
		    </thead>
		    <tbody>
			    @foreach ($associates as $associate)
		   			<tr>
			        	<td>{{$associate->name}}</td>	
			     		<td>{{$associate->email}}</td>	
					</tr>
			    @endforeach
			</tbody>
		</table>

	@else
		<div class="row justify-content-center">
			<h1>No Associates found</h1>
		</div>
	@endif

@endsection