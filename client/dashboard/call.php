<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meet - Video Call</title>
  <script src="../tailwind.js"></script>
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.6s ease-out forwards; }
  </style>
</head>
<body class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-300">
  <div class="max-w-7xl mx-auto p-6 animate-fadeIn">
    <div class="flex items-center mb-8">
      <svg class="w-8 h-8 text-black dark:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8v8a3 3 0 003 3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3zm9 4a2 2 0 110-4 2 2 0 010 4z" />
      </svg>
      <span class="ml-2 text-2xl font-extrabold tracking-tight text-black dark:text-white">Meet</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="relative">
        <video id="local-video" class="w-full rounded-lg" autoplay muted></video>
        <p class="absolute bottom-2 left-2 text-white bg-black/50 px-2 py-1 rounded">You</p>
      </div>
      <div class="relative">
        <video id="remote-video" class="w-full rounded-lg" autoplay></video>
        <p class="absolute bottom-2 left-2 text-white bg-black/50 px-2 py-1 rounded">Remote</p>
      </div>
    </div>
    <div class="mt-4 flex space-x-4">
      <button id="mute-audio-btn" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Mute Audio</button>
      <button id="mute-video-btn" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Mute Video</button>
      <button id="stop-btn" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">End Call</button>
    </div>
    <p id="call-error" class="mt-4 text-red-500 text-sm hidden"></p>
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
  // ======== Get Room ID ========
  const roomId = new URLSearchParams(window.location.search).get('room');
  const errorDisplay = document.getElementById('call-error');
  if (!roomId) {
    errorDisplay.textContent = 'No room ID provided';
    errorDisplay.classList.remove('hidden');
    throw new Error('No room ID provided');
  }

  // ======== WebRTC Configuration ========
  const configuration = {
    iceServers: [
      { urls: 'stun:stun.l.google.com:19302' }
      // Add TURN here if needed
    ]
  };
  const peerConnection = new RTCPeerConnection(configuration);
  let localStream;
  let ws;

  // ======== WebSocket Init ========
  function initWebSocket() {
    // Change 'localhost' to your LAN IP or domain when needed
    ws = new WebSocket('ws://0.0.0.0:8000');

    ws.onopen = async () => {
      console.log('✅ WebSocket connected');

      try {
        const offer = await peerConnection.createOffer();
        await peerConnection.setLocalDescription(offer);
        ws.send(JSON.stringify({
          room_id: roomId,
          type: 'offer',
          offer: peerConnection.localDescription
        }));
      } catch (error) {
        console.error('Error creating offer:', error);
        errorDisplay.textContent = 'Failed to initiate call';
        errorDisplay.classList.remove('hidden');
      }
    };

    ws.onmessage = async (event) => {
      try {
        const data = JSON.parse(event.data);
        if (!data || !data.type) return;

        switch (data.type) {
          case 'offer':
            console.log('📩 Offer received');
            await peerConnection.setRemoteDescription(new RTCSessionDescription(data.offer));
            const answer = await peerConnection.createAnswer();
            await peerConnection.setLocalDescription(answer);
            ws.send(JSON.stringify({
              room_id: roomId,
              type: 'answer',
              answer
            }));
            break;

          case 'answer':
            console.log('📩 Answer received');
            await peerConnection.setRemoteDescription(new RTCSessionDescription(data.answer));
            break;

          case 'candidate':
            console.log('📩 ICE candidate received');
            await peerConnection.addIceCandidate(new RTCIceCandidate(data.candidate));
            break;
        }
      } catch (error) {
        console.error('WebSocket message error:', error);
        errorDisplay.textContent = 'Error in call signaling';
        errorDisplay.classList.remove('hidden');
      }
    };

    ws.onerror = (error) => {
      console.error('❌ WebSocket error:', error);
      errorDisplay.textContent = 'WebSocket connection failed';
      errorDisplay.classList.remove('hidden');
    };

    ws.onclose = () => {
      console.warn('⚠️ WebSocket closed');
      errorDisplay.textContent = 'WebSocket connection closed';
      errorDisplay.classList.remove('hidden');
    };
  }

  // ======== Get Media and Start Call ========
  navigator.mediaDevices.getUserMedia({ video: true, audio: true })
    .then(stream => {
      localStream = stream;
      document.getElementById('local-video').srcObject = stream;
      stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
      initWebSocket();
    })
    .catch(error => {
      console.error('Media error:', error);
      errorDisplay.textContent = 'Failed to access camera or microphone. Please check permissions.';
      errorDisplay.classList.remove('hidden');
    });

  // ======== ICE Candidate Handling ========
  peerConnection.onicecandidate = event => {
    if (event.candidate) {
      ws.send(JSON.stringify({
        room_id: roomId,
        type: 'candidate',
        candidate: event.candidate
      }));
    }
  };

  // ======== Remote Stream ========
  peerConnection.ontrack = event => {
    document.getElementById('remote-video').srcObject = event.streams[0];
  };

  // ======== Connection State ========
  peerConnection.oniceconnectionstatechange = () => {
    console.log('ICE state:', peerConnection.iceConnectionState);
    if (['disconnected', 'failed'].includes(peerConnection.iceConnectionState)) {
      errorDisplay.textContent = 'Call disconnected';
      errorDisplay.classList.remove('hidden');
    }
  };

  // ======== Mute / Unmute ========
  document.getElementById('mute-audio-btn').addEventListener('click', () => {
    if (localStream) {
      localStream.getAudioTracks().forEach(track => {
        track.enabled = !track.enabled;
        document.getElementById('mute-audio-btn').textContent =
          track.enabled ? 'Mute Audio' : 'Unmute Audio';
      });
    }
  });

  document.getElementById('mute-video-btn').addEventListener('click', () => {
    if (localStream) {
      localStream.getVideoTracks().forEach(track => {
        track.enabled = !track.enabled;
        document.getElementById('mute-video-btn').textContent =
          track.enabled ? 'Mute Video' : 'Unmute Video';
      });
    }
  });

  // ======== End Call ========
  document.getElementById('stop-btn').addEventListener('click', () => {
    peerConnection.close();
    if (localStream) {
      localStream.getTracks().forEach(track => track.stop());
    }
    if (ws) ws.close();
    window.location.href = 'dashboard.php';
  });

  // ======== Theme Toggle ========
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

  if (localStorage.getItem('theme') === 'dark' ||
    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
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