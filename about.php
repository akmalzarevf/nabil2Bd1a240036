<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About | Personal Web</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-b from-blue-50 to-blue-100 dark:bg-gray-900 dark:text-white text-gray-800 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-blue-900 dark:bg-gray-800 text-white text-center py-6 shadow-md">
    <h1 class="text-3xl font-bold tracking-wide">👤 About Me | Nabil Naulia</h1>
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
  <main class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 gap-8">

    <!-- Kiri: Profil & Kontak -->
    <aside class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center space-y-6">
      <img src="images/profile.jpg" alt="Foto Profil" class="w-32 h-32 rounded-full mx-auto border-4 border-blue-400 dark:border-yellow-300 shadow">
      <h2 class="text-xl font-bold text-blue-800 dark:text-yellow-300">Hi, I'm Nabil Naulia</h2>
      <p class="text-gray-600 dark:text-gray-300">Mahasiswa Sistem Informasi dan Web Developer dengan fokus pada UI/UX dan pengembangan aplikasi modern.</p>

      <div class="mt-4">
        <h3 class="text-lg font-semibold text-blue-800 dark:text-yellow-300 mb-2">📫 Kontak</h3>
        <div class="flex justify-center gap-5 text-xl text-blue-700 dark:text-yellow-300">
          <a href="mailto:nabilnaulia@gmail.com" title="Email"><i class="fas fa-envelope"></i></a>
          <a href="https://wa.me/085321152634" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
          <a href="https://github.com/nabilnaulia1234" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
          <a href="https://www.instagram.com/__aabilll" target="_blank" title="LinkedIn"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </aside>

    <!-- Kanan: Konten Dinamis -->
    <section class="space-y-8">

      <!-- Tentang Saya -->
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-blue-800 dark:text-yellow-300 mb-4">📄 Tentang Saya</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-200 text-base leading-relaxed">
          <?php
          $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
          $query = mysqli_query($db, $sql);
          while ($data = mysqli_fetch_array($query)) {
            echo "<div class='p-4 bg-blue-50 dark:bg-gray-700 rounded hover:bg-blue-100 dark:hover:bg-gray-600 transition'>";
            echo "<p>" . nl2br(htmlspecialchars($data['about'])) . "</p>";
            echo "</div>";
          }
          ?>
        </div>
      </div>

      <!-- Skills -->
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-blue-800 dark:text-yellow-300 mb-4">💼 Keahlian</h3>
        <div class="flex flex-wrap gap-3 text-sm">
          <?php
          $skills = ["HTML", "CSS", "JavaScript", "PHP", "MySQL", "Tailwind CSS", "Bootstrap", "Laravel", "UI/UX", "Figma"];
          foreach ($skills as $skill) {
            echo "<span class='bg-blue-100 dark:bg-gray-700 text-blue-800 dark:text-yellow-300 px-3 py-2 rounded-lg shadow hover:bg-blue-200 dark:hover:bg-gray-600 transition'>$skill</span>";
          }
          ?>
        </div>
      </div>

      <!-- Pendidikan -->
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-blue-800 dark:text-yellow-300 mb-4">🎓 Pendidikan</h3>
        <ul class="space-y-3 text-gray-700 dark:text-gray-200">
          <li><strong>Universitas Subang</strong> - Sistem Informasi (2024 - Sekarang)</li>
          <li><strong>SMA Negeri 2 Subang</strong> - Jurusan IPS (2021 - 2024)</li>
          <li><strong>SMP Negeri 4 Subang</strong> - (2018 - 2021)</li>
          <li><strong>SD Sri Asih</strong> - (2012 - 2018)</li>
        </ul>
      </div>

    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-12 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by <span class="font-semibold">Nabil Naulia</span>
  </footer>

  <!-- Toggle Dark Mode -->
  <script>
    document.getElementById('toggle-dark').addEventListener('click', function () {
      document.body.classList.toggle('dark');
    });
  </script>
</body>
</html>
