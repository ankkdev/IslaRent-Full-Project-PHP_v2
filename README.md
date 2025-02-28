# Islarent - DWES Project

# You can find the screenshots below

## Features


- User registration
- Login and authentication
- User management
- Product listing
- Product registration
- Product editing
- Product deletion
- Product reservation
- Reservation cancellation
- View reservations
- Reservation report
- Payment processing
- Occupancy report
- Advanced search
- Frontend

## Installation and Configuration

### 1. Set Database Port to 3307

By default, MySQL uses port 3306, but for this project, you need to change it to 3307. Follow these steps:

- **Modify `my.ini` file:**
  - Locate your MySQL configuration file (`my.ini`).
  - Find the line: `port=3306` and change it to:
	```ini
	port=3307
	```

- **Update `config.inc.php` file:**
  - Locate `config.inc.php` and add the following line:
	```php
	$cfg['Servers'][$i]['port'] = '3307';
	```

### 2. Set Up the Database

- Create a new MySQL database named `inmobiliaria`.
- Import the provided SQL file (`database/inmobiliaria.sql`) into your MySQL database.
- Make sure your database is named `inmobiliaria`.

### 3. Install Dependencies

This project uses Composer to manage dependencies.

- **Install Composer:**
  - Download and install Composer from [getcomposer.org](https://getcomposer.org/).

- **Initialize Composer:**
  - Run the following command inside the project directory:
	```bash
	composer init
	```

- **Install Stripe PHP Library:**
  - To enable payment functionality, install the Stripe library using:
	```bash
	composer require stripe/stripe-php
	```

### 4. Configure Stripe API Keys

To process payments, you need Stripe API keys.

- Create an account on Stripe.
- Go to Dashboard → Developers → API Keys.
- Copy the Publishable Key and Secret Key.
- Place them in the respective files:
  - Public Key → `form.php`
  - Secret Key → `index.php`

- **Test Payment Credentials:**
  - Use the following test card details:
	- Card Number: `4242 4242 4242 4242`
	- Expiration Date: `12/34`
	- CVC: `123`

### 5. Run the Project

- Start a local server using XAMPP, Laragon, or any other PHP environment.
- Place the project folder inside `htdocs` (if using XAMPP).
- Start Apache and MySQL.
- Access the project in the browser at:


## Project Structure

### 1. User Registration

- Registration form is in `sign_up.php`.
- Data is sent to `register.php` for processing using PDO.
- Fields: Email, Name, Phone, Password, Confirm Password.
- Passwords are hashed for security.
- Data is stored in the `inmobiliaria` database.

### 2. Login & Authentication

- Login form is in `sign_in.php`.
- `login.php` handles authentication by checking credentials in the database.

### 3. User Management

- Admin panel: `user-mng/panel_usuarios.php`.
- Features:
- Edit user details (name, email, phone).
- Delete users.
- Export user data as PDF (excluding passwords).
- Return to `index.php`.

### 4. Product Management

- Product Listing: Available in `panel_usuarios.php`.
- Add Product: Register new properties with details like name, description, price, availability, island, type, and images.
- Edit Product: Modify existing property details.
- Delete Product: Remove properties from the database.

### 5. Reservations

- Book Property: Users can reserve properties from `index.php`.
- Cancel Reservation: Users can cancel their reservations in `mis_reservas.php`.
- View Reservations: Users can filter reservations by ID.
- Download Reservation Report: Generate a PDF report of recent bookings.

### 6. Payment System

- Payments are handled using Stripe API.
- Users can pay directly through `mis_reservas.php`.

### 7. Admin Reports

- Occupancy Report: Admins can download a PDF report summarizing property occupancy statistics.

### 8. Advanced Search

- Search properties based on:
- Keywords
- Posting date
- Property type (Local, Apartment, House)
- Island (7 Canary Islands)
- Top 5 Most Expensive Properties: Displayed in `best_houses.php`.

### 9. Frontend

- CSS Framework: TailwindCSS for responsive design (mobile-first approach).
- JavaScript Framework: Alpine.js for interactive components (e.g., image carousels).

## Live Demo (JUST INDEX)

You can view the live demo of the platform here (JUST INDEX):  
[Canary Islands Housing Rental Platform](https://ankkdev.github.io/islarent.github.io/)

## Screenshots

Here are some screenshots of the platform:
![imagotipo_fondo](https://github.com/user-attachments/assets/8bb46f1a-9e3e-4741-bba9-de8dc54dda54)
![Proyecto nuevo](https://github.com/user-attachments/assets/f9322b80-25b2-4398-8329-e83f6ea4e94c)
![Proyecto nuevo](https://github.com/user-attachments/assets/8d6bf9f6-24a6-4386-a21e-3662f61199cd)

## Notes

- Ensure port 3307 is properly configured for MySQL.
- Ensure the `inmobiliaria` database is created and imported correctly.
- Stripe payment requires valid API keys.
- Make sure Apache and MySQL are running before launching the project.

For any issues, feel free to contact the developer. 🚀



