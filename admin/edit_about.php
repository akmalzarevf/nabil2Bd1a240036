<?php
include('../koneksi.php');
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

// Ambil ID dari GET dan validasi
if (!isset($_GET['id_about']) || empty($_GET['id_about'])) {
    echo "<script>alert('ID tidak valid.'); window.location='about.php';</script>";
    exit;
}

$id = mysqli_real_escape_string($db, $_GET['id_about']);
$sql = "SELECT * FROM tbl_about WHERE id_about = '$id'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan.'); window.location='about.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit About</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<!-- Header -->
<header class="bg-blue-900 text-white text-center py-6 shadow">
    <h1 class="text-3xl font-bold">✏️ Edit Data About</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-white rounded shadow p-6">
        <h2 class="text-xl font-semibold text-blue-700 mb-4 text-center">📁 MENU</h2>
        <ul class="space-y-3 text-gray-700">
            <li><a href="beranda_admin.php" class="block hover:text-blue-600">🏠 Beranda</a></li>
            <li><a href="data_artikel.php" class="block hover:text-blue-600">📝 Kelola Artikel</a></li>
            <li><a href="data_gallery.php" class="block hover:text-blue-600">🖼️ Kelola Gallery</a></li>
            <li><a href="about.php" class="block font-semibold text-blue-800">👤 About</a></li>
            <li><a href="logout.php" onclick="return confirm('Yakin ingin keluar?');" class="block text-red-600 hover:underline font-medium">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 bg-white rounded shadow p-6 ml-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Formulir Edit About</h2>
        <form action="proses_edit_about.php" method="post" class="space-y-6">
            <input type="hidden" name="id_about" value="<?php echo $data['id_about']; ?>">

            <div>
                <label for="about" class="block text-sm font-medium text-gray-700 mb-1">Isi Tentang</label>
                <textarea id="about" name="about" rows="5" required
                    class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($data['about']); ?></textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">💾 Simpan Perubahan</button>
                <a href="about.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">Batal</a>
            </div>
        </form>
    </main>
</div>

<!-- Footer -->
<footer class="bg-blue-800 text-white text-center py-4 mt-12 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
</footer>

</body>
</html>
