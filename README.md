# textract-api
This project aims to build a suitable solution for integrating with the Textract API on AWS. 

## Project Structure
The project is broken out into the following directory structure; packages, .docker, .scripts. 

### Packages
The packages directory is the directory for the available builds and languages along with any supporting library requirements.

#### textract-core
The textract-core directory is a core library to handle any shared PHP logic that may be needed within the textract-laravel package. This is to demonstrate the ability for code reuse and breaking out of suitable components.

#### textract-laravel
The main entrypoint for the Laravel API. This is a Laravel 10 Project at the heart of the application.

#### textract-routing
The package to define routes, also demonstrates code re-use.

### .docker
The Docker directory to hold the relevant Docker files

### .docs
The Writerside project for the documentation

### .scripts
Any useful scripts for testing, supporting local dev etc.

### .support
Any supporting files etc that are needed for the project

## Running the project for Laravel
- `cp .env.example .env` in the project root
- `cd packages/textract-laravel && cp .env.example .env`
  - add the relevant AWS KEY and AWS SECRET (these are supplied in an email to point to my AWS)
- `docker-compose -f .docker/laravel.compose.yml --env-file .env up -d`
- Exec into the textract-api.test container and run `cd packages/textract-routing && composer install`
- Exec into the textract-api.test container and run `cd packages/textract-core && composer install`
- Exec into the textract-api.test container and run `cd packages/textract-laravel && composer install`
- Exec into the textract-api.test container and run `php artisan migrate`
- In postman (or other endpoint client)
  - `GET http://localhost:8080/api/textract/{uuid}/status` will show you the status of an upload
  - `POST http://localhost:8080/api/textract` this will create an upload, it MUST be form-data and have a key of `pdf` that is a pdf file
  - `DELETE http://localhost:8080/api/textract/{uuid}` will delete an upload and all associated upload_content
- There is no auth within this demo, normally I would use something like Laravel Sanctum or roll my own JWT approach.
- There are no supporting tests as I ran out of time to add them.
- There is no supporting documentation as I ran out of time, but there is an example structure for Writerside.
