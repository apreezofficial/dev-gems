<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Meet | Your All in one Video Conferencing</title>
  <script src="tailwind.js"></script>
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
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-white dark:bg-gray-900 transition-colors duration-300">
  <!-- Square Grid Background -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2740%27 height=%2740%27 viewBox=%270 0 40 40%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cpath d=%27M0 0h40v40H0z%27 fill=%27none%27/%3E%3Cpath d=%27M20 0v40M0 20h40%27 stroke=%27%23E5E7EB%27 stroke-opacity=%270.2%27/%3E%3C/svg%3E%27)] dark:bg-[url('data:image/svg+xml,%3Csvg width=%2740%27 height=%2740%27 viewBox=%270 0 40 40%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cpath d=%27M0 0h40v40H0z%27 fill=%27none%27/%3E%3Cpath d=%27M20 0v40M0 20h40%27 stroke=%27%234B5563%27 stroke-opacity=%270.2%27/%3E%3C/svg%3E%27)] bg-[length:40px_40px] opacity-50"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-center text-center">
    <!-- Headline -->
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-black dark:text-white animate-fadeInUp">
      The Future of
      <span class="relative inline-block">
        Video Calls
        <span class="absolute -bottom-2 left-0 w-full h-1 bg-black dark:bg-white animate-underline"></span>
      </span>
      is Here
    </h1>
    <!-- Subtitle -->
    <p class="mt-4 sm:mt-6 max-w-lg sm:max-w-xl md:max-w-2xl text-lg sm:text-xl md:text-2xl text-gray-600 dark:text-gray-300 animate-fadeInUp delay-200">
      Crystal-clear video, lightning-fast connections, and seamless collaboration tools.
    </p>
    <!-- CTA Buttons -->
    <div class="mt-8 sm:mt-10 flex flex-wrap justify-center gap-4 animate-fadeInUp delay-400">
      <a href="register.php" class="px-6 py-3 rounded-lg bg-black dark:bg-white text-white dark:text-black font-semibold shadow-lg hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">
        Get Started
      </a>
      <a href="#learn" class="px-6 py-3 rounded-lg bg-white/80 dark:bg-gray-800/80 text-black dark:text-white font-semibold shadow-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300 hover:scale-105">
        Learn More
      </a>
    </div>
    <!-- Hero Image -->
    <div class="mt-12 sm:mt-16 relative w-full max-w-lg sm:max-w-2xl md:max-w-4xl animate-fadeInUp delay-600">
      <img
        src="https://scontent.whatsapp.net/v/t39.8562-34/326466552_715473296769362_989563950745411966_n.png?ccb=1-7&_nc_sid=73b08c&_nc_ohc=jROWizZKXcoQ7kNvwHVo4ea&_nc_oc=AdmfYHOSfJVD0OQVotmtag0QIOtvqKH36h6bCMIy63IXLb5CVwx6LHd3vrFTrsBnJbw&_nc_zt=3&_nc_ht=scontent.whatsapp.net&_nc_gid=MVSizkXSWPbHMu-NlT05UQ&oh=01_Q5Aa2QFXA-9h4Npr0VbXMjib8n-hF_TM8Fw163-ARt7aiFEmyw&oe=689DB23E"
        alt="Video Call Mockup"
        class="rounded-2xl shadow-2xl border-2 border-gray-200 dark:border-gray-800 w-full object-cover"
      />
      <!-- Floating element top-left -->
      <div class="absolute -top-4 sm:-top-6 -left-4 sm:-left-6 bg-white/90 dark:bg-gray-800/90 rounded-lg px-4 py-2 shadow-xl animate-float">
        <span class="text-sm font-medium text-black dark:text-white flex items-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4m0 0c-2.2 0-4-1.8-4-4s1.8-4 4-4m0 0c2.2 0 4 1.8 4 4s-1.8 4-4 4m9-4c0 5-4 9-9 9s-9-4-9-9 4-9 9-9 9 4 9 9z" />
          </svg>
          Secure
        </span>
      </div>
      <!-- Floating element bottom-right -->
      <div class="absolute -bottom-4 sm:-bottom-6 -right-4 sm:-right-6 bg-white/90 dark:bg-gray-800/90 rounded-lg px-4 py-2 shadow-xl animate-float delay-1000">
        <span class="text-sm font-medium text-black dark:text-white flex items-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
          Fast
        </span>
      </div>
    </div>
  </div>
</section>

<style>
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  @keyframes float {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-8px);
    }
  }
  @keyframes underline {
    from {
      width: 0;
    }
    to {
      width: 100%;
    }
  }
  .animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out forwards;
  }
  .animate-float {
    animation: float 3s ease-in-out infinite;
  }
  .animate-underline {
    animation: underline 0.8s ease-out forwards;
  }
  .delay-200 {
    animation-delay: 0.2s;
  }
  .delay-400 {
    animation-delay: 0.4s;
  }
  .delay-600 {
    animation-delay: 0.6s;
  }
  .delay-1000 {
    animation-delay: 1s;
  }
