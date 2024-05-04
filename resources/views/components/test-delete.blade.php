@props([
    'href' => null,
])

<delete-button url="{{ $href }}"  csrf-token="{{ csrf_token() }}"> </delete-button>
