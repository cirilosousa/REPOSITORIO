@extends('layouts.app')

@section('title', 'User list')

@section('content')

	@if(count($users))

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('users') }}">
                        @csrf

                        
                            <input label="Name" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="admin" {{ old('admin') ? 'checked' : '' }}> {{ __('Admin') }}
                                </label>
                            </div>                            
                    
           					<div class="checkbox">
                                <label>
                                 	<input type="checkbox" name="blocked" {{ old('admin') ? 'checked' : '' }}> {{ __('Blocked') }}
                                 </label>
                            </div>
                     
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Filter') }}
                            </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>









	    <table class="table table-striped">
	    <thead>
	        <tr>
	            <th>Name</th>
	            <th>Email</th>
				<th>Type</th>
				<th>State</th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach ($users as $user)
   			<tr>
	            <td>{{$user->name}}</td>	     		
	            <td>{{$user->email}}</td>	     		
				<td>
					@if (Auth::user()->id != $user->id)
						@if($user->admin)
							<form action="/users/{{$user->id}}/demote" method="POST" role="form">
			                    {{ method_field('PATCH') }}
			                    {{ csrf_field() }}
			                    <button class="btn btn-xs btn-primary active">Administrator</button>
			                </form>
		                @else
			                <form action="/users/{{$user->id}}/promote" method="POST" role="form">
			                    {{ method_field('PATCH') }}
			                    {{ csrf_field() }}
			                    <button class="btn btn-xs btn-success active">Normal</button>
			                </form>
						@endif
					@else
						@if($user->admin)
							<button class="btn btn-xs btn-primary disabled" href="">Administrator</button>
						@else
							<button class="btn btn-xs btn-success disabled" href="">Normal</button>
						@endif
					@endif
	            </td>

				<td>
					@if (Auth::user()->id != $user->id) 
	                	@if ($user->blocked)
			                <form action="/users/{{$user->id}}/unblock" method="POST" role="form">
			                    {{ method_field('PATCH') }}
			                    {{ csrf_field() }}
			                    <button class="btn btn-xs btn-danger active">Blocked</button>
			                </form>
		                @else
			                <form action="/users/{{$user->id}}/block" method="POST" role="form">
			                    {{ method_field('PATCH') }}
			                    {{ csrf_field() }}
			                    <button class="btn btn-xs btn-success active">Active</button>
			                </form>
	            		@endif
	            	@else	                	
	                	@if ($user->blocked)
	                		<a class="btn btn-xs btn-danger disabled" href="">Blocked</a>
	            		@else
	            			<a class="btn btn-xs btn-success disabled" href="">Active</a>
	            		@endif	            	
	            	@endif
	            </td>
	        </tr>
	    @endforeach
	    </table>

	@else
		<h2>No users found</h2>
	@endif

@endsection