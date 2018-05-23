@extends('layouts.app')

@section('title', 'Users list')

@section('content')
	@if (Auth::user()->admin)
		@if(count($users))
			<div class="container">
			    <div class="row justify-content-center">
			        <div class="col-md-10">
			            <div class="card">
			                <div class="card-header">{{ __('Filter results') }}</div>
			                <div class="card-body">

			                    <form method="GET" action="{{ route('users') }}">
			                        @csrf
		          					
		                        	<div class="form-group row">

			                            <div class="col-sm-2">
		   			            			<div class="checkbox">
					                			<label>
					                    		<input type="checkbox" name="admin" {{ old('admin') ? 'checked' : '' }}> {{ __('Admin') }}
					                			</label>
				            				</div>   
				            			</div>

				            			<div class="col-sm-2">
											<div class="checkbox">
				                			<label>
				                 				<input type="checkbox" name="blocked" {{ old('blocked') ? 'checked' : '' }}> {{ __('Blocked') }}
			                	 			</label>
				            				</div>
				            			</div>

			                           	<label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>
			                        
				                        <div class="col-md-6">
			                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

			                                @if ($errors->has('name'))
			                                    <span class="invalid-feedback">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
			                            </div>

		 								<div>
		 									<button type="submit" class="btn btn-primary"> {{ __('Filter') }}
					            			</button>
					            		</div>
				            		</div>
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
		    	</tbody>
		    </table>

		@else
			<div class="row justify-content-center">
				<h1>No users found</h1>
			</div>
		@endif
	
	@else
		<div class="row justify-content-center">
			<h1>Administrators only</h1>
		</div>
	@endif

@endsection