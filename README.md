
## About ZUFU


## Running the application
#### - Run the following commands after cloning the application;

- composer install

- npm install

- duplicate the .env.example file and change the copy to .env 

- add the database config details in the env file

- run php artisan migrate, then run php artisan db:seed 

- run php artisan key:generate

- run npm run build and then php artisan serve 

# Endpoints

The following are the endpoints;

####  Products: GET '/api/products'

#### Product Categories: GET '/api/categories'

#### Product Brands: GET '/api/brands'

#### Blogs: GET '/api/blogs'

#### Product Conditions: GET '/api/product-conditions'
 