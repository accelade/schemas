# Image Component

The Image component displays images with customizable dimensions, alignment, border radius, and tooltips.

## Basic Usage

```php
use Accelade\Schemas\Components\Image;

Image::make(url: asset('images/photo.jpg'), alt: 'Photo description')
    ->imageWidth('300px')
    ->alignCenter();
```

## Blade Usage

```blade
<x-accelade::image
    url="https://example.com/photo.jpg"
    alt="Photo description"
    width="300px"
    height="200px"
    :rounded="true"
/>
```

## Configuration

### Dimensions

Set custom width and height:

```php
Image::make(url: $url, alt: 'Banner')
    ->imageWidth('100%')
    ->imageHeight('400px');

// Or set both at once
Image::make(url: $url, alt: 'Square')
    ->imageSize('200px');
```

### Alignment

Control horizontal alignment:

```php
Image::make(url: $url, alt: 'Centered')
    ->alignCenter(); // alignStart(), alignCenter(), alignEnd()
```

### Border Radius

Apply rounded corners or circular shape:

```php
// Rounded corners
Image::make(url: $url, alt: 'Rounded')
    ->rounded();

// Circular (great for avatars)
Image::make(url: $url, alt: 'Avatar')
    ->circular()
    ->imageSize('48px');
```

### Tooltip

Add a hover tooltip:

```php
Image::make(url: $user->avatar_url, alt: $user->name)
    ->tooltip($user->name)
    ->circular();
```

## Usage Examples

### Avatar

```php
Image::make(url: $user->avatar_url, alt: $user->name)
    ->imageSize('40px')
    ->circular()
    ->tooltip($user->name);
```

### Hero Banner

```php
Image::make(url: asset('images/hero.jpg'), alt: 'Welcome banner')
    ->imageWidth('100%')
    ->imageHeight('300px')
    ->alignCenter()
    ->rounded();
```

## Available Methods

| Method | Description |
|--------|-------------|
| `url(string)` | Image source URL |
| `alt(string)` | Alt text for accessibility |
| `imageWidth(string)` | CSS width value |
| `imageHeight(string)` | CSS height value |
| `imageSize(string)` | Set both width and height |
| `alignment(string)` | Horizontal alignment |
| `alignStart()` | Align to start |
| `alignCenter()` | Align to center |
| `alignEnd()` | Align to end |
| `rounded(bool)` | Apply rounded corners |
| `circular(bool)` | Make image circular |
| `tooltip(string)` | Hover tooltip text |
