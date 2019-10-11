@extends('layouts.app')
@section('content')

		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos') }}</div>

                <div class="card-body">
                    	<ul class="list-group">
                    		@foreach($todos as $todo)
 						<li class="list-group-item">
 							{{$todo->name}}
 							
                <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                   @if(!$todo->completed)
                    <a href="/todos/{{ $todo->id }}/complete" style="color: white;" class="btn btn-warning btn-sm float-right">Complete</a>
                        @endif
 						</li>


                    		@endforeach

                    	</ul>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection