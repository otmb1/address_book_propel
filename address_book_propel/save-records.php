<?php

// Get the form data as a JSON string
$formData = file_get_contents('php://input');

// Decode the form data into an associative array
$formData = json_decode($formData, true);

// Get the form values from the array
$forename = $formData['forename'];
$surname = $formData['surname'];
$phone = $formData['phone'];
$email = $formData['email'];

// Create a new record with the form data
$newRecord = array(
  'forename' => $forename,
  'surname' => $surname,
  'phone' => $phone,
  'email' => $email,
);

// Read the existing data from the JSON file
$data = json_decode(file_get_contents('data.json'), true);

// Add the new record to the data
$data[] = $newRecord;

// Write the updated data back to the JSON file
file_put_contents('data.json', json_encode($data));

// Send a response to the client
echo "Record added successfully";

?>