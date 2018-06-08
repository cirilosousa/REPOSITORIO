@extends('layouts.app')

@section('title', 'Create Movement')

@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Movements') }}</div>

                <div class="card-body">
<form action="{{route('movements.store', $account->id)}}" method="post" class="form-group">
@include('movements.partials.add-edit')

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Add</button>
        <a class="btn btn-default" href="{{ route('movements', $account->id)}}">Cancel</a>
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