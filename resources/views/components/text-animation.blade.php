@props(['animation' => 'typing', 'delay' => '0'])

@php
    $animationClasses = [
        'typing' => 'animate-typing overflow-hidden whitespace-nowrap border-r-4 border-primary-600 dark:border-primary-400 pr-1',
        'scale' => 'animate-scale-up',
        'zoom' => 'animate-zoom-in',
        'fade' => 'animate-fade-in',
        'slide' => 'animate-slide-up'
    ][$animation] ?? '';

    $delayClass = "animation-delay-{$delay}";
@endphp

<div {{ $attributes->merge(['class' => $animationClasses . ' ' . $delayClass]) }}>
    {{ $slot }}
</div>
