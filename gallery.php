<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Gallery | Personal Web</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <style>
    .modal {
      background-color: rgba(0, 0, 0, 0.7);
    }
  </style>
</head>

<body class="bg-gradient-to-b from-blue-50 to-blue-100 dark:bg-gray-900 dark:text-white text-gray-800 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-blue-900 dark:bg-gray-800 text-white text-center py-6 shadow-md">
    <h1 class="text-3xl font-bold tracking-wide">📸 Gallery | Nabil Naulia</h1>
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

  <!-- Gallery Grid -->
  <main class="max-w-7xl mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold text-center text-blue-800 dark:text-yellow-300 mb-8">🖼️ Galeri Foto Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php
      $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition'>";
        echo "<img src='images/{$data['foto']}' alt='Gambar' class='w-full h-72 object-contain cursor-pointer' onclick=\"showModal('images/{$data['foto']}')\">";
        echo "<div class='p-4'>";
        echo "<h3 class='text-lg font-semibold text-blue-700 dark:text-yellow-300 text-center'>" . htmlspecialchars($data['judul']) . "</h3>";
        echo "</div></div>";
      }
      ?>
    </div>
  </main>

  <!-- Modal for Preview -->
  <div id="imageModal" class="hidden fixed inset-0 flex items-center justify-center z-50 modal">
    <div class="bg-white dark:bg-gray-900 p-4 rounded-lg shadow-lg max-w-3xl w-full relative">
      <button onclick="closeModal()" class="absolute top-2 right-2 text-xl text-gray-700 dark:text-white">✖</button>
      <img id="modalImage" src="" class="w-full max-h-[80vh] object-contain rounded-lg" alt="Preview Gambar">
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-12 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
  </footer>

  <!-- JS Script -->
  <script>
    document.getElementById('toggle-dark').addEventListener('click', function () {
      document.body.classList.toggle('dark');
    });

    function showModal(src) {
      document.getElementById('modalImage').src = src;
      document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('imageModal').classList.add('hidden');
    }
  </script>

</body>
</html>
