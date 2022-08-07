# Company CRM

This application is a mini-crm used to manage companies and their employees. It is created with Laravel 8 and allows the following features:
- Basic authentication for an admin user (login and logout).
- CRUD operations on both the company and the employee entities.
- Uploading an image as a company logo, when first creating each company, which will be displayed on the company's details page.
- Implements pagination for company and employee lists where each page shows 10 results only.
- Input validation for create/update forms.
- Each employee is linked to a single company. When a company is deleted, the linked employees will automatically be deleted due to "cascade on delete".

<br/>

## Installation Requirements

The following software/tools must be installed:
- PHP 7.4 or above
- Mysql (tested on 8.0 but should work on 5.7 or above)
- A fresh database created in Mysql and a user with all permissions on it
- Composer
- Git

<br/>

## Installation Steps

1. Clone the repository

    ```git clone https://github.com/moemawla/laravel-company-crm.git```

2. Move inside the project directory

    ```cd laravel-company-crm```

3. Copy .env.example to .env

    ```cp .env.example .env```

4. Set the database credentials in .env

5. Install project dependencies

    ```composer install```

6. Generate application key

    ```php artisan key:generate```

7. Run database migrations

    ```php artisan migrate```

8. Run database seeders

    ```php artisan db:seed```

9. Create a symbolic link from "public/storage" to "storage/app/public"

    ```php artisan storage:link```

10. Serve the app locally

    ```php artisan serve```

11. Open the app in the browser and login with the following credentials
    ```
    email: admin@gmail.com
    pass: password
    ```
