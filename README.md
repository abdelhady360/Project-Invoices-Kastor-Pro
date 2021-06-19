<p  align="center"><a href="https://laravel.com" target="_blank"><img   src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p><BR>

## Project Invoices  

_Kastor Pro_ Application that makes it easy for you to manage your bills and deal with customers in a simple way using Laravel  7.x ! 



## Features

- The owner can create and delete multiple admins
- Admins can create and manage Invoices
- Statistics can be made for paid, unpaid and partially paid invoices
- Invoices can be retrieved in Excel format
- The admini receives a notification if the user adds a new invoice
- When the user adds a new invoice, he receives a message in his email reminding him that he has added a new invoice




##  Requirements




<pre><code>PHP >= 7.2.5
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Or
XAMPP 7.X </code></pre>



## Install

Clone repo <br>

<pre><code>git clone https://github.com/abdelhady360/Project-Invoices-Kastor-Pro.git</code></pre>

Install Composer  <br><br>
<a href="https://getcomposer.org/download/" target="_blank">Download Composer</a> <br>

Composer update/install

<pre><code>composer install</code></pre>

Install Nodejs <br>

<a href="https://nodejs.org/en/download/" target="_blank">Download Node.js</a> <br>

NPM Install

<pre><code>npm install</code></pre>

## How to setting

- Go into `.env` file and change Database and Email credentials.
- Go to a file `database\seeds\CreateAdminUserSeeder.php` and set your own owner account
<pre><code>php artisan migrate:refresh</code></pre>

<pre><code>php artisan db:seed --class=PermissionTableSeeder</code></pre>

<pre><code>php artisan db:seed --class=CreateAdminUserSeeder</code></pre>

## Communication
<BR>

<p align="center"><a href="https://twitter.com/abdelhady360/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/ar/thumb/9/9f/Twitter_bird_logo_2012.svg/280px-Twitter_bird_logo_2012.svg.png" width="40"></a></p>


