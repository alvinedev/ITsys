@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li class="active">SEARCH</li>

    </ol>
@endsection
@section('body')

	<div class="col-md-6">

	    <div class="input-group">
	      <select class="form-control" id="idSearch">
	      	<option value="0" disabled selected >CHOOSE NAME..</option>
	      	@foreach($sub as $s)
	      		<option value="{{ $s->id}}">{{ $s->name}}</option>
	      	@endforeach
	      </select>
	      <span class="input-group-btn">
	        <input type="button" value="SEARCH" class="btn btn-primary btnSearch">

	      </span>
	    </div><!-- /input-group -->

	</div>
		<div class="hide searchContainer">
			<div class="col-md-12">
			<br>
			</div>
			<div class="col-md-6 ">
				<div class="panel panel-success">
					<div class="panel-heading">SUBJECT</div>

					<div class="panel-body  table-des1">
						<table class="col-md-12">
							<tr class="sName">
								<th>NAME</th>
								<td></td>
							</tr>
							<tr class="sDepartment">
								<th>DEPARTMENT</th>
								<td></td>
							</tr>
							<tr class="sDomain">
								<th>DOMAIN NAME</th>
								<td></td>
							</tr>
							<tr class="sComputer">
								<th>COMPUTER NAME</th>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">IP ADDRESS</div>

					<div class="panel-body table-des1">
						<table class="col-md-12">
							<tr class="sIpaddress">
								<th>IP ADDRESS</th>
								<td></td>
							</tr>
							<tr class="sSubnet">
								<th>SUBNET MASK</th>
								<td></td>
							</tr>
							<tr class="sDefault">
								<th>DEFAULT GATEWAY</th>
								<td></td>
							</tr>
							<tr class="sDns1">
								<th>DNS SERVER 1</th>
								<td></td>
							</tr>
							<tr class="sDns2">
								<th>DNS SERVER 2</th>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">ACTION</div>

					<div class="panel-body">

					</div>
				</div>
			</div>
		</div>
	
@endsection