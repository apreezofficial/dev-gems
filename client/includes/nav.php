<!-- Navbar -->
<nav class="fixed w-full top-0 z-50 bg-white/30 dark:bg-gray-800/40 backdrop-blur-lg shadow-sm border-b border-white/30 dark:border-gray-700 transition-colors">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      
      <!-- Logo -->
      <div class="flex items-center">
        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
        </svg>
        <span class="ml-2 text-2xl font-bold text-green-700 dark:text-green-300">Meet</span>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-8 items-center">
        <a href="#features" class="nav-link">Features</a>
        <a href="#pricing" class="nav-link">Pricing</a>
        <a href="#about" class="nav-link">About</a>
        <button class="px-4 py-2 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white shadow hover:scale-105 transition">Get Started</button>
        <!-- Theme Toggle -->
        <button id="theme-toggle" class="p-2 rounded-full bg-white/30 dark:bg-gray-700 text-green-700 dark:text-green-300 transition">
          <svg id="sun-icon" class="w-5 h-5 block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M6.343 17.657l.707-.707M7.05 7.05l-.707-.707M17.657 17.657l-.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z"/>
          </svg>
          <svg id="moon-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
          </svg>
        </button>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden flex items-center space-x-2">
        <!-- Theme Toggle for Mobile -->
        <button id="theme-toggle-mobile" class="p-2 rounded-full bg-white/30 dark:bg-gray-700 text-green-700 dark:text-green-300">
          <svg id="sun-icon-mobile" class="w-5 h-5 block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M6.343 17.657l.707-.707M7.05 7.05l-.707-.707M17.657 17.657l-.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z"/>
          </svg>
          <svg id="moon-icon-mobile" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
          </svg>
        </button>
        <!-- Hamburger / Close Toggle -->
        <button id="menu-btn" class="focus:outline-none transition transform">
          <svg id="hamburger-icon" class="w-6 h-6 text-green-700 dark:text-green-300 block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="close-icon" class="w-6 h-6 text-green-700 dark:text-green-300 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Mobile Side Menu -->
<div id="side-menu" class="fixed top-0 left-0 h-full w-64 bg-white/40 dark:bg-gray-900/40 backdrop-blur-xl shadow-lg border-r border-white/30 dark:border-gray-700 transform -translate-x-full transition-transform duration-300 ease-in-out p-6 space-y-6 z-40">
  <a href="#features" class="mobile-link block text-green-900 dark:text-green-200 hover:text-green-700 dark:hover:text-green-400 font-medium">Features</a>
  <a href="#pricing" class="mobile-link block text-green-900 dark:text-green-200 hover:text-green-700 dark:hover:text-green-400 font-medium">Pricing</a>
  <a href="#about" class="mobile-link block text-green-900 dark:text-green-200 hover:text-green-700 dark:hover:text-green-400 font-medium">About</a>
  <button class="w-full px-4 py-2 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white shadow hover:scale-105 transition">Get Started</button>
</div>

<script>
  const menuBtn = document.getElementById('menu-btn');
  const sideMenu = document.getElementById('side-menu');
  const hamburgerIcon = document.getElementById('hamburger-icon');
  const closeIcon = document.getElementById('close-icon');
  const mobileLinks = document.querySelectorAll('.mobile-link');

  const themeToggle = document.getElementById('theme-toggle');
  const themeToggleMobile = document.getElementById('theme-toggle-mobile');
  const sunIcon = document.getElementById('sun-icon');
  const moonIcon = document.getElementById('moon-icon');
  const sunIconMobile = document.getElementById('sun-icon-mobile');
  const moonIconMobile = document.getElementById('moon-icon-mobile');

  menuBtn.addEventListener('click', () => {
    const isOpen = !sideMenu.classList.contains('-translate-x-full');
    sideMenu.classList.toggle('-translate-x-full');
    hamburgerIcon.classList.toggle('hidden', !isOpen);
    closeIcon.classList.toggle('hidden', isOpen);
  });

  mobileLinks.forEach(link => link.addEventListener('click', () => {
    sideMenu.classList.add('-translate-x-full');
    hamburgerIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
  }));

  function toggleTheme() {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    sunIcon.classList.toggle('hidden', isDark);
    moonIcon.classList.toggle('hidden', !isDark);
    sunIconMobile.classList.toggle('hidden', isDark);
    moonIconMobile.classList.toggle('hidden', !isDark);
  }

  themeToggle.addEventListener('click', toggleTheme);
  themeToggleMobile.addEventListener('click', toggleTheme);

  if (localStorage.getItem('theme') === 'dark') document.documentElement.classList.add('dark');
</script>

<style>
  .nav-link { @apply text-green-900 dark:text-green-200 hover:text-green-700 dark:hover:text-green-400 font-medium; }
</style>