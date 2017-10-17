@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/ipaddress">IP ADDRESS</a></li>
    	<li class="active">DISPLAY</li>
    </ol>
@endsection

@section('body')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 <span style="font-size:25px">{{$ipadd->ipaddress}}</span><br />
				<div  style="float:right;margin:-40px 0 0 0">
				<small>Created Date: {{ $ipadd->created_at}}</small><br>
				<small>Updated Date: {{ $ipadd->updated_at}}</small>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-6">
					<table class="col-md-12 table-des1">
						<tr>
							<th>SUBNET MASK:</th>
							<td>{{ $ipadd->subnet_mask}}</td>
						</tr>
						<tr>
							<th>DEFAULT GATEWAY:</th>
							<td>{{ $ipadd->default_gateway==null?"N/A":$ipadd->default_gateway}}</td>
						</tr>
						<tr>
							<th>DNS SERVER 1:</th>
							<td>{{ $ipadd->dns_server1==null?"N/A":$ipadd->dns_server1}}</td>
						</tr>

					</table>
				</div>
				<div class="col-md-6">
				<table class="col-md-12 table-des1">

					<tr>
						<th>DNS SERVER 2:</th>
						<td>{{ $ipadd->dns_server2==null?"N/A":$ipadd->dns_server2}}</td>
					</tr>
					<tr>
						<th>ASSIGNED:</th>
						<td>
						@if($ipadd->assign == 0)
							N/A <a href="#" ><small>[Assign this IP]</small></a>
						@else

						@endif
						</td>
					</tr>

				</table>
				</div>
			</div>
	</div>
@endsection
