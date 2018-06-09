@extends('layouts.app')


@section('title', 'Example')


	@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">This is just an example</div>
                <td><img id="first_Page.png" 
        src="{{Storage::url('app/storage/public/EXAMPLE/first_Page.png')}}"
      width="100"/>
</td>
             </div>   

                

 
			</div>
		</div>
	</div>
</div>

@endsection