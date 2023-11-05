@props(['field'])
@if(in_array($field, $sortable))
@if($sortBy !== $field)
<i wire:click="sortHeader('{{ $field }}')" class="fa fa-fw fa-sort cursor-pointer" aria-hidden="true"></i>
@elseif($sortBy === $field && $sortDirection == 'desc')
<i wire:click="sortHeader('{{ $field }}')" class="fa fa-fw fa-sort-down cursor-pointer text-blue-500" aria-hidden="true"></i>
@else
<i wire:click="sortHeader('{{ $field }}')" class="fa fa-fw fa-sort-up cursor-pointer text-blue-500" aria-hidden="true"></i>
@endif
@endif