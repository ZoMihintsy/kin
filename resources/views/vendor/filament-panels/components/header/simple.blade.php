@props([
    'heading' => null,
    'logo' => true,
    'subheading' => null,
])

<header class="fi-simple-header">
    @if ($logo)
       <a href="/"> <x-filament-panels::logo /></a> 
    @endif

    @if (filled($heading))
        <h1 class="fi-simple-header-heading">
           {{ $heading }}
        </h1>
    @endif

    @if (filled($subheading))
        <p class="fi-simple-header-subheading" style="position:absolute; bottom:0;">
            {{ $subheading }}
        </p>
    @endif
</header>
