<x-pages.list-container name_prop="user">
    <div class="flex flex-wrap p-3 mb-0 bg-white border-b-1 border-b-solid rounded-t-2xl border-b-transparent">
        <!-- <x-atoms.input wire:model.debounce.300ms="search" class="w-1/2" /> -->
        <x-atoms.input wire:model.live.debounce.250ms="search" placeholder="Search Name" class="w-1/2" />
    </div>
    <x-templates.table-wrapper>
        <x-slot name="table_head">
            <x-atoms.th field="id" sortBy=$sortBy>
                ID
                @include('components.atoms.th-sort', ['field' => 'id'])
            </x-atoms.th>
            <x-atoms.th>
                Name
                @include('components.atoms.th-sort', ['field' => 'name'])
            </x-atoms.th>
            <x-atoms.th>
                Email
                @include('components.atoms.th-sort', ['field' => 'email'])
            </x-atoms.th>
            <x-atoms.th>Creation Date</x-atoms.th>
            <x-atoms.th>Action {{$sortBy}}</x-atoms.th>
        </x-slot>
        <x-slot name="table_body">
            @foreach ($users as $user)
            <tr>
                <x-atoms.td>{{$user->id}}</x-atoms.td>
                <x-atoms.td>{{$user->name}}</x-atoms.td>
                <x-atoms.td>{{$user->email}}</x-atoms.td>
                <x-atoms.td>{{$user->created_at}}</x-atoms.td>
                <x-atoms.td-action name="users" :slug="$user->id" />
            </tr>
            @endforeach
        </x-slot>
    </x-templates.table-wrapper>
    <div class="m-3">
        {{ $users->links() }}
    </div>
</x-pages.list-container>