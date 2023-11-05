@props(['name','slug'])
<td class="p-4 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
    <p class="mb-0 font-semibold leading-tight text-base">
        <a href="{{ route($name.'.edit', $slug) }}"><i class="fas fa-edit" aria-hidden="true"></i></a>
        <a href="#" wire:click.prevent="$emit('triggerDelete', '{{ $slug }}')"><i class="cursor-pointer fas fa-trash" aria-hidden="true"></i></a>
    </p>
</td>