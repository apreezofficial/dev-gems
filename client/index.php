<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Video Call Landing</title>
  <script src="/tailwind.js"></script>
  <script>
    tailwind.config = { darkMode: 'class' }
    if (localStorage.theme === 'dark' ||
      (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.classList.remove('dark')
    }
  </script>
</head>
<body class="bg-gradient-to-br from-green-50 via-white to-green-100 dark:from-gray-900 dark:via-gray-800 dark:to-black min-h-screen transition-colors duration-300">
  <?php
  include './includes/nav.php';
  ?>
<section class="relative pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-20 overflow-hidden">
  <!-- Background decorative circles -->
  <div class="absolute top-0 left-0 w-48 sm:w-64 md:w-72 h-48 sm:h-64 md:h-72 bg-green-400/20 rounded-full blur-3xl animate-pulse"></div>
  <div class="absolute bottom-0 right-0 w-64 sm:w-80 md:w-96 h-64 sm:h-80 md:h-96 bg-green-600/20 rounded-full blur-3xl animate-ping"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-center text-center">
    <!-- Headline -->
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white animate-fadeInUp">
      The Future of
      <span class="bg-gradient-to-r from-green-400 via-green-500 to-green-600 bg-clip-text text-transparent animate-gradient">
        Video Calls
      </span>
      is Here
    </h1>
    <!-- Subtitle -->
    <p class="mt-4 sm:mt-6 max-w-lg sm:max-w-xl md:max-w-2xl text-base sm:text-lg md:text-xl text-gray-600 dark:text-gray-300 animate-fadeInUp delay-200">
      Experience ultra-clear, low-latency meetings with seamless collaboration tools.
    </p>
    <!-- CTA Buttons -->
    <div class="mt-6 sm:mt-8 flex flex-wrap justify-center gap-3 sm:gap-4 animate-fadeInUp delay-400">
      <a href="#start"
        class="px-5 sm:px-6 py-2.5 sm:py-3 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold shadow-lg hover:scale-105 transition transform">
        Get Started
      </a>
      <a href="#learn"
        class="px-5 sm:px-6 py-2.5 sm:py-3 rounded-full bg-white/70 dark:bg-gray-700/60 text-green-700 dark:text-green-300 font-semibold shadow-lg hover:scale-105 transition transform">
        Learn More
      </a>
    </div>
    <!-- Hero Image -->
    <div class="mt-10 sm:mt-12 relative w-full max-w-lg sm:max-w-2xl md:max-w-3xl animate-fadeInUp delay-600">
      <img 
        src="https://scontent.whatsapp.net/v/t39.8562-34/326466552_715473296769362_989563950745411966_n.png?ccb=1-7&_nc_sid=73b08c&_nc_ohc=s7TAK_ChqXkQ7kNvwFhEq_x&_nc_oc=AdljZU_-VsdU402-JIFxd9yuY3xTazXLDw-qDdnwWgIpLG1awLTDyoPQpPiyksULgUE&_nc_zt=3&_nc_ht=scontent.whatsapp.net&_nc_gid=brZpnHjzedbIbtNwve06EA&oh=01_Q5Aa2AGKQP2NKjDpM7EsV_HucNT5IBrg-t5Ouh4fXu58NS3rNw&oe=689590FE"
        alt="Video Call Mockup" 
        class="rounded-3xl shadow-2xl border-4 border-white dark:border-gray-700 w-full object-cover" 
      />
      <!-- Floating element top-left -->
      <div class="absolute -top-4 sm:-top-6 -left-4 sm:-left-6 bg-white dark:bg-gray-700 rounded-xl px-3 py-1.5 sm:px-4 sm:py-2 shadow-xl animate-bounce">
        <span class="text-xs sm:text-sm font-medium text-green-600 dark:text-green-300">🔒 Secure</span>
      </div>
      <!-- Floating element bottom-right -->
      <div class="absolute -bottom-4 sm:-bottom-6 -right-4 sm:-right-6 bg-white dark:bg-gray-700 rounded-xl px-3 py-1.5 sm:px-4 sm:py-2 shadow-xl animate-bounce delay-1000">
        <span class="text-xs sm:text-sm font-medium text-green-600 dark:text-green-300">⚡ Fast</span>
      </div>
    </div>
  </div>

<section id="features" class="relative py-16 sm:py-20 bg-white dark:bg-gray-900 overflow-hidden">
  <!-- Decorative background -->
  <div class="absolute top-1/2 left-0 w-64 h-64 bg-green-500/10 rounded-full blur-3xl -translate-y-1/2 -z-10"></div>
  <div class="absolute top-0 right-0 w-80 h-80 bg-green-700/10 rounded-full blur-3xl -z-10"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Heading -->
    <div class="text-center mb-14 animate-fadeInUp">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white">
        Why Choose <span class="text-green-600 dark:text-green-400">Meet?</span>
      </h2>
      <p class="mt-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
        Packed with everything you need to stay connected and productive.
      </p>
    </div>

    <!-- Features Grid -->
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Feature 1 -->
      <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 animate-fadeInUp delay-100">
        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">One-Click Meetings</h3>
        <p class="text-gray-600 dark:text-gray-300">Start or join a video meeting instantly, no complicated setup required.</p>
      </div>

      <!-- Feature 2 -->
      <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 animate-fadeInUp delay-200">
        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">HD Video & Audio</h3>
        <p class="text-gray-600 dark:text-gray-300">Crystal-clear audio and high-definition video for better collaboration.</p>
      </div>

      <!-- Feature 3 -->
      <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 animate-fadeInUp delay-300">
        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .341.034.675.098.996a4 4 0 11-1.732 0A5.99 5.99 0 0012 11z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">End-to-End Security</h3>
        <p class="text-gray-600 dark:text-gray-300">Your meetings are encrypted, keeping your conversations safe.</p>
      </div>
    </div>
  </div>
</section>
<section id="pricing" class="relative py-20 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- Decorative background shapes -->
  <div class="absolute top-0 left-1/3 w-80 h-80 bg-green-500/10 rounded-full blur-3xl -z-10 animate-pulse"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-green-700/10 rounded-full blur-3xl -z-10 animate-ping"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Heading -->
    <div class="text-center mb-16 animate-fadeInUp">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white">
        Flexible <span class="text-green-600 dark:text-green-400">Plans</span> for Everyone
      </h2>
      <p class="mt-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
        Whether you're an individual or a business, we've got you covered.
      </p>
    </div>

    <!-- Pricing Grid -->
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Basic Plan -->
      <div class="p-8 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 animate-fadeInUp delay-100">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Basic</h3>
        <p class="text-gray-600 dark:text-gray-300 mb-6">For personal use & small meetings.</p>
        <div class="text-4xl font-extrabold text-green-600 dark:text-green-400 mb-6">$0 <span class="text-lg font-medium text-gray-500 dark:text-gray-400">/mo</span></div>
        <ul class="space-y-3 text-gray-600 dark:text-gray-300 mb-8">
          <li>✓ 40 min limit</li>
          <li>✓ Up to 50 participants</li>
          <li>✓ Standard security</li>
        </ul>
        <a href="#start" class="block w-full px-6 py-3 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold shadow hover:scale-105 transition">Get Started</a>
      </div>

      <!-- Pro Plan -->
      <div class="p-8 bg-gradient-to-b from-green-500 to-green-600 rounded-2xl shadow-xl text-white transform scale-105 animate-fadeInUp delay-200">
        <h3 class="text-2xl font-bold mb-4">Pro</h3>
        <p class="mb-6 opacity-90">Perfect for teams & small businesses.</p>
        <div class="text-4xl font-extrabold mb-6">$19 <span class="text-lg font-medium opacity-75">/mo</span></div>
        <ul class="space-y-3 mb-8 opacity-90">
          <li>✓ Unlimited meeting length</li>
          <li>✓ Up to 250 participants</li>
          <li>✓ Advanced security</li>
          <li>✓ Cloud recording</li>
        </ul>
        <a href="#start" class="block w-full px-6 py-3 rounded-full bg-white text-green-600 font-semibold shadow hover:scale-105 transition">Upgrade Now</a>
      </div>

      <!-- Enterprise Plan -->
      <div class="p-8 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1 animate-fadeInUp delay-300">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Enterprise</h3>
        <p class="text-gray-600 dark:text-gray-300 mb-6">For large organizations & events.</p>
        <div class="text-4xl font-extrabold text-green-600 dark:text-green-400 mb-6">Custom</div>
        <ul class="space-y-3 text-gray-600 dark:text-gray-300 mb-8">
          <li>✓ Unlimited everything</li>
          <li>✓ Premium support</li>
          <li>✓ Custom integrations</li>
        </ul>
        <a href="#contact" class="block w-full px-6 py-3 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold shadow hover:scale-105 transition">Contact Us</a>
      </div>
    </div>
  </div>
</section>
<section id="testimonials" class="relative py-20 bg-white dark:bg-gray-900 overflow-hidden">
  <!-- Decorative shapes -->
  <div class="absolute top-10 left-0 w-64 h-64 bg-green-500/10 rounded-full blur-3xl -z-10 animate-ping"></div>
  <div class="absolute bottom-10 right-0 w-72 h-72 bg-green-700/10 rounded-full blur-3xl -z-10 animate-pulse"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Heading -->
    <div class="text-center mb-16 animate-fadeInUp">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white">
        Trusted by <span class="text-green-600 dark:text-green-400">Millions</span> Worldwide
      </h2>
      <p class="mt-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
        Here’s what our users are saying about their experience.
      </p>
    </div>

    <!-- Testimonials Grid -->
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
      <!-- Testimonial 1 -->
      <div class="p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition transform hover:-translate-y-1 animate-fadeInUp delay-100">
        <div class="flex items-center mb-6">
          <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User"
               class="w-12 h-12 rounded-full shadow">
          <div class="ml-4">
            <p class="font-semibold text-gray-900 dark:text-white">Sarah Johnson</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Startup Founder</p>
          </div>
        </div>
        <p class="text-gray-600 dark:text-gray-300">“The call quality is outstanding and the team features save us hours every week!”</p>
      </div>

      <!-- Testimonial 2 -->
      <div class="p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition transform hover:-translate-y-1 animate-fadeInUp delay-200">
        <div class="flex items-center mb-6">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
               class="w-12 h-12 rounded-full shadow">
          <div class="ml-4">
            <p class="font-semibold text-gray-900 dark:text-white">David Lee</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Marketing Lead</p>
          </div>
        </div>
        <p class="text-gray-600 dark:text-gray-300">“We switched from another platform and have never looked back. Absolute game-changer!”</p>
      </div>

      <!-- Testimonial 3 -->
      <div class="p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition transform hover:-translate-y-1 animate-fadeInUp delay-300">
        <div class="flex items-center mb-6">
          <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User"
               class="w-12 h-12 rounded-full shadow">
          <div class="ml-4">
            <p class="font-semibold text-gray-900 dark:text-white">Alex Gomez</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Freelancer</p>
          </div>
        </div>
        <p class="text-gray-600 dark:text-gray-300">“Seamless and secure calls every time. Perfect for my client meetings.”</p>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-16 animate-fadeInUp delay-400">
      <a href="#start" class="inline-block px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-full shadow hover:scale-105 transition">
        Join Thousands of Happy Users
      </a>
    </div>
  </div>
</section>
<section id="faq" class="relative py-20 bg-gradient-to-br from-green-50 via-white to-green-100 dark:from-gray-900 dark:via-gray-800 dark:to-black">
  <!-- Decorative background -->
  <div class="absolute top-10 left-10 w-72 h-72 bg-green-500/20 rounded-full blur-3xl animate-pulse"></div>
  <div class="absolute bottom-10 right-10 w-96 h-96 bg-green-700/20 rounded-full blur-3xl animate-ping"></div>

  <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
    <h2 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white animate-fadeInUp">
      Frequently Asked Questions
    </h2>
    <p class="mt-4 text-center text-gray-600 dark:text-gray-300 animate-fadeInUp delay-200">
      Everything you need to know about our platform.
    </p>

    <!-- Accordion Container -->
    <div class="mt-12 space-y-4">
      <!-- FAQ Item -->
      <div class="faq-item rounded-2xl bg-white/60 dark:bg-gray-800/50 shadow-lg border border-white/30 dark:border-gray-700 overflow-hidden transition transform hover:scale-[1.02]">
        <button class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left">
          <span class="font-semibold text-gray-900 dark:text-white text-lg">Is the video call secure?</span>
          <svg class="w-5 h-5 text-green-600 dark:text-green-400 transition-transform transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div class="faq-content px-6 pb-4 text-gray-600 dark:text-gray-300 hidden">
          Yes, all our calls are end-to-end encrypted using the latest security protocols.
        </div>
      </div>

      <div class="faq-item rounded-2xl bg-white/60 dark:bg-gray-800/50 shadow-lg border border-white/30 dark:border-gray-700 overflow-hidden transition transform hover:scale-[1.02]">
        <button class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left">
          <span class="font-semibold text-gray-900 dark:text-white text-lg">Do I need to install anything?</span>
          <svg class="w-5 h-5 text-green-600 dark:text-green-400 transition-transform transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div class="faq-content px-6 pb-4 text-gray-600 dark:text-gray-300 hidden">
          Nope! Our platform works directly from your browser. Just click and start.
        </div>
      </div>

      <div class="faq-item rounded-2xl bg-white/60 dark:bg-gray-800/50 shadow-lg border border-white/30 dark:border-gray-700 overflow-hidden transition transform hover:scale-[1.02]">
        <button class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left">
          <span class="font-semibold text-gray-900 dark:text-white text-lg">How many people can join a call?</span>
          <svg class="w-5 h-5 text-green-600 dark:text-green-400 transition-transform transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div class="faq-content px-6 pb-4 text-gray-600 dark:text-gray-300 hidden">
          Our platform supports up to 500 participants in a single call.
        </div>
      </div>

      <div class="faq-item rounded-2xl bg-white/60 dark:bg-gray-800/50 shadow-lg border border-white/30 dark:border-gray-700 overflow-hidden transition transform hover:scale-[1.02]">
        <button class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left">
          <span class="font-semibold text-gray-900 dark:text-white text-lg">Can I record my meetings?</span>
          <svg class="w-5 h-5 text-green-600 dark:text-green-400 transition-transform transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div class="faq-content px-6 pb-4 text-gray-600 dark:text-gray-300 hidden">
          Absolutely, with one click you can record and securely store your meetings in the cloud.
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include './includes/footer.php';
?>
</section>
<script>
  // FAQ Accordion Script
  document.querySelectorAll('.faq-toggle').forEach(button => {
    button.addEventListener('click', () => {
      const content = button.parentElement.querySelector('.faq-content');
      const icon = button.querySelector('svg');
      
      if (content.classList.contains('hidden')) {
        document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
        document.querySelectorAll('.faq-toggle svg').forEach(i => i.classList.remove('rotate-180'));
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
      } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
      }
    });
  });
</script>
<style>
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }
  .animate-fadeInUp { animation: fadeInUp 0.8s ease forwards; }
  .animate-fadeInUp.delay-200 { animation-delay: 0.2s; }
  .animate-fadeInUp.delay-400 { animation-delay: 0.4s; }
  .animate-fadeInUp.delay-600 { animation-delay: 0.6s; }
  .animate-gradient {
    background-size: 200% 200%;
    animation: gradientShift 3s ease infinite;
  }
</style>
</body>
</html>