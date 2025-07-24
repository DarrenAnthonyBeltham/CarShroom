# CarShroom: A Luxury Automotive Experience

Welcome to the official repository for the CarShroom project. This project is a sophisticated web application for a high-end luxury and performance car dealership. It features a rich, interactive frontend for customers and a robust backend API to manage products and user interactions.

## Project Overview

CarShroom is designed to be more than just a website; it's a digital showroom. It allows users to explore various categories of exclusive vehicles (Hypercars, Supercars, SUVs, Muscle Cars), browse and purchase high-performance technology parts, book test drives, and much more. The project is split into two main components: a PHP-based frontend and a Go-based backend API.

## Project Structure

The repository is organized into two primary directories, separating the frontend and backend concerns:

-   **/CarShroom FE (Frontend):** This folder contains the entire client-facing website. It's built with PHP for server-side includes (like the navbar and footer) and dynamic page generation. All user interface elements, styling, and client-side interactivity are managed here.
-   **/CarShroom BE (Backend):** This folder contains the backend API service. It's built with Go (Golang) and is responsible for handling business logic, database interactions, and providing data to the frontend via API endpoints.

---

## Technologies Used

This project leverages a modern tech stack to deliver a high-performance and scalable application.

### Frontend (`CarShroom FE`)

-   **PHP:** Used for server-side templating to create reusable components like the navigation bar and footer across multiple pages.
-   **HTML5:** Provides the core structure for all web pages.
-   **CSS3:** Used for all styling, including advanced layouts with Flexbox and Grid, animations, and ensuring a fully responsive design across all devices.
-   **JavaScript (ES6+):** Powers all client-side interactivity. This includes:
    -   Fetching data dynamically from the Go backend using the `fetch()` API.
    -   Creating interactive components like slideshows, modals, and multi-step forms.
    -   Handling user actions like adding items to the cart.

### Backend (`CarShroom BE`)

-   **Go (Golang):** The primary language for the backend API. Chosen for its high performance, concurrency, and strong typing, making it ideal for building fast and reliable web services.
-   **MySQL:** The relational database used to store all persistent data, including product information for technology parts, car details, and user data.
-   **Go `net/http` package:** Used to build the HTTP server and API endpoints.
-   **`go-sql-driver/mysql`:** The driver used to connect the Go application to the MySQL database.

---

## Setup and Running

To run this project on your local machine, you will need to set up both the frontend and backend environments.

### Frontend Setup

1.  **Web Server:** You need a local web server with PHP support, such as **XAMPP**, **MAMP**, or **WampServer**.
2.  **Directory:** Place the `CarShroom FE` folder inside your web server's public directory (e.g., `htdocs` for XAMPP).
3.  **Run:** Start your web server and navigate to the project URL in your browser (e.g., `http://localhost/CarShroom FE/` or `http://localhost:3000/CarShroom FE/` depending on your setup).

---

## Key Features

-   **Dynamic Product Pages:** Separate, beautifully designed pages for different technology categories (Wheels, Brakes, Engines, etc.) that fetch data from the Go backend.
-   **Shopping Cart:** Full "Add to Cart" functionality, with a dedicated cart page that allows users to view, update, and remove items.
-   **Luxury Car Showcases:** Immersive, full-screen, scroll-snapping pages for car categories like Hypercars and Muscle Cars.
-   **Interactive Dealer Locator:** A custom, interactive map to find dealership locations.
-   **Premium Static Pages:** Professionally designed pages for Offers, Press, Careers, Lifestyle, and more.
-   **Responsive Design:** A seamless and luxurious user experience on all devices, from mobile phones to desktops.
