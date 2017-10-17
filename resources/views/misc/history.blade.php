@extends('templates.admin')

@section('title',$title)

@section('titleHead')
<ol class="breadcrumb">
	<li><a href="/">HOME</a></li>
	<li class="active">HISTORY</li>
</ol>

@endsection

@section('body')
<div class="col-md-8 col-md-offset-2">
	<table class="table table-hover">
		<thead> 
			<tr> 
				<th>#</th> 
				<th>NAME</th>
				<th>MODULE</th>
				<th>ACTION</th>
				<th>CREATED DATE</th>
				<th style="text-align:center">ACTION</th>
			</tr> 
		</thead> 
		<tbody>
		<?php
			$ctr =1;
		?>
			@foreach($hist as $h)
				<?php
					 $iden= Crypt::encrypt($h->id);
				?>
				<tr>
					<td>{{ $ctr}}</td>
					<td>{{ $h->users}}</td>
					<td>{{ $h->module}}</td>
					<td>{{ $h->action}}</td>
					<td>{{ $h->created_at}}</td>
					<td style="text-align:center" >
						<div class="btn-group" role="group" aria-label="..." >
							<a href="/history/view/{{ $iden}}" class="btn btn-info glyphicon btn-xs glyphicon-eye-open" title="view"></a>
						</div>
					</td>
				</tr>

				<?php $ctr++ ?>
			@endforeach()

		</tbody>
		
	</table>
</div>
	
@endsection