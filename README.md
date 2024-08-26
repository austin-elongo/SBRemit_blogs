# PHP Laravel Blog Application

![App Screenshot](assets\Screenshot 2024-08-26 151936.jpg)

## Overview

This is a blog application built by Austin with PHP and Laravel. It includes features for user authentication, creating, reading, updating, and deleting posts, as well as comment management.

## Table of Contents

- [Screenshot](#screenshot)
- [Installation](#installation)
- [Running the Application](#running-the-application)
- [Documentation](#documentation)
- [Detailed Design Specification (DDS)](#detailed-design-specification-dds)

## Screenshot

![App Screenshot](C:\Users\HP\OneDrive\Documents\GitHub\SBremit_blogs\storage\app\public\images\Screenshot 2024-08-26 151936.jpg)

## Installation

To get the project up and running on your local machine, follow these steps:

### Prerequisites

Make sure you have the following installed on your machine:

- PHP 7.x or higher
- Composer
- MySQL or any other database
- Node.js & NPM

### Steps to Run the Application

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/austin-elongo/SBRemit-blogs.git
   cd SBRemit-blogs

2. **install:**
   ```bash
   composer install
npm install

3. **Copy .env.example to .env:**
   ```bash
   cp .env.example .env

Update your .env file with your database credentials and other settings.
Generate Application Key:


php artisan key:generate
Run Migrations:


php artisan migrate
Build Frontend Assets:


npm run dev
Serve the Application:


php artisan serve
Visit http://localhost:8000 in your browser.

Documentation
For detailed documentation on the application's features, API, and more, check out the Documentation.

Detailed Design Specification (DDS)
For the technical design, diagrams, and more, see the Detailed Design Specification (DDS).


### Steps to Implement:


1. **Google Docs Links**: Documentation `https://docs.google.com/document/d/19HV4UAHvJspq9l7RYbwn0iuHRdEhpkU5I2zsnDIUbTs/edit` and DDS `https://docs.google.com/document/d/1_8VZLGI-DnYtVWu-8GQ8soXUrkP0vMEKBCRYwaX2toM/edit?usp=sharing` with the actual URLs to the documentation and DDS on Google Docs.
