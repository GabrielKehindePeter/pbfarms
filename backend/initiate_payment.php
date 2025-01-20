<?php
// Initialize cURL
$ch = curl_init();

// Set the Paystack API endpoint
$url = "https://api.paystack.co/transaction/initialize";

// Define the data for the request
$data = [
    "email" => $_POST["email"],
    "amount" => $_POST["amount"] // Amount is in kobo, so 500000 means 5000 NGN
];

// Convert data array to JSON
$data_string = json_encode($data);

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer sk_test_f0f384afbb4f71171ac8c0e04970d7f9c0d6d417", // Replace YOUR_SECRET_KEY with your actual secret key
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

// Execute the cURL request
echo $response = curl_exec($ch);

// Check for cURL errors
// if (curl_errno($ch)) {
//     echo "cURL Error: " . curl_error($ch);
// } else {
//     // Decode and process the response
//     $decoded_response = json_decode($response, true);
//     if ($decoded_response['status']) {
//         // echo $decoded_response;
//         // echo "Transaction initialized successfully.";
//         // echo "Authorization URL: " . $decoded_response['data']['authorization_url'];
//     } else {
//         echo "Error: " . $decoded_response['message'];
//     }
// }

// Close cURL
curl_close($ch);
?>
