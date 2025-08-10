# Meet: Modern Video Conferencing & Collaboration Platform

Experience the future of seamless communication with Meet, a high-performance web application designed for crystal-clear video calls and efficient team collaboration. Built with a robust PHP backend and a dynamic, responsive frontend, Meet offers an intuitive user experience with essential features for personal and professional connections.

## Features

*   **Real-time Video Conferencing**: Engage in high-definition video and audio calls for unparalleled clarity.
*   **Secure Authentication System**: Robust user registration, login, and password management powered by bcrypt hashing for secure access.
*   **Email Notifications**: Integrated with Resend API for critical communications like account verification and password resets.
*   **Cloud Image Storage**: Seamlessly upload and manage user profile images via Cloudinary.
*   **Responsive and Intuitive UI**: Modern interface with dark mode support built with Tailwind CSS and vanilla JavaScript for a smooth experience across devices.
*   **Flexible Account Options**: Choose from Basic, Pro, or Enterprise plans tailored to individual or business needs.
*   **Comprehensive User Management**: Create, secure, and recover user accounts with ease.

## Usage

Meet provides a comprehensive suite of features to manage user accounts and facilitate communication.

### Account Management

**User Registration:**
To create a new account, navigate to the registration page. The process involves multiple steps:
1.  **Enter Details and Send Verification Code**: Provide your username and email. A verification code will be sent to your email address.
2.  **Verify Code**: Input the received code to verify your email.
3.  **Finalize Registration**: Set your password and optionally upload a profile image and add a bio to complete your profile.

**User Login:**
Access your account by providing your registered email and password on the login page.

**Forgot Password:**
If you forget your password, enter your email on the forgot password page. A unique reset link will be sent to your inbox. Follow the link to set a new password.

### Frontend Interactions

*   **Theme Toggle**: Easily switch between light and dark modes from the navigation bar or login/forgot password pages to suit your preference.
*   **Scroll to Top**: A discreet button appears as you scroll down, allowing for quick navigation back to the top of the page.
*   **FAQ Accordion**: The FAQ section features an interactive accordion for easy access to information.

## Technologies Used

| Technology         | Purpose                                     |
| :----------------- | :------------------------------------------ |
| **PHP**            | Core backend logic and server-side scripting |
| **MySQL**          | Relational database management              |
| **Composer**       | PHP dependency management                   |
| **Tailwind CSS**   | Utility-first CSS framework for styling     |
| **Vanilla JavaScript** | Frontend interactivity and DOM manipulation |
| **Resend API**     | Transactional email delivery                |
| **Cloudinary**     | Cloud-based image and video management      |
| **phpdotenv**      | Environment variable management             |
| **Guzzle**         | PHP HTTP client for API interactions        |

## License

This project is licensed under the [MIT License](LICENSE).

## Author Info

**Precious Adedokun**

