<p align="center"><a href="https://wemod.com" target="_blank"><img src="https://wemod.com/static/images/wemod-logo-40777eae11.webp" width="100" alt="Laravel Logo"></a></p>

## How to Run

1) First, install the application's PHP dependencies via Composer. If you don't have Composer installed, you can find it [here](https://getcomposer.org/)

```bash
composer install
```

2) This application uses [Laravel Sail](https://laravel.com/docs/11.x/sail) to simplify running it locally. Laravel Sail requires Docker. If you already have Docker, start the application via

```bash
./vendor/bin/sail up -d
```

3) Run the migrations to create the required database tables, with or without seeding URLs in the system. (Run one of the following)

With URLs:

```bash
./vendor/bin/sail artisan migrate --seed
```

Without URLs:

```bash
./vendor/bin/sail migrate
```

4) Ensure you start the Queue Worker so that batch URL uploads will be processed asynchronously

```bash
./vendor/bin/sail artisan queue:work
```

5) Once your Laravel Sail environment is up and running, visit the application by navigating to the following url in your browser

[http://localhost](http://localhost)

You can run the few tests I wrote via

```bash
./vendor/bin/sail artisan test
```

Note that I would have written many more tests, as well as created automated end to end tests with Laravel Dusk, if I had more time.

## Assumptions

### Regarding users and companies
The challenge description said the application is "for enterprise companies", which immediately got me thinking about multitenant, associating URLs with users, users with companies (tenants), etc. 

At the same time, though, the technical specifications said "proper authentication is not required", which made me unsure whether I should spend any time on any of that. 

I decided to "split the difference" and build on top of Laravel Jetstream with Teams functionality enabled. While the application has no users, companies, etc. in its present state (since I decided to spend my time focusing on other aspects of its development), it would be very easy to scope functionality to specific users and organizations by leveraging Jetstream Teams.

### Regarding duplicate URLs
Because the application is ultimately meant to be used by enterprise companies, I assumed that meant the application will be multitenant, and each company will have its own set of URLs. Since different companies might want to shorten the same URLs, and the same records should not be shared by multiple companies, the `original_url` field on the `urls` table is not unique (though it is indexed to facilitate fast lookup). 

### Regarding analytics
The product requirements didn't specify what constituted "visit analytics" for a URL. I settled on providing the visit count and last visit date for each URL.

## Design decisions
### Technologies and features 
This application uses the following:
- **Laravel 11 (Backend framework)**
- **Vue (Frontend framework)**
- **Inertia.js ("Glue" between Vue and Laravel Controllers)**
- **Tailwind (CSS framework)**
- **MySQL (Relational DB)**
- **Redis (Used for caching data)**
- **PHPUnit (Used for testing)**
- **Laravel Pint (Used for automatically conforming code to Laravel coding standards)**

I attempted to use the framework and language features to write well engineered code by:

- **Using RESTful/Resource routes**
- **Using RESTful Controller methods**
- **Using Model (URL) pagination**
- **Using Asynchronous job processing for URL batches**
- **Using Resource response objects to standardize what gets sent to the frontend for a given model**
- **Keeping Controllers lean**
- **Leveraging Services with distinct areas of responsibility**
- **Adding a few tests that prove the analytics endpoint works and that visiting short urls changes the metrics (If I had more time I would test everything else)**
- **Using ValueObjects to pass non-model data in a structured way**
- **Using a Custom Validation Rule to ensure users don't attempt to shorten short URLs**
- **Creating a UI for the application**
- **Including API documentation in the application**

### Regarding my use of polling
Since batch URLs are processed asynchronously to facilitate large batches, I wanted to give the application user an indication of progression through the batch. For a "real" application I would use websockets for this purpose, but for the sake of simplicity I've used polling (which ends once processing is complete) in this case. 

You can observe this by going to "Bulk Add" in the UI and uploading the 1,000 URL CSV file located at `storage/csv/1000.csv`.

### About my committing my Laravel .env file and built JS
Ordinarily I would never commit a .env file (other than .env.example), since it typically contains values you want to keep secret, even from a CMS. Similarly, rather than committing built frontend assets to the repo, build processes often takes care of building the assets as part of deployment/CICD. 

I committed both the .env and built JS files in this case to make it as easy as possible for the reviewer to start the application, and only because they contain no keys or other sensitive information.

## Thank You
Thank you for taking the time to look over my work! I hope to have an opportunity to discuss it with you.
