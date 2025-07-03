<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola About</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 dark:text-white min-h-screen font-sans">

    <!-- Header -->
    <header class="bg-blue-900 dark:bg-gray-800 text-white text-center py-6 shadow">
        <h1 class="text-3xl font-bold">Kelola Halaman About</h1>
    </header>

    <div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6">

        <!-- Sidebar -->
        <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 dark:text-yellow-300 mb-4 text-center">📁 MENU</h2>
            <ul class="space-y-3 text-gray-700 dark:text-gray-200">
                <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-yellow-400">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-blue-600 dark:hover:text-yellow-400">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-yellow-400">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block font-bold text-blue-800 dark:text-yellow-400">👤 About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-600 hover:underline font-medium">🚪 Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 relative">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-yellow-300">✍️ Tentang Saya</h2>
                <a href="add_about.php"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm">+ Tambah Data</a>
            </div>

            <div class="space-y-6">
                <?php
                $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
                $query = mysqli_query($db, $sql);
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='text-gray-600 dark:text-gray-300'>Belum ada data tentang Anda. Silakan tambahkan.</p>";
                } else {
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<div class='p-4 bg-gray-50 dark:bg-gray-700 border rounded shadow'>";
                        echo "<p class='mb-3 whitespace-pre-line'>" . htmlspecialchars($data['about']) . "</p>";
                        echo "<div class='flex space-x-6 text-sm'>";
                        echo "<a href='edit_about.php?id_about={$data['id_about']}' class='text-blue-600 hover:underline'>Edit</a>";
                        echo "<a href='delete_about.php?id_about={$data['id_about']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 hover:underline'>Hapus</a>";
                        echo "</div></div>";
                    }
                }
                ?>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-12 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
    </footer>

</body>

</html>