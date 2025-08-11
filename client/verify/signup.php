<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meet - Verify Email</title>
  <script src="../tailwind.js"></script>
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.6s ease-out forwards; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }

    @keyframes pulse {
      0%, 100% { opacity: 0.3; }
      50% { opacity: 0.6; }
    }
    .grid-dot { animation: pulse 3s infinite ease-in-out; }
  </style>
</head>
<body class="bg-white dark:bg-gray-900 min-h-screen flex items-center justify-center transition-colors duration-300">
  <div class="max-w-5xl w-full mx-auto grid grid-cols-1 md:grid-cols-2 bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden">
    <!-- Left Side: Verification Form -->
    <div class="p-8 sm:p-12 flex flex-col justify-center animate-fadeIn">
      <div class="max-w-sm mx-auto w-full">
        <div class="flex items-center mb-8">
          <svg class="w-8 h-8 text-black dark:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8v8a3 3 0 003 3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3zm9 4a2 2 0 110-4 2 2 0 010 4z" />
          </svg>
          <span class="ml-2 text-2xl font-extrabold tracking-tight text-black dark:text-white">Meet</span>
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-black dark:text-white mb-2">Verify Your Email</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-8">Enter the 4-digit code sent to your email.</p>
        <form id="verify-form" class="space-y-6">
          <div>
            <label for="code" class="block text-sm font-medium text-black dark:text-white">Verification Code</label>
            <input type="text" id="code" name="code" required class="mt-1 w-full px-4 py-3 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white text-black dark:text-white transition" placeholder="1234">
          </div>
          <button type="submit" class="w-full px-4 py-3 bg-black dark:bg-white text-white dark:text-black rounded-lg font-medium hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">Verify</button>
        </form>
        <p id="error-message" class="mt-4 text-center text-sm text-red-500 hidden"></p>
        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
          Back to <a href="../signup.php" class="text-black dark:text-white hover:underline font-medium">Sign Up</a>
        </p>
      </div>
    </div>

    <!-- Right Side: Decorative Grid -->
    <div class="hidden md:block relative bg-gray-100 dark:bg-gray-800 p-12">
      <div class="absolute inset-0 grid grid-cols-6 grid-rows-6 gap-2">
        <?php for ($i = 0; $i < 36; $i++): ?>
          <div class="grid-dot bg-black/20 dark:bg-white/20 rounded-full w-full h-full" style="animation-delay: <?php echo rand(0, 2000); ?>ms;"></div>
        <?php endfor; ?>
      </div>
      <div class="relative z-10 flex flex-col justify-center h-full animate-fadeIn delay-200">
        <h3 class="text-xl font-bold text-black dark:text-white mb-4">Secure Your Account</h3>
        <p class="text-gray-600 dark:text-gray-400">Verify your email to unlock seamless video calls with Meet.</p>
      </div>
    </div>

    <!-- Theme Toggle -->
    <button id="theme-toggle" class="absolute top-4 right-4 p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">
      <svg id="sun-icon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m8.25-9h-2.25m-13.5 0H3m15.364-6.364l-1.591 1.591M6.227 6.227l1.591 1.591m0 10.818l-1.591 1.591M18.364 18.364l1.591-1.591M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" />
      </svg>
      <svg id="moon-icon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
      </svg>
    </button>
  </div>

  <script>
    const verifyForm = document.getElementById('verify-form');
    const errorMessage = document.getElementById('error-message');

    verifyForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      errorMessage.classList.add('hidden');

      const code = document.getElementById('code').value;

      // Client-side validation
      if (!/^\d{4}$/.test(code)) {
        errorMessage.textContent = 'Please enter a valid 4-digit code!';
        errorMessage.classList.remove('hidden');
        return;
      }

      try {
        const response = await fetch('../../server/auth/verify.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ code })
        });

        const data = await response.json();

        if (data.success) {
          window.location.href = '../login.php?success=Email verified successfully!';
        } else {
          errorMessage.textContent = data.message;
          errorMessage.classList.remove('hidden');
        }
      } catch (error) {
        errorMessage.textContent = 'An error occurred. Please try again.';
        errorMessage.classList.remove('hidden');
      }
    });

    const themeToggle = document.getElementById('theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');

    function toggleTheme() {
      const isDark = document.documentElement.classList.toggle('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      sunIcon.classList.toggle('hidden', isDark);
      moonIcon.classList.toggle('hidden', !isDark);
    }

    themeToggle.addEventListener('click', toggleTheme);

    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
      sunIcon.classList.add('hidden');
      moonIcon.classList.remove('hidden');
    } else {
      document.documentElement.classList.remove('dark');
      sunIcon.classList.remove('hidden');
      moonIcon.classList.add('hidden');
    }
  </script>
</body>
</html>