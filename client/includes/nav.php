<!-- Navbar -->
<nav class="fixed w-full top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl shadow-sm border-b border-gray-200/50 dark:border-gray-800/50 transition-colors duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <svg class="w-8 h-8 text-black dark:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8v8a3 3 0 003 3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3zm9 4a2 2 0 110-4 2 2 0 010 4z" />
        </svg>
        <span class="ml-2 text-2xl font-extrabold tracking-tight text-black dark:text-white">Meet</span>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-8 items-center">
        <a href="#features" class="nav-link">Features</a>
        <a href="#pricing" class="nav-link">Pricing</a>
        <a href="#about" class="nav-link">About</a>
        <button class="px-5 py-2 rounded-lg bg-black dark:bg-white text-white dark:text-black font-medium hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">Get Started</button>
        <!-- Theme Toggle -->
        <button id="theme-toggle" class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">
          <svg id="sun-icon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m8.25-9h-2.25m-13.5 0H3m15.364-6.364l-1.591 1.591M6.227 6.227l1.591 1.591m0 10.818l-1.591 1.591M18.364 18.364l1.591-1.591M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" />
          </svg>
          <svg id="moon-icon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden flex items-center space-x-4">
        <!-- Theme Toggle for Mobile -->
        <button id="theme-toggle-mobile" class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">
          <svg id="sun-icon-mobile" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m8.25-9h-2.25m-13.5 0H3m15.364-6.364l-1.591 1.591M6.227 6.227l1.591 1.591m0 10.818l-1.591 1.591M18.364 18.364l1.591-1.591M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" />
          </svg>
          <svg id="moon-icon-mobile" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
          </svg>
        </button>
        <!-- Hamburger / Close Toggle -->
        <button id="menu-btn" class="focus:outline-none transition transform p-2">
          <svg id="hamburger-icon" class="w-6 h-6 text-black dark:text-white block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18M3 18h18" />
          </svg>
          <svg id="close-icon" class="w-6 h-6 text-black dark:text-white hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Mobile Side Menu -->
<div id="side-menu" class="fixed top-0 left-0 h-full w-64 bg-white/90 dark:bg-gray-900/90 backdrop-blur-2xl shadow-lg border-r border-gray-200/50 dark:border-gray-800/50 transform -translate-x-full transition-transform duration-300 ease-in-out p-6 space-y-6 z-50">
  <div class="flex items-center">
    <svg class="w-8 h-8 text-black dark:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3 8v8a3 3 0 003 3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3zm9 4a2 2 0 110-4 2 2 0 010 4z" />
    </svg>
    <span class="ml-2 text-2xl font-extrabold tracking-tight text-black dark:text-white">Meet</span>
  </div>
  <a href="#features" class="mobile-link block text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300 font-medium text-lg">Features</a>
  <a href="#pricing" class="mobile-link block text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300 font-medium text-lg">Pricing</a>
  <a href="#about" class="mobile-link block text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300 font-medium text-lg">About</a>
  <button class="w-full px-4 py-2 rounded-lg bg-black dark:bg-white text-white dark:text-black font-medium hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">Get Started</button>
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
  .nav-link {
    @apply text-black dark:text-white font-medium text-base tracking-wide hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200 relative;
  }
  .nav-link::after {
    content: '';
    @apply absolute w-0 h-0.5 bg-black dark:bg-white bottom-0 left-0 transition-all duration-300;
  }
  .nav-link:hover::after {
    @apply w-full;
  }
</style>