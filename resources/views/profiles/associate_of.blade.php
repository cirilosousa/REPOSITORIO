@extends('layouts.app')

@section('title', 'I Am An Associate of')

@section('content')
	@if(count($associate_of))

	    <table class="table table-striped">
		    <thead>
		        <tr>
		            <th>Name</th>
		            <th>Email</th>
		        </tr>
		    </thead>
		    <tbody>
			    @foreach ($associate_of as $user)
		   			<tr>
			        	<td>{{$user->name}}</td>	
			     		<td>{{$user->email}}</td>

			     		<td>
				     		<form action="/accounts/{{$user->id}}/" method="GET" role="form">
								{{ csrf_field() }}
								<button class="btn btn-xs btn-success active">Accounts
								</button>
							</form>
						</td>
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