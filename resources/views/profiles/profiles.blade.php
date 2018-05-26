@extends('layouts.app')

@section('title', 'User list')

@section('content')
	@if(count($users))

		<div class="container">
		    <div class="row justify-content-center">
		        <div class="col-md-6">
		            <div class="card">
		                <div class="card-header">{{ __('Filter results') }}</div>
		                <div class="card-body">

		                    <form method="GET" action="{{ route('profiles') }}">
		                        @csrf
	          					
	                        	<div class="form-group row">

		                           	<label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
		                        
			                        <div class="col-md-8">
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

			     		@php
							$test=App\Models\Associate_member::where('main_user_id','=',Auth::user()->id)  
			     							 			 	 ->where('associated_user_id','=',$user->id)
			     				   					      	 ->get();
			     		@endphp

			    		@if (count($test)) 
			               	<a class="btn btn-xs btn-primary" href="">Associated</a>
			            @endif
						
						@php
							$test=App\Models\Associate_member::where('main_user_id','=',$user->id)  
			     							 			 	 ->where('associated_user_id','=',Auth::user()->id)
			     				   					      	 ->get();
			     		@endphp
						
			    		@if (count($test)) 
			                <a class="btn btn-xs btn-primary" href="">Associate-of</a>
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

@endsection