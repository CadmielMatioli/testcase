@props([
    'user' => null,
    'href' => null,
])

<button
    type="button"
    data-url="{{$href}}"
    data-user="{{$user}}"
    class="inline-flex text-white items-center px-4 py-2 mx-1 bg-red-600 text-xs border border-transparent rounded-md font-semibold tracking-widest delete"
>
    <i class="far fa-trash-alt mx-1"></i>
    Deletar
</button>
