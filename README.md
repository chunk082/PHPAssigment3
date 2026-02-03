# SportsPro Technical Support System

## Overview
SportsPro Technical Support is a PHP-based MVC web application designed to manage customer product registrations and technical support incidents. The system allows administrators to manage customers, products, technicians, and incidents, while technicians can update assigned incidents and customers can register products.

This project was developed as part of a PHP/MVC coursework assignment and follows the required database schema and functionality provided in the assignment specifications.

---

## Features

### Administrators
- Manage Products
- Manage Technicians
- Manage Customers
- Create Incidents
- Assign Incidents to Technicians
- View All Incidents (Open and Closed)

### Technicians
- View Assigned Incidents
- Update Incident Information
- Close Incidents

### Customers
- Register Products

---

## Technologies Used
- PHP (MVC architecture)
- MySQL
- Bootstrap 5
- HTML5 / CSS3
- phpMyAdmin (database management)

---

## Database Structure
The application uses the following main tables:
- `customers`
- `products`
- `technicians`
- `registrations`
- `incidents`
- `countries`
- `administrators`

### Incident Status Logic
Incident status is determined using the `dateClosed` column:
- **Open Incident** → `dateClosed IS NULL`
- **Closed Incident** → `dateClosed IS NOT NULL`

No additional status column is used, as per assignment requirements.

---

## Setup Instructions

1. Import the provided SQL file into MySQL using phpMyAdmin.
2. Update database connection settings in the database configuration file.
3. Place the project folder in your local server directory (e.g. `htdocs` for XAMPP).
4. Access the application via:
```http://localhost/tech_support```
---

## Notes
- This project strictly follows the assignment’s required schema.
- No additional columns or authentication systems were added.
- Bootstrap is used for layout and styling consistency.
- MVC separation is maintained throughout the application.

---

## Author
**Richard Begin**  
PHP / Web Development Student  

---

## License
This project is for educational purposes only.

