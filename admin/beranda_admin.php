<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit;
}

require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

// Hitung total artikel
$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
// Hitung total gallery
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen font-sans">

    <!-- Header -->
    <header class="bg-blue-900 text-white text-center py-6 shadow-md">
        <h1 class="text-3xl font-bold">📊 Dashboard Administrator</h1>
    </header>

    <!-- Container -->
    <div class="flex flex-col md:flex-row max-w-7xl mx-auto mt-8 px-4 gap-6">

        <!-- Sidebar -->
        <aside class="md:w-1/4 bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-4 text-center">📁 MENU</h2>
            <ul class="space-y-3 text-gray-700 text-base">
                <li><a href="beranda_admin.php" class="block hover:text-blue-600">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-blue-600">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-blue-600">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-blue-600">👤 About</a></li>
                <li><a href="../auth/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="block text-red-600 hover:underline font-medium">🚪 Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="md:w-3/4 bg-white rounded-xl shadow p-8">
            <div class="text-lg text-gray-800 mb-4">
                Halo, <strong class="text-blue-700"><?php echo htmlspecialchars($username); ?></strong>! Selamat datang di halaman admin. 😊
            </div>
            <p class="text-sm text-gray-600 mb-6">Silakan gunakan menu di samping untuk mengelola konten website Anda.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white border-t-4 border-blue-600 shadow rounded p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-700">📝 Total Artikel</h3>
                    <p class="text-4xl font-bold text-gray-800 mt-2"><?php echo $jumlah_artikel; ?></p>
                </div>
                <div class="bg-white border-t-4 border-green-600 shadow rounded p-6 text-center">
                    <h3 class="text-xl font-semibold text-green-700">🖼️ Total Gallery</h3>
                    <p class="text-4xl font-bold text-gray-800 mt-2"><?php echo $jumlah_gallery; ?></p>
                </div>
            </div>
        </main>

    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white text-center py-4 mt-12 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
    </footer>

</body>

</html>