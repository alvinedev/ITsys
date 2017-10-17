<!-- Static navbar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">IT SYSTEM</a>
		</div>

		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="{{ $title=='DASHBOARD'?'active':'' }}"><a href="/">HOME</a></li>

				<li class="dropdown {{ $title=='CREATION'?'active':'' }}">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CREATION <span class="caret"></span></a>
				
				<ul class="dropdown-menu">
					<li><a href="/subjects">SUBJECT</a></li>
					<li><a href="/ipaddress">IP ADDRESS</a></li>
				</ul>
				</li>

				<li class="dropdown {{ $title=='NETWORK'?'active':'' }}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">NETWORK <span class="caret"></span></a>
					
					<ul class="dropdown-menu">
					<li><a href="/ipinventory">IP INVENTORY</a></li>
					<li><a href="/reports">REPORTS</a></li>
					</ul>
				</li>

				<li class="{{ $title=='HISTORY'?'active':'' }}"><a href="/history">HISTORY</a></li>
			</ul>
		<ul class="nav navbar-nav navbar-right">
			<li >
				<a href="/search"><span class="glyphicon glyphicon-search" title="search"></span></a>
			</li>
			
			<li ><a href="#">LOGIN</a></li>
		</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</nav>