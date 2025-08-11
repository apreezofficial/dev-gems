# Meet: Real-time Video Conferencing Platform

## Overview
Meet is a real-time video conferencing application backend built with **PHP** and **MySQL**, leveraging **WebSockets** for seamless communication. It provides robust user authentication, secure call management, and integrates with third-party services like Resend for email and Cloudinary for media storage.

## Features
- **User Authentication**: Secure registration, login, password reset, and email verification.
- **Video Conferencing**: Initiate and join private video calls with unique room IDs via WebRTC.
- **Call History**: Tracks and displays a user's past video call sessions.
- **Real-time Signaling**: Utilizes WebSockets (RatchetPHP) for efficient WebRTC signaling between peers.
- **Database Management**: Stores user profiles and call records in a MySQL database.
- **Email Notifications**: Sends verification codes and password reset links via Resend API.
- **Media Handling**: Configured for Cloudinary integration for potential profile image uploads (though not explicitly implemented in provided APIs).
- **Modern Frontend (Client-side)**: Built with plain HTML, JavaScript, and styled using Tailwind CSS for a responsive and intuitive user experience.

## Getting Started

### Environment Variables
To run this project, you will need to set the following environment variables in a `.env` file at the root of the project:

```
# === DATABASE CONFIG ===
DB_HOST=localhost
DB_USER=root
DB_PASS=root
DB_NAME=meet

# === CLOUDINARY CONFIG ===
CLOUD_NAME=your_cloudinary_cloud_name
CLOUD_API_KEY=your_cloudinary_api_key
CLOUD_API_SECRET=your_cloudinary_api_secret

# === RESEND MAIL CONFIG ===
RESEND_API_KEY=re_your_resend_api_key

# === APP CONFIG ===
APP_ENV=development
APP_URL=http://api.example # Or your local client URL (e.g., http://localhost:3360)
BACKEND_API_URL=http://api.example.com # Or your local backend URL (e.g., http://localhost/server)
```

## Usage

This project consists of a backend API and a client-side interface. The client-side pages (`client/*.php`) interact with the backend APIs (`server/*/*.php`).

**Typical User Flow:**

1.  **Sign Up (`client/signup.php`):**
    *   Users provide a username, email, and password.
    *   A verification code is sent to their email.
2.  **Email Verification (`client/verify/signup.php`):**
    *   Users enter the 4-digit code received in their email to verify their account.
3.  **Login (`client/login.php`):**
    *   Verified users can log in with their email and password.
    *   Successful login redirects to the dashboard.
4.  **Dashboard (`client/dashboard/index.php`):**
    *   Displays user profile information.
    *   Allows users to "Start New Call" (generates a unique room ID) or "Join Call by Room ID".
    *   Shows a history of past calls.
5.  **Video Call (`client/dashboard/call.php`):**
    *   Facilitates real-time video and audio communication using WebRTC.
    *   Provides controls to mute audio/video and end the call.
    *   Uses a WebSocket server (`server/websocket.php`) for signaling.

**To Run the WebSocket Server:**
The WebSocket server needs to be run separately. You can start it from your terminal:
```bash
php server/websocket.php
```
Ensure your `client/dashboard/call.php` JavaScript points to the correct WebSocket server address (e.g., `ws://0.0.0.0:8000`).

## API Documentation

### Base URL
`http://api.example.com/server` (Replace `api.example.com` with your actual domain or local server address)

### Endpoints

#### `POST /server/auth/signup.php`
Registers a new user. Sends a verification code to the provided email.
**Request**:
```json
{
  "username": "newuser",
  "email": "user@example.com",
  "password": "StrongPassword123"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Registration successful! Please check your email for the verification code."
}
```
**Errors**:
- `400 Bad Request`: "All fields are required", "Invalid email format", "Password must be at least 6 characters long", "Username already exists", "Email already exists and is verified".
- `500 Internal Server Error`: "Server error. Please try again later."

#### `POST /server/auth/verify.php`
Verifies a user's email address using a 4-digit code.
**Request**:
```json
{
  "code": "1234"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Email verified successfully!"
}
```
**Errors**:
- `400 Bad Request`: "Invalid request", "Please enter a valid 4-digit code", "Invalid or already verified email", "Invalid verification code".
- `500 Internal Server Error`: "Server error. Please try again later."

#### `POST /server/auth/login.php`
Authenticates a user and establishes a session.
**Request**:
```json
{
  "email": "user@example.com",
  "password": "StrongPassword123"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Login successful",
  "user": {
    "id": 1,
    "email": "user@example.com",
    "username": "newuser"
  }
}
```
**Errors**:
- `400 Bad Request`: "Email and password are required", "Invalid email format".
- `401 Unauthorized`: "Invalid credentials".
- `403 Forbidden`: "Please verify your email before logging in".
- `405 Method Not Allowed`: "Method not allowed".
- `500 Internal Server Error`: "Server error. Please try again later."

