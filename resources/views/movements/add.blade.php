@extends('layouts.app')

@section('title', 'Create Movement')

@section('content')

@if (count($errors) > 0)
  
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Movements') }}</div>

                <div class="card-body">
<form action="{{route('movements.store', $account->id)}}" method="post" class="form-group">
@include('movements.partials.add-edit')

 <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Movement') }}
                                </button>
        <a class="btn btn-default" href="{{ route('movements.index', $account->id)}}">Cancel</a>
    </div>
</form>

  <script type="text/javascript">
        $(document).ready(function() {
            $('#revenues').hide();
            $('#category').on('change', function() {
                if( $('#category option:selected').val() == "expense" ) {
                    $('#expenses').show();
                    $('#revenues').hide();
                } else {
                    $('#expenses').hide();
                    $('#revenues').show();
                }
            });
        });
    </script>
@endsection
</div>
</div>
</div>
</div>
</div>
</div>