<html>


<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.3.0/simplex/bootstrap.min.css">
<!-- Optional: Include the jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Active</a></li>
				<li><a href="#">Link</a></li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">Dropdown header</li>
					<li><a href="#">Separated link</a></li>
					<li><a href="#">One more separated link</a></li>
				</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-left">
			<input type="text" class="form-control col-lg-8" placeholder="Search">
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Link</a></li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
				</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="inputdate" class="col-lg-2 control-label">Select Date</label>
						<div class="col-lg-2">
						<input type="date" class="form-control" id="inputdate">
						</div>
						<div class="col-lg-1">
						<input class="form-control btn btn-default" type="submit" value="Search">
						</div>
					</div>
				</form>		
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
							<table class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>Country</th>
									<th>Mail Relay</th>
									<th>Interspire</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>Row 1</td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
								</tr>
								<tr>
									<td>Row 2</td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
								</tr>
								<tr>
									<td>Row 3</td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
								</tr>
								<tr>
									<td>Row 4</td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
								</tr>
								<tr>
									<td>Row 5</td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
									<td><a class="btn btn-link btn-xs" href="">Add New Entry</a></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-3">
							<form class="form-horizontal">
								<fieldset>
									<legend>Mail Relay</legend>
									<div class="form-group">
										<div class="col-lg-12">
										<label class="control-label">Author Name</label>
										<input type="text" class="form-control" id="inputentryname" placeholder="Entry Name">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">
											<textarea class="form-control" rows="3" id="textArea"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword" class="col-lg-2 control-label"></label>
										<div class="col-lg-10">
											<div class="checkbox">
											<label>
											<input type="checkbox">Checkbox
											</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-10 col-lg-offset-2">
											<button class="btn btn-default">Cancel</button>
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>


</html>