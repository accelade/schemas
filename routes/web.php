<?php

use Illuminate\Support\Facades\Route;

Route::middleware(config('schemas.middleware', ['web']))
    ->prefix(config('schemas.prefix', 'schemas'))
    ->group(function () {
        // Asset routes (when asset_mode is 'route')
        if (config('schemas.asset_mode', 'route') === 'route') {
            Route::get('/js/schemas.js', function () {
                $path = __DIR__.'/../dist/schemas.js';
                if (! file_exists($path)) {
                    abort(404, 'Schemas JS not found. Run: npm run build');
                }

                $etag = md5_file($path);

                return response()->file($path, [
                    'Content-Type' => 'application/javascript',
                    'Cache-Control' => 'public, max-age=3600',
                    'ETag' => $etag,
                ]);
            })->name('schemas.js');

            Route::get('/js/schemas.esm.js', function () {
                $path = __DIR__.'/../dist/schemas.esm.js';
                if (! file_exists($path)) {
                    abort(404, 'Schemas ESM JS not found. Run: npm run build');
                }

                return response()->file($path, [
                    'Content-Type' => 'application/javascript',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            })->name('schemas.esm.js');
        }
    });

// Demo routes
if (config('schemas.demo.enabled', false)) {
    Route::middleware(config('schemas.demo.middleware', ['web']))
        ->prefix(config('schemas.demo.prefix', 'schemas-demo'))
        ->group(function () {
            Route::get('/', function () {
                return view('schemas::demo.index');
            })->name('schemas.demo');
        });
}
