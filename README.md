# Booking X APIIT
## _Hotel Booking Core System_

Clone the repository and run the following commands

```sh
cd booking-x-apiit
npm install
npm run prod
php artisan db:wipe
php artisan migrate
php artisan db:seed
php artisan serve
```

Final step
Copy the .env.exmple as .env and update the DB_DATABASE path with your current file folder location
