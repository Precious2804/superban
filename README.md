## Superban Laravel Package

The Superban Laravel Package provides rate limiting and banning features for API clients based on their behavior. It is designed to be easily integrated into Laravel applications.

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Middleware](#middleware)
  - [Tests](#tests)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)

## Installation
To install the package via composer, run:

```bash
composer require edenlife/superban
```

## Configuration
After installation, publish the configuration file:

```bash
php artisan vendor:publish --tag=superban-config
```

This will publish a superban.php file in your config directory.


## Usage
### Middleware
Apply the Superban middleware to specific routes using the following syntax:

```php
use EdenLife\Superban\Middleware\SuperbanMiddleware;

Route::middleware([SuperbanMiddleware::class . ':200,2,1440'])->group(function () {
    // Your routes here
});
```

Adjust the parameters 200, 2, 1440 based on your desired rate limiting and banning configuration.

### Tests
To run the package tests, use bash to run:

```bash
./vendor/bin/phpunit
```


## Contributing

Thank you for considering contributing to the Superban package! Feel free to open issues or submit pull requests.

## Security

If you discover any security-related issues, please email[anipreciousebuka@gmail.com](anipreciousebuka@gmail.com).

