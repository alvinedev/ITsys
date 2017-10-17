@if(count($errors) > 0)
		<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Error/s:
		<ul>
		@foreach($errors->all() as $err)
			<li>{{$err}}</li>
		@endforeach
		</ul>
		</div>
@endif

@if(session('success'))
	<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{session('success')}}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{session('success')}}
	</div>
@endif

