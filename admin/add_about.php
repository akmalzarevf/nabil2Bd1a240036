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
    <title>Tambah About</title>
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
        <h1 class="text-3xl font-bold">✍️ Tambah Data About</h1>
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
                <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-600 hover:underline font-medium">🚪 Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-yellow-300 mb-6">📝 Formulir About</h2>
            <form action="proses_add_about.php" method="post" class="space-y-6">
                <div>
                    <label for="about" class="block text-sm font-medium mb-1">Isi Tentang Saya</label>
                    <textarea id="about" name="about" rows="6" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="submit"
                        class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">Simpan</button>
                    <a href="about.php"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500 transition">Batal</a>
                </div>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-12 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
    </footer>

</body>

</html>