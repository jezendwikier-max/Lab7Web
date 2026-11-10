<?php
// 1. PENGATURAN AWAL & PEMROSESAN DATA (BACKEND)
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Mengambil dan membersihkan spasi dari input
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email = trim($_POST["email"] ?? "");

    // Validasi Kolom Wajib Diisi
    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }
    if ($prodi === "") {
        $error[] = "Program Studi wajib diisi.";
    }
    
    // Validasi Format Email
    if ($email === "") {
        $error[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    // Validasi Semester (Bilangan bulat 1–14)
    if ($semesterInput === "") {
        $error[] = "Semester wajib diisi.";
    } elseif (!ctype_digit($semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa bilangan bulat dalam rentang 1–14.";
    }

    // Jika tidak ada error, simpan data yang valid
    if (empty($error)) {
        $data = [
            "nama"     => $nama,
            "nim"      => $nim,
            "prodi"    => $prodi,
            "semester" => (int)$semesterInput,
            "email"    => $email,
        ];
    }
}
?>

<!-- 2. TAMPILAN HTML (FRONTEND) -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f6f9; }
        .container { max-width: 500px; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        button { background-color: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #0056b3; }
        .error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .error ul { margin: 0; padding-left: 20px; }
        .result { background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-top: 20px; }
        .result table { width: 100%; border-collapse: collapse; }
        .result td { padding: 5px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>Input Data Mahasiswa</h2>

    <!-- Menampilkan pesan error jika ada -->
    <?php if (!empty($error)): ?>
        <div class="error">
            <ul>
                <?php foreach ($error as $err): ?>
                    <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Input Data Mahasiswa -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?= htmlspecialchars($_POST['nim'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi:</label>
            <input type="text" id="prodi" name="prodi" value="<?= htmlspecialchars($_POST['prodi'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
            <label for="semester">Semester (1 - 14):</label>
            <input type="number" id="semester" name="semester" min="1" max="14" value="<?= htmlspecialchars($_POST['semester'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <button type="submit">Kirim Data</button>
    </form>

    <!-- Menampilkan Ringkasan Data Setelah Berhasil Diisi -->
    <?php if ($data !== null): ?>
        <div class="result">
            <h3>Ringkasan Data Mahasiswa</h3>
            <table>
                <tr>
                    <strong>Nama:</strong> <?= htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8') ?>
                </tr><br>
                <tr>
                    <strong>NIM:</strong> <?= htmlspecialchars($data['nim'], ENT_QUOTES, 'UTF-8') ?>
                </tr><br>
                <tr>
                    <strong>Program Studi:</strong> <?= htmlspecialchars($data['prodi'], ENT_QUOTES, 'UTF-8') ?>
                </tr><br>
                <tr>
                    <strong>Semester:</strong> <?= htmlspecialchars((string)$data['semester'], ENT_QUOTES, 'UTF-8') ?>
                </tr><br>
                <tr>
                    <strong>Email:</strong> <?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') ?>
                </tr>
            </table>
        </div>
    <?php endif; ?>
</div>

</body>
</html>