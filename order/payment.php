<?php
// Initialize payment gateway credentials
$paymentGatewayApiKey = "your_payment_gateway_api_key";
$paymentGatewayApiSecret = "your_payment_gateway_api_secret";
$paymentGatewayApiEndpoint = "https://your_payment_gateway_api_endpoint.com";

// Retrieve booking details
$itemName = $_POST['item_name'];
$bookingAmount = $_POST['booking_amount'];
$customerName = $_POST['customer_name'];
$customerEmail = $_POST['customer_email'];
$customerPhone = $_POST['customer_phone'];

// Set up payment gateway API request parameters
$params = array(
    "apiKey" => $paymentGatewayApiKey,
    "apiSecret" => $paymentGatewayApiSecret,
    "itemName" => $itemName,
    "bookingAmount" => $bookingAmount,
    "customerName" => $customerName,
    "customerEmail" => $customerEmail,
    "customerPhone" => $customerPhone
);

// Make payment gateway API request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $paymentGatewayApiEndpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Handle payment gateway API response
if ($response == "success") {
    // Payment successful, proceed with booking
    // ...
} else {
    // Payment failed, display error message
    echo "Payment failed. Please try again later.";
}
?>