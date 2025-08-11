<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meet - Dashboard</title>
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
<body class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-300">
  <!-- Header -->
  <header class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl shadow-lg p-4 sticky top-0 z-20">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <svg class="w-8 h-8 text-black dark:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8v8a3 3 0 003 3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3zm9 4a2 2 0 110-4 2 2 0 010 4z" />
        </svg>
        <span class="ml-2 text-2xl font-extrabold tracking-tight text-black dark:text-white">Meet</span>
      </div>
      <div class="flex items-center space-x-4">
        <span id="username-display" class="text-black dark:text-white font-medium"></span>
        <button id="logout-btn" class="px-4 py-2 bg-red-500 text-white rounded-lg font-medium hover:bg-red-600 transition-all duration-300">Log Out</button>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 animate-fadeIn">
    <!-- Start/Join Call Section -->
    <div class="md:col-span-2 bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-2xl shadow-lg p-6">
      <h2 class="text-2xl font-bold text-black dark:text-white mb-4">Video Calls</h2>
      <div class="space-y-4">
        <div>
          <button id="start-call-btn" class="w-full px-4 py-3 bg-black dark:bg-white text-white dark:text-black rounded-lg font-medium hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">Start New Call</button>
        </div>
        <div>
          <label for="room-id" class="block text-sm font-medium text-black dark:text-white">Join Call by Room ID</label>
          <div class="flex space-x-2">
            <input type="text" id="room-id" placeholder="Enter Room ID" class="mt-1 w-full px-4 py-3 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white text-black dark:text-white transition">
            <button id="join-call-btn" class="px-4 py-3 bg-black dark:bg-white text-white dark:text-black rounded-lg font-medium hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">Join</button>
          </div>
        </div>
        <p id="call-error" class="text-red-500 text-sm hidden"></p>
      </div>
    </div>

    <!-- Profile Section -->
    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-2xl shadow-lg p-6">
      <h2 class="text-2xl font-bold text-black dark:text-white mb-4">Profile</h2>
      <p class="text-gray-600 dark:text-gray-400"><strong>Username:</strong> <span id="profile-username"></span></p>
      <p class="text-gray-600 dark:text-gray-400"><strong>Email:</strong> <span id="profile-email"></span></p>
      <button id="edit-profile-btn" class="mt-4 w-full px-4 py-3 bg-black dark:bg-white text-white dark:text-black rounded-lg font-medium hover:bg-gray-800 dark:hover:bg-gray-200 transition-all duration-300 hover:scale-105">Edit Profile</button>
    </div>

    <!-- Call History Section -->
    <div class="md:col-span-3 bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-2xl shadow-lg p-6">
      <h2 class="text-2xl font-bold text-black dark:text-white mb-4">Call History</h2>
      <div id="call-history" class="space-y-4"></div>
    </div>
  </div>

  <!-- Theme Toggle -->
  <button id="theme-toggle" class="fixed top-4 right-4 p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-black dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">
    <svg id="sun-icon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m8.25-9h-2.25m-13.5 0H3m15.364-6.364l-1.591 1.591M6.227 6.227l1.591 1.591m0 10.818l-1.591 1.591M18.364 18.364l1.591-1.591M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" />
    </svg>
    <svg id="moon-icon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>
  </button>

  <script>
    // Check authentication
    fetch('../../server/auth/check_session.php', {
      method: 'GET',
      headers: { 'Content-Type': 'application/json' }
    })
      .then(response => response.json())
      .then(data => {
        if (!data.success) {
          window.location.href = '../login.php?error=Please log in';
          return;
        }
        document.getElementById('username-display').textContent = data.user.username;
        document.getElementById('profile-username').textContent = data.user.username;
        document.getElementById('profile-email').textContent = data.user.email;
      })
      .catch(error => {
        console.error('Error:', error);
        window.location.href = '../login.php?error=Session error';
      });

    // Start Call
    document.getElementById('start-call-btn').addEventListener('click', async () => {
      try {
        const response = await fetch('../../server/call/start_call.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' }
        });
        const data = await response.json();
        if (data.success) {
          window.location.href = `call.php?room=${data.room_id}`;
        } else {
          document.getElementById('call-error').textContent = data.message;
          document.getElementById('call-error').classList.remove('hidden');
        }
      } catch (error) {
        document.getElementById('call-error').textContent = 'Failed to start call. Please try again.';
        document.getElementById('call-error').classList.remove('hidden');
      }
    });

    // Join Call
    document.getElementById('join-call-btn').addEventListener('click', async () => {
      const roomId = document.getElementById('room-id').value.trim();
      if (!roomId) {
        document.getElementById('call-error').textContent = 'Room ID is required';
        document.getElementById('call-error').classList.remove('hidden');
        return;
      }
      try {
        const response = await fetch('../../server/call/join_call.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ room_id: roomId })
        });
        const data = await response.json();
        if (data.success) {
          window.location.href = `call.php?room=${roomId}`;
        } else {
          document.getElementById('call-error').textContent = data.message;
          document.getElementById('call-error').classList.remove('hidden');
        }
      } catch (error) {
        document.getElementById('call-error').textContent = 'Failed to join call. Please try again.';
        document.getElementById('call-error').classList.remove('hidden');
      }
    });

    // Load Call History
    fetch('../../server/call/call_history.php', {
      method: 'GET',
      headers: { 'Content-Type': 'application/json' }
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const historyDiv = document.getElementById('call-history');
          if (data.calls.length === 0) {
            historyDiv.innerHTML = '<p class="text-gray-600 dark:text-gray-400">No call history available.</p>';
          } else {
            data.calls.forEach(call => {
              historyDiv.innerHTML += `
                <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">
                  <p><strong>Room ID:</strong> ${call.room_id}</p>
                  <p><strong>Date:</strong> ${new Date(call.created_at).toLocaleString()}</p>
                  <p><strong>Duration:</strong> ${call.duration || 'N/A'}</p>
                </div>
              `;
            });
          }
        }
      })
      .catch(error => console.error('Error loading call history:', error));

    // Logout
    document.getElementById('logout-btn').addEventListener('click', async () => {
      await fetch('../../server/auth/logout.php', { method: 'POST' });
      window.location.href = '../login.php';
    });

    // Theme Toggle
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