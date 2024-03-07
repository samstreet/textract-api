# textract-api
This project aims to build a suitable solution for integrating with the Textract API on AWS. It uses three approaches in three different languages to achieve this; PHP (with Laravel), Node.js and Golang 

## Project Structure
The project is broken out into the following directory structure; packages, .docker, .scripts. 

### Packages
The packages directory is the directory for the available builds and languages along with any supporting library requirements.

#### textract-core
The textract-core directory is a core library to handle any shared PHP logic that may be needed within the textract-laravel package. This is to demonstrate the ability for code reuse and breaking out of suitable components.

#### textract-laravel
The main entrypoint for the Laravel API. This is a Laravel 10 Project at the heart of the application.

#### textract-go
An example of a Golang approach to solve the issue a different way in a different language

#### textract-node
An example of a Node.js approach to solve the issue a different way in a different language

### .docker
The Docker directory to hold the relevant Docker files

### .docs
The Writerside project for the documentation

### .scripts
Any useful scripts for testing, supporting local dev etc.

### .support
Any supporting files etc that are needed for the project

## Running the project for Laravel
`docker-compose -f .docker/laravel.compose.yml --env-file .env up -d`