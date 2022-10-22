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
}

// Ambil data json yang dikirim user
$json = file_get_contents('php://input');
$input = json_decode($json);

// Jika tidak ada data email atau password
if (!isset($input->username) || !isset($input->password) || !isset($input->password_c) || !isset($input->jabatan) || !isset($input->token)) {
  http_response_code(400);
  exit();
}

// Atur jenis response
header('Content-Type: application/json');

// Jika password pertama dan validasi tidak sesuai
if ($input->password !== $input->password_c) {
  echo json_encode([
    'success' => false,
    'data' => null,
    'message' => 'password tidak sesuai'
  ]);
  exit();
}else{
    $pass = password_hash($input->password, PASSWORD_DEFAULT);
    try {
      $insert = $db->query('INSERT INTO `user` (`id_user`, `jabatan`, `username`, `password`, `token`) VALUES (?,?,?,?,?)', NULL, $input->jabatan, $input->username, $pass, $input->token);
      if ($insert->affectedRows()>= 1) {
          echo json_encode([
              'success' => true,
              'data' => null,
              'message' => 'Berhasil'
          ]);
          exit();
      }
    } catch (\Throwable $th) {
      echo json_encode([
        'success' => False,
        'data' => null,
        'message' => 'Gagal'
      ]);
      exit();
    }

}


