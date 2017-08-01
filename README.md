# Artisan Web Console For Laraval 5.*

##*This package was developed to run artisan commands on with simple user friendly interface*
## Features:
 - Simple adding needed middlware in config file, wich can be used to grant access to console only for admins
 - Set any custom url prefix for console route
 - Run any artisan commands with all console notifications
 
 ## Installation
 
 1. Install package with composer `composer require "tzepifan/artisan-web-console:dev-master"`
 2. Go to config/app.php and add service `Tzepifan\ArtisanWebConsole\ArtisanWebConsoleServiceProvider::class` to "providers" array
 3. Publish assets and config with `php artisan vendor:publish`
 4. By default console url will be `<yourdomain.com>/artisan-console/interface`
 5. Default middleware is `auth` and `web` 