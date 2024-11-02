<?php
require 'db.php';

$id = $_GET['id'];// Retrieves the patient ID from the URL query string (`id` parameter). This ID specifies which patient record to delete.
$stmt = $pdo->prepare("DELETE FROM patients WHERE id = ?");
// Prepares an SQL statement to delete a patient record where the `id` column matches the provided ID.
// The `?` is a placeholder to be safely replaced by the actual `$id` value.
$stmt->execute([$id]);
// Executes the prepared statement, passing the `$id` as a parameter to replace the placeholder.
// This helps prevent SQL injection by ensuring `$id` is safely handled.
header("Location: patient_list.php");
// Redirects the user back to 'patient_list.php' after the deletion is successful.
exit;// Stops further script execution after the redirect to ensure no additional code runs.
?>