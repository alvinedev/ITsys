@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li class="active">SUBJECTS</li>

    </ol>
@endsection
@section('body')

	<div class="col-md-12" >
		<a class="btn btn-primary btn-sm glyphicon glyphicon-plus" href="/subjects/create" role="button"><span style="font-family:arial;font-weight: bolder;font-size:15px">ADD</span></a>
		<input type="text" id="sub_search" name="sub_search" style="float: right" placeholder="Search...">
	</div>
	<div>
	
	@if(count($subjects) > 0)
	<table class="table table-hover sub-table">
		<thead> 
		<tr> 
			<th>#</th> 
			<th>NAME</th> 
			<th>DEPARTMENT</th> 
			<th>COMPUTER NAME</th> 
			<th>DOMAIN NAME</th> 
			<th>CREATED DATE</th> 
			<th>UPDATED DATE</th> 
			<th>ACTIONS</th> 
		</tr> 
		</thead> 
		<tbody>
		<?php
		$ctr = 1;
		?>
			@foreach($subjects as $sub)

			<tr> 
				<th scope="row">{{$ctr}}</th> 
				<td>{{$sub->name}}</td> 
				<td>{{$sub->location}}</td> 
				<td>{{$sub->computer_name}}</td> 
				<td>{{$sub->domain_name}}</td> 
				<td>{{$sub->created_at}}</td> 
				<td>{{$sub->updated_at}}</td> 
				<td>
					<div>
					<div class="btn-group" role="group" aria-label="...">
						<a href="/subjects/{{ $sub->id }}" class="btn btn-info glyphicon btn-xs glyphicon-eye-open" title="view"></a>
						<a href="/subjects/{{ $sub->id }}/edit" class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="edit"></a>
						<a href="#" class="btn btn-danger glyphicon btn-xs glyphicon-trash" title="delete"></a>	
					</div>
					</div>
				</td> 
			</tr>
			<?php $ctr++ ?>
			@endforeach 
		</tbody> 
	</table>
		<div class="col-md-12" style="text-align:center">
				{{ $subjects->links() }}
		</div>
	@else
	<div style="text-align:center">
		No Record to Show
	</div>
	@endif
		
	</div>
@endsection