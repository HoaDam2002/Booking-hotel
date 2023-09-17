<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('/asset_accout/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('/asset_accout/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('/asset_accout/images/1.jpg');">
			<div class="inner">
				<form action="">
					<h3>Registration Form</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Username:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-account-o"></i>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Email:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 15px;">@</i>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" class="form-control" placeholder="********">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Repeat Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<input type="password" class="form-control" placeholder="********">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Country:</label>
							<div class="form-holder select">
								<select class="form-control" id="tinhthanh" name="tinhthanh">
                                    <option value="hn">Hà Nội</option>
                                    <option value="hcm">Hồ Chí Minh</option>
                                    <option value="dn">Đà Nẵng</option>
                                    <option value="hue">Huế</option>
                                    <option value="ct">Cần Thơ</option>
                                    <option value="haiduong">Hải Dương</option>
                                    <option value="ninhbinh">Ninh Bình</option>
                                    <option value="thaibinh">Thái Bình</option>
                                    <option value="nghean">Nghệ An</option>
                                    <option value="hagiang">Hà Giang</option>
                                    <option value="quangninh">Quảng Ninh</option>
                                    <option value="vinhphuc">Vĩnh Phúc</option>
                                    <option value="laochai">Lào Cai</option>
                                    <option value="dienbien">Điện Biên</option>
                                    <option value="laichau">Lai Châu</option>
                                    <option value="sonla">Sơn La</option>
                                    <option value="hagiang">Hà Giang</option>
                                    <option value="tuyenquang">Tuyên Quang</option>
                                    <option value="laochai">Lào Cai</option>
                                    <option value="yendao">Yên Bái</option>
                                    <option value="thainguyen">Thái Nguyên</option>
                                    <option value="bacgiang">Bắc Giang</option>
                                    <option value="langson">Lạng Sơn</option>
                                    <option value="quangninh">Quảng Ninh</option>
                                    <option value="haiduong">Hải Dương</option>
                                    <option value="hungyen">Hưng Yên</option>
                                    <option value="hathai">Hà Nam</option>
                                    <option value="namdinh">Nam Định</option>
                                    <option value="ninbinh">Ninh Bình</option>
                                    <option value="thanhhoa">Thanh Hóa</option>
                                    <option value="nghean">Nghệ An</option>
                                    <option value="hatinh">Hà Tĩnh</option>
                                    <option value="quangbinh">Quảng Bình</option>
                                    <option value="quangtri">Quảng Trị</option>
                                    <option value="hue">Thừa Thiên-Huế</option>
                                    <option value="quangnam">Quảng Nam</option>
                                    <option value="quangngai">Quảng Ngãi</option>
                                    <option value="binhdinh">Bình Định</option>
                                    <option value="phuyen">Phú Yên</option>
                                    <option value="khanhhoa">Khánh Hòa</option>
                                    <option value="ninhthuan">Ninh Thuận</option>
                                    <option value="binhthuan">Bình Thuận</option>
                                    <option value="konturn">Kon Tum</option>
                                    <option value="giaialai">Gia Lai</option>
                                    <option value="daklak">Đắk Lắk</option>
                                    <option value="daknong">Đắk Nông</option>
                                    <option value="lamdong">Lâm Đồng</option>
                                    <option value="binhphuoc">Bình Phước</option>
                                    <option value="tayninh">Tây Ninh</option>
                                    <option value="binhduong">Bình Dương</option>
                                    <option value="dongnai">Đồng Nai</option>
                                    <option value="bariavungtau">Bà Rịa-Vũng Tàu</option>
                                    <option value="longan">Long An</option>
                                    <option value="tiengiang">Tiền Giang</option>
                                    <option value="ben-tre">Bến Tre</option>
                                    <option value="vinhlong">Vĩnh Long</option>
                                    <option value="travinh">Trà Vinh</option>
                                    <option value="saigon">Sài Gòn</option>
                                    <option value="dongthap">Đồng Tháp</option>
                                    <option value="angiang">An Giang</option>
                                    <option value="kiengiang">Kiên Giang</option>
                                    <option value="ca-mau">Cà Mau</option>
                                </select>
								<i class="zmdi zmdi-pin"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Gender:</label>
							<div class="form-holder select">
								<select name="" id="" class="form-control">
									<option value="male">Male</option>
									<option value="femal">Female</option>
									<option value="other">Other</option>
								</select>
								<i class="zmdi zmdi-face"></i>
							</div>
						</div>
					</div>
					<div class="form-end">
						<div class="checkbox">
							{{-- <label>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label> --}}
						</div>
						<div class="button-holder">
							<button>Register Now</button>
						</div>

					</div>
				</form>
			</div>
		</div>

	</body>
</html>