*   **Email**: apreezofficial@gmail.com
*   **Twitter**: [YourTwitterHandle](https://twitter.com/YourTwitterHandle)
*   **LinkedIn**: [YourLinkedInProfile](https://linkedin.com/in/YourLinkedInProfile)
*   **Portfolio**: [YourWebsite.com](https://YourWebsite.com)

---

# Meet API

## Overview
Meet API provides a secure and scalable backend for user authentication and profile management, built using PHP with Composer dependencies for mail services (Resend) and cloud storage (Cloudinary), and interacting with a MySQL database.

## Features
- **PHP**: Core backend logic for API endpoints.
- **MySQL**: Persistent storage for user data and password reset tokens.
- **Resend**: Handles sending email notifications for authentication flows.
- **Cloudinary**: Manages cloud storage for user profile images.
- **phpdotenv**: Securely loads environment variables.

## Getting Started
### Installation
To set up the Meet API backend, follow these steps:

1.  Clone the repository:
    ```bash
    git clone https://github.com/apreezofficial/meet.git
    cd meet
    ```
2.  Install PHP dependencies via Composer:
    ```bash
    composer install
    ```
3.  Navigate to the `server` directory and ensure database connection and tables are set up. Run the `query.php` file in your browser or via CLI to create necessary tables:
    ```bash
    # Assuming your web server is configured for the 'server' directory
    # Navigate to http://localhost/server/query/query.php in your browser
    # Or, for CLI:
    php server/query/query.php
    ```

### Environment Variables
Create a `.env` file in the root directory of the project based on `.env.example` and populate it with the following required variables:

| Variable           | Description                               | Example                                    |
| :----------------- | :---------------------------------------- | :----------------------------------------- |
| `DB_HOST`          | Database host                             | `localhost`                                |
| `DB_USER`          | Database username                         | `root`                                     |
| `DB_PASS`          | Database password                         | `root`                                     |
| `DB_NAME`          | Database name                             | `meet`                                     |
| `CLOUD_NAME`       | Cloudinary cloud name                     | `dgyxxxxx`                                 |
| `CLOUD_API_KEY`    | Cloudinary API key                        | `79349xxxxx`                               |
| `CLOUD_API_SECRET` | Cloudinary API secret                     | `Xdxxxxxxxxx`                              |
| `RESEND_API_KEY`   | Resend API key for email services         | `re_xxxxx`                                 |
| `APP_ENV`          | Application environment                   | `development`                              |
| `APP_URL`          | Base URL of the application               | `http://api.example`                       |
| `BACKEND_API_URL`  | Base URL for backend API (used for reset links) | `http://api.example.com`                   |

## API Documentation
### Base URL
`https://your-api-domain.com/server` (replace with your actual domain and path to `server` directory)

### Endpoints

#### POST /auth/register.php
This endpoint handles user registration across multiple actions: sending a verification code, verifying the code, and finalizing registration.

**Request**:
```json
{
  "action": "[send_code|verify_code|finalize_registration]",
  "username": "string (required for send_code)",
  "email": "string (required for send_code)",
  "code": "string (required for verify_code)",
  "password": "string (required for finalize_registration)",
  "profile_image": "file (optional, multipart/form-data for finalize_registration)",
  "bio": "string (optional for finalize_registration)"
}
```
**Response**:
Success (send_code, verify_code):
```json
{
  "status": "success",
  "message": "verification code sent"
}
```
Success (finalize_registration):
```json
{
  "status": "success",
  "message": "registration completed"
}
```
**Errors**:
- `400 Bad Request`: `{"status": "error", "message": "invalid action"}` (if `action` is unknown)
- `400 Bad Request`: `{"status": "error", "message": "wrong code"}` (for `verify_code` if code is incorrect)
- `403 Forbidden`: `{"status": "error", "message": "code verification required"}` (for `finalize_registration` if not verified)
- `409 Conflict`: `{"status": "error", "message": "email already exists"}` (for `send_code` if email is taken)
- `500 Internal Server Error`: `{"status": "error", "message": "failed to send email"}` (for `send_code` if email fails)
- `500 Internal Server Error`: `{"status": "error", "message": "database error saving user details"}` (for `finalize_registration` if database fails)

#### POST /auth/login.php
Authenticates a user and establishes a session.

**Request**:
```json
{
  "email": "string",
  "password": "string"
}
```
**Response**:
```json
{
  "success": true,
  "message": "Login successful",
  "user": {
    "id": 123,
    "email": "user@example.com",
    "username": "johndoe"
  }
}
```
**Errors**:
- `400 Bad Request`: `{"success": false, "message": "Email and password are required"}`
- `400 Bad Request`: `{"success": false, "message": "Invalid email format"}`
- `401 Unauthorized`: `{"success": false, "message": "Invalid Credentials"}`
- `405 Method Not Allowed`: `{"success": false, "message": "Method not allowed"}` (if not a POST request)

#### POST /auth/forgot.php
Initiates the password reset process by sending a reset link to the user's email.

**Request**:
```json
{
  "email": "string"
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
- `400 Bad Request`: `{"success": false, "message": "Valid email is required"}`
- `404 Not Found`: `{"success": false, "message": "No account found with this email"}`
- `500 Internal Server Error`: `{"success": false, "message": "Failed to send reset email. Please try again."}`
- `500 Internal Server Error`: `{"success": false, "message": "Server error. Please try again later."}`

#### POST /auth/reset.php
Resets a user's password using a valid token.

**Request**:
```json
{
  "token": "string",
  "password": "string"
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
- `400 Bad Request`: `{"success": false, "message": "Token and password are required"}`
- `400 Bad Request`: `{"success": false, "message": "Password must be at least 8 characters long"}`
- `400 Bad Request`: `{"success": false, "message": "Invalid or expired reset token"}`
- `400 Bad Request`: `{"success": false, "message": "Reset token has expired"}`
- `500 Internal Server Error`: `{"success": false, "message": "Server error. Please try again later."}`

---
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com/)
[![Cloudinary](https://img.shields.io/badge/Cloudinary-3448C5?style=for-the-badge&logo=cloudinary&logoColor=white)](https://cloudinary.com/)
[![Resend](https://img.shields.io/badge/Resend-000000?style=for-the-badge&logo=resend&logoColor=white)](https://resend.com/)

[![Readme was generated by Dokugen](https://img.shields.io/badge/Readme%20was%20generated%20by-Dokugen-brightgreen)](https://www.npmjs.com/package/dokugen)