#### `POST /server/auth/forgot.php`
Initiates the password reset process by sending a reset link to the user's email.
**Request**:
```json
{
  "email": "user@example.com"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Password reset link sent to your email"
}
```
**Errors**:
- `400 Bad Request`: "Valid email is required".
- `404 Not Found`: "No account found with this email".
- `500 Internal Server Error`: "Failed to send reset email. Please try again.", "Server error. Please try again later."

#### `POST /server/auth/reset.php`
Resets the user's password using a valid token received from the `forgot.php` endpoint.
**Request**:
```json
{
  "token": "your_reset_token",
  "password": "NewStrongPassword123"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Password reset successfully"
}
```
**Errors**:
- `400 Bad Request`: "Token and password are required", "Password must be at least 8 characters long", "Invalid or expired reset token", "Reset token has expired".
- `500 Internal Server Error`: "Server error. Please try again later."

#### `GET /server/auth/check_session.php`
Checks the current user's authentication status.
**Request**: (No payload)
**Response**:
```json
{
  "success": true,
  "user": {
    "id": 1,
    "username": "newuser",
    "email": "user@example.com"
  }
}
```
**Errors**:
- `401 Unauthorized`: "Not authenticated".
- `403 Forbidden`: "Account not verified".
- `500 Internal Server Error`: "Server error".

#### `POST /server/auth/logout.php`
Logs out the current user by destroying the session.
**Request**: (No payload)
**Response**:
```json
{
  "success": true,
  "message": "Logged out"
}
```

#### `POST /server/call/start_call.php`
Generates a unique room ID and creates a new call record in the database.
**Request**: (No payload)
**Response**:
```json
{
  "success": true,
  "room_id": "unique_room_id"
}
```
**Errors**:
- `401 Unauthorized`: "Not authenticated".
- `500 Internal Server Error`: "Server error".

#### `POST /server/call/join_call.php`
Validates a given room ID to allow a user to join an existing call.
**Request**:
```json
{
  "room_id": "existing_room_id"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Joining call"
}
```
**Errors**:
- `400 Bad Request`: "Room ID is required".
- `401 Unauthorized`: "Not authenticated".
- `404 Not Found`: "Room not found".
- `500 Internal Server Error`: "Server error".

#### `GET /server/call/call_history.php`
Retrieves the recent call history for the authenticated user.
**Request**: (No payload)
**Response**:
```json
{
  "success": true,
  "calls": [
    {
      "room_id": "room1",
      "created_at": "2024-07-20 10:00:00",
      "duration": "00:15:30"
    },
    {
      "room_id": "room2",
      "created_at": "2024-07-19 14:30:00",
      "duration": null
    }
  ]
}
```
**Errors**:
- `401 Unauthorized`: "Not authenticated".
- `500 Internal Server Error`: "Server error".

## Technologies Used

| Category         | Technology    | Description                                       |
| :--------------- | :------------ | :------------------------------------------------ |
| **Backend Core** | PHP           | Server-side scripting language for logic.         |
| **Database**     | MySQL         | Relational database for data storage.             |
| **WebSockets**   | RatchetPHP    | PHP library for building event-driven WebSocket servers. |
| **Email Service**| Resend        | API for sending transactional emails.            |
| **Cloud Storage**| Cloudinary    | Cloud-based image and video management (configured, not explicitly used in provided API calls). |
| **Environment**  | PHP dotenv    | Loads environment variables from `.env` file.      |
| **HTTP Client**  | Guzzle HTTP   | PHP HTTP client for making API requests.           |
| **Frontend**     | HTML, JS      | Structure and interactivity for the user interface. |
| **Styling**      | Tailwind CSS  | Utility-first CSS framework for rapid styling.     |

## License

This project is licensed under the [MIT License](LICENSE).

## Author Info

**Precious Adedokun**

Connect with me:
*   [Twitter](https://twitter.com/your_twitter_handle) (Replace with actual handle)
*   [LinkedIn](https://linkedin.com/in/your_linkedin_profile) (Replace with actual profile)
*   [Portfolio](https://your-portfolio.com) (Replace with actual portfolio)

---

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![WebSockets](https://img.shields.io/badge/WebSockets-realtime?style=for-the-badge&logo=websocket&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API)
[![Resend](https://img.shields.io/badge/Resend-Fast_Email-blueviolet?style=for-the-badge&logo=resend&logoColor=white)](https://resend.com/)
[![Cloudinary](https://img.shields.io/badge/Cloudinary-Cloud_Media-blue?style=for-the-badge&logo=cloudinary&logoColor=white)](https://cloudinary.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

[![Readme was generated by Dokugen](https://img.shields.io/badge/Readme%20was%20generated%20by-Dokugen-brightgreen)](https://www.npmjs.com/package/dokugen)