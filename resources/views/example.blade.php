@extends('layouts.app')


@section('title', 'Example')


	@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">This is just an example</div>
                <td><img src="{{ asset('/storage/public/example/first_Page.png') }}" widht="150" height="150" /></td>
                <td> <label class="col-md-10 col-form-label text-md-center">{{ __('First Page') }}</label></td>
                 <td><img src="{{ asset('/storage/public/example/accounts.png') }}" widht="150" height="150" /></td>
                <td> <label class="col-md-10 col-form-label text-md-center">{{ __('Accounts') }}</label></td>
 <td><img src="{{ asset('/storage/public/example/movement~s.png') }}" widht="150" height="150" /></td>
                <td> <label class="col-md-10 col-form-label text-md-center">{{ __('Movements') }}</label></td>
            </div>
			</div>
		</div>
	</div>
</div>

@endsection