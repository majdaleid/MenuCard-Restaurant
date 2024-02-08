# Welcome to MenuKarte: A Symfony Practice Project

Dive into the world of Symfony6 with MenuKarte, a project designed to practice your skills in symfony framework.

## Prerequisites

To embark on this journey, you'll need to set up your local development environment:

- XAMPP or MAMP or Docker or VAGRANT etc etc 

Choose what suits you best and prepare for an adventure!

## Getting Started

Follow these steps to get your MenuKarte up and running:

1. **Environment Configuration**
   - Copy `env.test` to `.env`.
   - Update the `.env` file with your database credentials: `username`, `password`, and add your `table name` based on your requirements.

2. **Install Dependencies**
   - Run `composer install` in your terminal to install the required PHP dependencies.

3. **Database Creation**
   - Execute `php bin/console doctrine:database:create` to create your database.

4. **Schema Update**
   - Use `php bin/console doctrine:schema:update --force` to update your database schema.

5. **Load Fixtures**
   - Run `php bin/console doctrine:fixtures:load` to load the initial data (username and password for admin panel)

## Accessing Your Project

After completing the setup, your MenuKarte website is ready to explore:

- For **XAMPP** or similar setups, access your site via `http://localhost/yourfolder/public`.

### Admin Access

Dive into the admin area at `http://localhost/yourfolder/public/admin` with the credentials:

- **Username:** admin2
- **Password:** pass_1234

These credentials are generated through Symfony fixtures for a quick start.

## Features

Once logged into the admin panel, you have the power to:

- **Register New Workers:** Add team members to your project.
- **Add Dishes:** Expand your menu with new culinary delights.
- **Add Categories:** Organize your dishes into categories for easier navigation.
- **Order Dishes:** Manage orders and keep your customers satisfied.

## Customization

MenuKarte is designed with flexibility in mind. It utilizes Bootstrap for styling, and the template has been carefully imported and adjusted to fit the project's requirements. Feel free to clone the project and tailor it to your needs.

## Gallery

Here are some snapshots of what you can expect from your MenuKarte project:

![1](https://github.com/majdaleid/MenuCard-Restaurant/assets/34122653/169a11c7-2b0d-4898-8264-1d4803869878)

![Menukarte](https://github.com/majdaleid/MenuCard-Restaurant/assets/34122653/e2844ae3-d484-4f75-bcfc-0e77ad24e6d7)

![gerichte](https://github.com/majdaleid/MenuCard-Restaurant/assets/34122653/7e932061-4617-4eca-9800-057871cd6329)

![Bestellungen2](https://github.com/majdaleid/MenuCard-Restaurant/assets/34122653/4309f088-3556-438c-b8bf-aefe5665c28c)


![adminpanel](https://github.com/majdaleid/MenuCard-Restaurant/assets/34122653/2a2f3cfc-c343-4837-83c2-1ddbaa1a5422)


![admin_panel_add_dishes](https://github.com/majdaleid/MenuCard-Restaurant/assets/34122653/9a36c009-bb04-4ac3-9148-290a388cf40c)


Thank you.