</style>
<section id="features" class="relative py-16 sm:py-20 bg-white dark:bg-gray-900 overflow-hidden">
  <!-- Decorative Background -->
  <div class="absolute top-1/2 left-0 w-64 h-64 bg-gray-200/20 dark:bg-gray-800/20 rounded-full blur-3xl -translate-y-1/2 -z-10"></div>
  <div class="absolute top-0 right-0 w-80 h-80 bg-gray-300/20 dark:bg-gray-700/20 rounded-full blur-3xl -z-10"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Heading -->
    <div class="text-center mb-14">
      <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-black dark:text-white">
        Why Choose <span class="text-black dark:text-white">Meet?</span>
      </h2>
      <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400">
        Everything you need to connect and collaborate seamlessly.
      </p>
    </div>

    <!-- Features Grid -->
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Feature 1 -->
      <div class="p-6 bg-white/90 dark:bg-gray-900/90 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 backdrop-blur-sm">
        <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 text-black dark:text-white mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-black dark:text-white mb-2">Instant Meetings</h3>
        <p class="text-gray-600 dark:text-gray-400">Launch or join video calls with a single click—no setup hassle.</p>
      </div>

      <!-- Feature 2 -->
      <div class="p-6 bg-white/90 dark:bg-gray-900/90 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 backdrop-blur-sm">
        <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 text-black dark:text-white mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8v8a3 3 0 003 3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3zm9 4a2 2 0 110-4 2 2 0 010 4z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-black dark:text-white mb-2">Crystal-Clear Video</h3>
        <p class="text-gray-600 dark:text-gray-400">High-definition video and audio for seamless collaboration.</p>
      </div>

      <!-- Feature 3 -->
      <div class="p-6 bg-white/90 dark:bg-gray-900/90 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 backdrop-blur-sm">
        <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 text-black dark:text-white mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.657-1.343-3-3-3S6 9.343 6 11s1.343 3 3 3 3-1.343 3-3zm0 0c0-2.761-2.239-5-5-5S2 8.239 2 11s2.239 5 5 5 5-2.239 5-5zm10 0c0-2.761-2.239-5-5-5s-5 2.239-5 5 2.239 5 5 5 5-2.239 5-5z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-black dark:text-white mb-2">Secure by Design</h3>
        <p class="text-gray-600 dark:text-gray-400">End-to-end encryption keeps your meetings private and safe.</p>
      </div>
    </div>
  </div>
</section>

<style>
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out forwards;
  }
  .delay-100 { animation-delay: 0.1s; }
  .delay-200 { animation-delay: 0.2s; }
  .delay-300 { animation-delay: 0.3s; }
</style>
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
        <a href="register.php" class="block w-full px-6 py-3 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold shadow hover:scale-105 transition">Get Started</a>
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