<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Confirm your email</h2>

		<div>
			To be able to log into AltWallets, you must confirm your email. Click the link below to confirm your email.
		</div>

		<div>
		  {{HTML::linkRoute('register.activate', null, ['token' => Crypt::encrypt($user['id']), 'email' => $user['email']])}}
		</div>
	</body>
</html>
