<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('/asset_accout/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('/asset_accout/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('/asset_accout/images/1.jpg')">
			<div class="inner">
				<form action="">
					<h3>Login Form</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Email:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 15px;">@</i>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" class="form-control" placeholder="********">
							</div>
						</div>
					</div>
					<div class="form-end">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember password
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="button-holder">
							<button>Login now</button>
						</div>

					</div>
				</form>
			</div>
		</div>

	</body>
</html>
