@php
    $assetMode = config('schemas.asset_mode', 'route');

    if ($assetMode === 'published') {
        $scriptUrl = asset('vendor/schemas/schemas.js');
    } else {
        $scriptUrl = route('schemas.js');
    }

    // Add cache buster based on file modification time
    $distPath = __DIR__ . '/../../../dist/schemas.js';
    if (file_exists($distPath)) {
        $scriptUrl .= '?v=' . filemtime($distPath);
    }
@endphp

{{-- Schemas JavaScript - Optional enhancement for standalone usage --}}
{{-- Most functionality comes from Accelade's reactivity system --}}
<script src="{{ $scriptUrl }}" defer></script>
