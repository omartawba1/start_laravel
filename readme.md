## Start Laravel [![Build Status](https://travis-ci.org/omartawba1/start_laravel.svg?branch=master)](https://travis-ci.org/omartawba1/start_laravel) [![StyleCI](https://styleci.io/repos/85490276/shield?branch=master)](https://styleci.io/repos/85490276) 

Start laravel is a simple start app to learn how to develop with laravel, You'll learn these components

- [Migration, Seeding, Routing, Controllers, Models, Validation, Requests, Views, Events, Notifications, Listeners, Auth, Commands, ...etc]

Each framework should has it's quick start app, Let this application be your quick start to Laravel,
It'll help you to build your app structure and show you each component of Laravel and how to best practice them.
I hope it'll help you on understanding Laravel & how to work with it.

## Modules & Features

You can find here modules for `users` , `sections` , `articles` , `comments`  
also you can some good features like `login` , `registration` , `translation` 

## Screen capture

[![Start Laravel](https://media.giphy.com/media/lq8vHqyDtmZ5m/giphy.gif)](https://youtu.be/xH4Y3zxhO98)
[![Start Laravel](https://image.ibb.co/mTX68v/Screen_Shot_2017_03_20_at_10_41_14_AM.png)](https://youtu.be/xH4Y3zxhO98)
[![Start Laravel](https://image.ibb.co/iVJeTv/Screen_Shot_2017_03_20_at_10_41_32_AM.png)](https://youtu.be/xH4Y3zxhO98)
[![Start Laravel](https://image.ibb.co/iVJeTv/Screen_Shot_2017_03_20_at_10_41_53_AM.png)](https://youtu.be/xH4Y3zxhO98)
[![Start Laravel](https://image.ibb.co/iVJeTv/Screen_Shot_2017_03_20_at_10_42.19_AM.png)](https://youtu.be/xH4Y3zxhO98)
[![Start Laravel](https://image.ibb.co/iVJeTv/Screen_Shot_2017_03_20_at_10_42.40_AM.png)](https://youtu.be/xH4Y3zxhO98)

## Installation Steps  

First you will need to clone the project   

Then you go to project directory and run     

`composer install`  

Then create a database named start_laravel then rename `.env.example` to `.env` and change database configuration values to yours.  

Then run  

`php artisan key:generate`  

Then  

`php artisan migrate`  

Then seed users table  

`php artisan db:seed`  

## Default Login Data

Email :`admin@admin.com`  
Pass  :`123456`  

## Custom commands

    php artisan clear:db


## Contributing

Thank you for considering contributing to the start app! you can fork this repository and any merge request are welcome anytime.

## License

The Start Laravel app licensed under the [MIT license](http://opensource.org/licenses/MIT).
