<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen font-sans">

    <!-- Header -->
    <header class="bg-blue-900 text-white text-center py-6 shadow">
        <h1 class="text-3xl font-bold">🖼️ Kelola Gallery</h1>
    </header>

    <div class="flex flex-col md:flex-row max-w-7xl mx-auto mt-8 px-4 gap-6">

        <!-- Sidebar -->
        <aside class="md:w-1/4 bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-4 text-center">📁 MENU</h2>
            <ul class="space-y-3 text-gray-700">
                <li><a href="beranda_admin.php" class="block hover:text-blue-600">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-blue-600">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block font-bold text-blue-900">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-blue-600">👤 About</a></li>
                <li><a href="../auth/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="block text-red-600 hover:underline font-medium">🚪 Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="md:w-3/4 bg-white rounded-xl shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-blue-800">📷 Daftar Gambar</h2>
                <a href="add_gallery.php" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">+ Tambah Gambar</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php
                $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<div class='bg-gray-50 border rounded-xl shadow hover:shadow-lg transition overflow-hidden'>";
                    echo "<img src='../images/{$data['foto']}' class='w-full h-48 object-cover' alt='Gambar'>";
                    echo "<div class='p-4'>";
                    echo "<p class='font-semibold text-gray-800 mb-2'>" . htmlspecialchars($data['judul']) . "</p>";
                    echo "<div class='flex justify-between text-sm'>";
                    echo "<a href='edit_gallery.php?id_gallery={$data['id_gallery']}' class='text-blue-600 hover:underline'>Edit</a>";
                    echo "<a href='delete_gallery.php?id_gallery={$data['id_gallery']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 hover:underline'>Hapus</a>";
                    echo "</div></div></div>";
                }
                ?>
            </div>
        </main>

    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white text-center py-4 mt-12 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
    </footer>

</body>

</html>