<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'rsvp_db'; // Ganti dengan nama database Anda
$username = 'root'; // Sesuaikan dengan username database Anda
$password = ''; // Sesuaikan dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

// Mengambil data dari form
$name = $_POST['name'] ?? null;
$message = $_POST['message'] ?? null;

if ($name && $message) {
    // Memasukkan data ke database
    $sql = "INSERT INTO rsvps (name, message) VALUES (:name, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
    echo "<script>alert('Successfully submitted'); window.location.href='index.php';</script>";
}
?>

