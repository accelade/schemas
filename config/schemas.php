<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enable/Disable Schemas
    |--------------------------------------------------------------------------
    |
    | Enable or disable the schemas package.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Asset Serving Mode
    |--------------------------------------------------------------------------
    |
    | Determines how Schemas serves its JavaScript assets.
    | 'route' - Serve via Laravel route (default, no publishing needed)
    | 'published' - Serve from published assets in public/vendor/schemas
    |
    */
    'asset_mode' => env('SCHEMAS_ASSET_MODE', 'route'),

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | The URL prefix for Schemas routes.
    |
    */
    'prefix' => 'schemas',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Middleware to apply to Schemas routes.
    |
    */
    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Default Columns
    |--------------------------------------------------------------------------
    |
    | Default number of columns for grid layouts.
    |
    */
    'default_columns' => 1,

    /*
    |--------------------------------------------------------------------------
    | Default Gap
    |--------------------------------------------------------------------------
    |
    | Default gap between grid items (Tailwind spacing scale).
    |
    */
    'default_gap' => '4',

    /*
    |--------------------------------------------------------------------------
    | Demo Routes
    |--------------------------------------------------------------------------
    |
    | Enable demo routes for testing schemas.
    |
    */
    'demo' => [
        'enabled' => env('SCHEMAS_DEMO_ENABLED', env('APP_ENV') !== 'production'),
        'prefix' => 'schemas-demo',
        'middleware' => ['web'],
    ],
];
