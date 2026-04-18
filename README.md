# Web SMK 7

Website profile sekolah berbasis Laravel untuk menampilkan informasi sekolah, berita, galeri, data guru, dan panel admin untuk pengelolaan konten.

## Overview

Web SMK 7 is a school profile website built as a collaborative academic project.  
The application provides public-facing pages for school information and a simple admin panel for managing website content.

This repository is being preserved and gradually cleaned up as a portfolio project to document both the original implementation and later improvements in structure, security, and maintainability.

## Main Features

### Public pages
- Home page
- School profile / history pages
- Vision and mission
- Program keahlian / konsentrasi keahlian pages
- Facilities / sarana prasarana pages
- Industry relations page
- Teachers page
- Gallery page
- Blog/news listing
- Blog detail page
- Blog search by keyword and category
- Public comment submission on blog posts

### Admin pages
- Admin dashboard
- Blog CRUD
- Teacher CRUD
- Gallery CRUD
- CKEditor image upload

## Tech Stack

- **Backend:** Laravel 10
- **Frontend:** Blade, Livewire 3, Tailwind CSS, Vite
- **Database:** MySQL
- **Other package:** mews/captcha

## Project Status

This project is currently being cleaned up and documented for portfolio purposes.

Known improvement areas include:
- authorization hardening
- relationship and migration fixes
- search/filter cleanup
- URL/slug stability
- UI consistency
- better project documentation

## Why this project matters

This was not just a tutorial app.  
It was a more practical content-managed web project with:
- public and admin sides
- authentication
- file uploads
- content CRUD
- dynamic blog pages
- comments
- form validation
- database-backed content

Because of that, this repository is useful as a record of real collaborative work, even though some parts still need refactoring.

## Installation

### Requirements
- PHP 8.1+
- Composer
- Node.js + npm
- MySQL

### Setup
```bash
git clone https://github.com/TromBoloN/web-smk7.git
cd web-smk7

composer install
npm install

cp .env.example .env
php artisan key:generate