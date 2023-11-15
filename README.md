# products_api

## Installation

#### Backend
1. Clone the project
2. Navigate to backend-api
3. Run `composer install`
4.  Create database 
#### Database.
5. Copy `.env.example` into `.env` file and adjust parameters - database name
6. Run php artisan key:generate - to generate Application key
5. Perform migrations -Run  `php artisan migrate`
6. Seed the database. - Run 'php artisan db:seed' 
7. Run the backend API using `php artisan serve` to start the project at http://localhost:8000




#### Frontend
1. Navigate to `product-frontend` folder using terminal
2. Run `npm install` to install vue.js project dependencies.
3. Copy `.env.example` into `.env` file. copy the below to .env
  VITE_BASE_URL=http://localhost:8000
  VITE_API_PATH=/api/v2
5. and adjust parameters - database name
6. Start frontend by running `npm run dev`
7. Register for an account or Login using data seeded in the database. Any email that will be seeded has the password of = password 
