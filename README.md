# redclip_project

to run the front end project:

"npm run dev"

Backend:
config the .env file to conect to your database created before

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=username
DB_USERNAME=password
DB_PASSWORD=secret


run the migrations to create the database table
"php artisan make:migration"

to run the backend project, enter on project  "public folder" and run to start the php server
"php -S localhost:8000"

your url will be: "localhost:8000/api/v1/posts" to conect, read, and update everything