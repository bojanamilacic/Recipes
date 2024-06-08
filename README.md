<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Setup Laravel Project</title>
</head>
<body>

<h1>SETUP LARAVEL PROJECT</h1>

<h2>1. Install Composer Dependencies</h2>

<p>Run the following command in your terminal:</p>

<pre><code>composer install</code></pre>

<h2>2. Setup .env</h2>

<ul>
  <li>Duplicate the <code>.env.example</code> file and rename it to <code>.env</code>.</li>
  <li>Open the <code>.env</code> file and set your database connection details:</li>
</ul>

<pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password</code></pre>

<h2>3. Setup MySQL Container</h2>

<p>Run the following command:</p>

<pre><code>./vendor/bin/sail up -d</code></pre>

<h2>4. Migrate the Database</h2>

<p>Run the following command:</p>

<pre><code>php artisan migrate</code></pre>

<h2>5. Seed the Database</h2>

<p>Run the following command:</p>

<pre><code>php artisan db:seed</code></pre>

<h2>6. Start the Development Server</h2>

<p>Run the following command:</p>

<pre><code>php artisan serve</code></pre>

<h2>Docker Setup (Optional)</h2>

<p>If you are using Docker for your Laravel project, make sure Docker is installed and configured properly. You can use Laravel Sail for Docker setup, which is already included in Laravel projects by default.</p>

</body>
</html>
