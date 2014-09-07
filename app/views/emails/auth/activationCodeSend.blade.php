<!DOCTYPE html>
<html lang="ar">
	<head>
		<meta charset="utf-8">
	</head>
	<style type="text/css">
		body {
			direction: rtl;
		}
	</style>
	<body>
		<h2>تفعيل الحساب</h2>

		<div>
			الرجاء النقر على الوصلة في الأدنى لتفعيل الحساب:
		</div>
		{{ URL::to('/').'/activate/'.$activationCode.'/'.$email}}
	</body>
</html>
