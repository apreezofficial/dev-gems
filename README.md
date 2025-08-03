# Meet: Seamless Video Conferencing Landing Page

Welcome to **Meet**, a modern and professional landing page designed to showcase the future of video conferencing. This project offers a glimpse into ultra-clear, low-latency meetings with intuitive collaboration tools, providing a secure and fast experience for users worldwide. 🎥🔒

## Project Structure

The project is structured with a clear separation of concerns, primarily focusing on the client-side presentation:

```
.
├── LICENSE
└── client/
    ├── .htaccess
    ├── index.php
    ├── tailwind.js
    └── includes/
        ├── footer.php
        └── nav.php
```

-   `client/index.php`: The main entry point, serving the landing page HTML structure. It dynamically includes navigation and footer components.
-   `client/tailwind.js`: Contains the compiled Tailwind CSS framework, enabling rapid and responsive styling.
-   `client/includes/nav.php`: Houses the navigation bar, featuring responsive design, branding, and a theme toggle.
-   `client/includes/footer.php`: Contains the footer section, complete with company links, support, newsletter subscription, and social media icons.
-   `LICENSE`: Details the project's licensing information.

## Features

-   **One-Click Meetings**: Easily start or join video meetings without complex setups.
-   **HD Video & Audio**: Enjoy crystal-clear audio and high-definition video for enhanced communication.
-   **End-to-End Security**: Meetings are encrypted to ensure privacy and data safety.
-   **Flexible Pricing Plans**: Offers basic, pro, and enterprise plans tailored to various user needs.
-   **User Testimonials**: Showcases positive feedback from satisfied users, building trust and credibility.
-   **Responsive Design**: Adapts seamlessly across various devices and screen sizes for optimal viewing.
-   **Dark Mode Toggle**: Provides a toggleable dark mode for improved user comfort and accessibility.
-   **Interactive FAQ Section**: Features an accordion-style FAQ for quick answers to common questions.
-   **Smooth Scroll-to-Top**: A discreet button appears on scroll to easily navigate back to the page's top.

## Usage

This project is a static landing page built with PHP includes for modularity. To view and interact with the page:

1.  **Open `client/index.php` in a web browser.**
    Since it uses PHP includes, you'll need a local web server (like Apache, Nginx, or PHP's built-in server) to render the PHP files correctly.
    
    Example using PHP's built-in server from the project root:
    ```bash
    php -S localhost:8000 -t client/
    ```
    Then, open `http://localhost:8000/index.php` in your browser.

2.  **Navigate the Page**:
    *   Use the navigation bar at the top to jump to sections like "Features," "Pricing," and "About."
    *   Click the "Get Started" or "Learn More" buttons in the hero section to explore the page.

3.  **Toggle Theme**:
    *   Click the sun/moon icon in the navigation bar (both desktop and mobile) to switch between light and dark themes. Your preference will be saved in local storage.

4.  **Interact with FAQs**:
    *   In the "Frequently Asked Questions" section, click on any question to expand or collapse its answer.

5.  **Scroll to Top**:
    *   As you scroll down the page, a "Scroll to Top" button will appear in the bottom-right corner. Click it to smoothly return to the top of the page.

## Technologies Used

| Technology      | Purpose                                       | Link                                                       |
| :-------------- | :-------------------------------------------- | :--------------------------------------------------------- |
| HTML5           | Standard markup for web pages                 | [HTML5 Documentation](https://developer.mozilla.org/en-US/docs/Web/HTML) |
| PHP             | Server-side scripting for includes            | [PHP Official Website](https://www.php.net/)               |
| Tailwind CSS    | Utility-first CSS framework for styling       | [Tailwind CSS Docs](https://tailwindcss.com/docs)        |
| JavaScript      | Client-side interactivity and DOM manipulation | [MDN JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript) |

## License

This project is open-sourced under the [MIT License](LICENSE).

## Author

**Precious Adedokun**

-   LinkedIn: [Your LinkedIn Profile](https://linkedin.com/in/yourusername)
-   Twitter: [Your Twitter Profile](https://twitter.com/yourusername)
-   Portfolio: [Your Portfolio URL](https://yourportfolio.com)

---

[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/docs)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

[![Readme was generated by Dokugen](https://img.shields.io/badge/Readme%20was%20generated%20by-Dokugen-brightgreen)](https://www.npmjs.com/package/dokugen)