<?php include "koneksi.php"; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Personal Web | Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
</head>

<body class="bg-gradient-to-b from-blue-50 to-blue-100 dark:bg-gray-900 dark:text-white text-gray-800 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-blue-900 dark:bg-gray-800 text-white text-center py-6 shadow-md">
    <h1 class="text-3xl font-bold tracking-wide">Personal Web | Nabil Naulia</h1>
  </header>

  <!-- Navigation -->
  <nav class="bg-blue-700 dark:bg-gray-700 text-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <ul class="flex flex-wrap gap-6 text-lg font-medium">
        <li><a href="index.php" class="hover:text-yellow-300 transition">Artikel</a></li>
        <li><a href="gallery.php" class="hover:text-yellow-300 transition">Gallery</a></li>
        <li><a href="about.php" class="hover:text-yellow-300 transition">About</a></li>
        <li><a href="auth/login.php" class="hover:text-yellow-300 transition">Login</a></li>
      </ul>
      <button id="toggle-dark" class="ml-4 text-white dark:text-yellow-300 text-xl" title="Toggle Dark Mode">🌓</button>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

    <!-- Artikel Utama -->
    <section class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
      <h2 class="text-2xl font-bold mb-4 text-blue-800 dark:text-yellow-300">📄 Artikel Terbaru</h2>
      <div class="space-y-6">
        <?php
        $sql = "SELECT * FROM tbl_artikel ORDER BY created_at DESC";
        $query = mysqli_query($db, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
          echo "<article class='bg-white dark:bg-gray-700 p-4 rounded-lg shadow hover:shadow-md transition'>";
          echo "<h3 class='text-xl font-semibold text-blue-700 dark:text-yellow-300'>" . htmlspecialchars($data['nama_artikel']) . "</h3>";

          $isi_pendek = implode(' ', array_slice(explode(' ', strip_tags($data['isi_artikel'])), 0, 40));
          echo "<p class='text-gray-700 dark:text-gray-200 mt-2'>" . nl2br($isi_pendek) . "...</p>";

          echo "<p class='text-sm text-gray-500 dark:text-gray-400 mt-1'>👁️ " . $data['views'] . "x dilihat</p>";

          echo "<div class='mt-3'>";
          echo "<a href='view_artikel.php?slug=" . $data['slug'] . "' class='text-blue-600 dark:text-yellow-400 hover:underline text-sm font-medium'>Baca selengkapnya →</a>";
          echo "</div>";
          echo "</article>";
        }
        ?>
      </div>
    </section>

    <!-- Sidebar -->
    <aside class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
      <h2 class="text-xl font-semibold text-blue-800 dark:text-yellow-300 mb-4">📚 Daftar Artikel</h2>
      <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-200">
        <?php
        $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
        $query = mysqli_query($db, $sql);
        while ($data = mysqli_fetch_array($query)) {
          echo "<li class='hover:text-blue-600 dark:hover:text-yellow-400 transition'>" . htmlspecialchars($data['nama_artikel']) . "</li>";
        }
        ?>
      </ul>
    </aside>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-12 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
  </footer>

  <script>
    document.getElementById('toggle-dark').addEventListener('click', function () {
      document.body.classList.toggle('dark');
    });
  </script>

</body>

</html>
