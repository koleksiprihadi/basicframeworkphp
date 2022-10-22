<?php
// Inisialisasi API
initAPI();
// Import library
use Firebase\JWT\JWT;
use Dotenv\Dotenv;

// Load dotenv
$dotenv = Dotenv::createImmutable('./');
$dotenv->load();



// Cek method request
if ($_SERVER['REQUEST_METHOD'] !== $method) {
  http_response_code(405);
  exit();
}else{
  http_response_code(200);
}

try {
  $user = $db->query('SELECT * FROM user')->fetchAll();

  echo json_encode($user);
} catch (Exception $e) {
  // Bagian ini akan jalan jika terdapat error saat JWT diverifikasi atau di-decode
  http_response_code(401);
  exit();
}