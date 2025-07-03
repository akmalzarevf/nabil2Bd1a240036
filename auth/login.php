<?php
session_start();
require_once("../koneksi.php");

// Jika sudah login, redirect sesuai role
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    $role = strtolower(trim($_SESSION['role']));

    switch ($role) {
        case 'admin':
            header('Location: ../admin/beranda_admin.php');
            exit;
        case 'editor':
            header('Location: ../editor/beranda_editor.php');
            exit;
        case 'viewer':
            header('Location: ../viewer/beranda_viewer.php');
            exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Personal Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .input-focus-ring:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.45);
            border-color: #3b82f6;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white shadow-2xl rounded-xl p-8 sm:p-10 w-full max-w-sm transform transition-all duration-300 hover:scale-105">
        <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-8 tracking-wide">
            Login
        </h2>

        <form action="cek_login.php" method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none input-focus-ring"
                    placeholder="Masukkan username Anda"
                >
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none input-focus-ring"
                    placeholder="Masukkan password Anda"
                >
            </div>
            <div class="flex flex-col space-y-4">
                <button
                    type="submit"
                    name="login"
                    class="w-full bg-blue-700 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-800 transition duration-300 shadow-md"
                >
                    Login
                </button>
                <button
                    type="reset"
                    class="w-full bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded-lg hover:bg-gray-400 transition duration-300 shadow-md"
                >
                    Batal
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-600 mt-8">
            Belum punya akun? <a href="register.php" class="text-blue-600 hover:underline font-semibold">Daftar di sini</a>
        </div>

        <div class="text-center text-xs text-gray-500 mt-4">
            &copy; <?php echo date('Y'); ?> Personal Web.
        </div>
    </div>

</body>
</html>
