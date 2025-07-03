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
    <title>Kelola Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen font-sans">

    <!-- Header -->
    <header class="bg-blue-900 text-white text-center py-6 shadow-md">
        <h1 class="text-3xl font-bold">📝 Kelola Artikel</h1>
    </header>

    <div class="flex flex-col md:flex-row max-w-7xl mx-auto mt-8 px-4 gap-6">

        <!-- Sidebar -->
        <aside class="md:w-1/4 bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-4 text-center">📁 MENU</h2>
            <ul class="space-y-3 text-gray-700">
                <li><a href="beranda_admin.php" class="block hover:text-blue-600">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block font-bold text-blue-900">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-blue-600">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-blue-600">👤 About</a></li>
                <li><a href="../auth/logout.php" onclick="return confirm('Keluar dari halaman admin?')" class="block text-red-600 hover:underline font-medium">🚪 Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="md:w-3/4 bg-white rounded-xl shadow p-6 overflow-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-blue-800">📚 Daftar Artikel</h2>
                <a href="add_artikel.php" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">+ Tambah Artikel</a>
            </div>

            <table class="min-w-full text-left bg-white border border-gray-200 rounded">
                <thead class="bg-blue-100 text-blue-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Judul Artikel</th>
                        <th class="px-4 py-2 border">Author</th>
                        <th class="px-4 py-2 border">Isi</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM tbl_artikel ORDER BY created_at DESC";
                    $query = mysqli_query($db, $sql);
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo "<tr class='hover:bg-gray-50'>";
                        echo "<td class='px-4 py-2 border text-center'>" . $no++ . "</td>";
                        echo "<td class='px-4 py-2 border font-semibold'>" . htmlspecialchars($data['nama_artikel']) . "</td>";
                        echo "<td class='px-4 py-2 border'>" . htmlspecialchars($data['author']) . "</td>";
                        echo "<td class='px-4 py-2 border'>" . substr(strip_tags($data['isi_artikel']), 0, 50) . "...</td>";
                        echo "<td class='px-4 py-2 border'>" . date('d M Y', strtotime($data['created_at'])) . "</td>";
                        echo "<td class='px-4 py-2 border text-center space-x-2'>";
                        echo "<a href='edit_artikel.php?id_artikel={$data['id_artikel']}' class='text-blue-600 hover:underline'>Edit</a>";
                        echo "<a href='delete_artikel.php?id_artikel={$data['id_artikel']}' onclick='return confirm(\"Yakin ingin menghapus artikel ini?\")' class='text-red-600 hover:underline'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>

    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white text-center py-4 mt-12 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
    </footer>

</body>

</html>
