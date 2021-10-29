# Laravel Command Collection
A collection of useful artisan commands.


## How to install
Add this to your composer requirements
```json
{
    "require": {
        ...
        "xpand4b/laravel-command-collection": "@dev"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:xPand4B/Laravel-Command-Collection.git"
        }
    ]
}
```

If you want to publish a script to install sail on a new system typ following
```bash
php artisan vendor:publish --provider="xPand4B\CommandCollection\CommandCollectionServiceProvider" --tag=sail
```