# Altwallets

## Installation

Add the following line to your `composer.json` file's "require" array.

    "virtualvendors/altwallets": "dev-master",
    
Run `composer update` to install the package.
    
Add the following line to your `app.php` config file's "providers" array.

    'Virtualvendors\Altwallets\AltwalletsServiceProvider',
    
Update the following line in your `auth.php` config file.

    'model' => 'Virtualvendors\Altwallets\User',
    
Run the following artisan command to guide you through the installation process.

    $ php artisan altwallets:install

In effect, this command does the following:

1. Publish configuration
2. Publish migrations
3. Publish assets
4. Runs migrations
5. Creates super user

You may now access Altwallets via the browser.