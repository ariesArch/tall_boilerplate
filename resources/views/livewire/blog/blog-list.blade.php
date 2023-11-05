<x-pages.list-container name_prop="blog">
    <x-slot name="filter_slot">
        <x-atoms.input wire:model.live.debounce.250ms="search" placeholder="Search Name" class="mr-2" />
        <x-molecules.filter-area>
            <x-atoms.filter-item>
                <x-atoms.select wireModel="{{$blog_category_filter}}" :blog_categories="$blog_categories" />
            </x-atoms.filter-item>
        </x-molecules.filter-area>
    </x-slot>
    <x-slot name="advance_filter_slot">
        <select wire:model.live="blog_category_filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-1/4 mr-2">
            <option selected value="">All Artists</option>
            @foreach ($blog_categories as $category)
            <option value="{{$category}}">{{$category->name}}</option>
            @endforeach
        </select>
        <select wire:model.live="tag_filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-1/4 mr-2">
            <option selected value="">All Artists</option>
            @foreach ($tags as $tag)
            <option value="{{$tag}}">{{$tag->name}}</option>
            @endforeach
        </select>
        @if ($blog_category_filter)
        <x-atoms.filter-chip>{{json_decode($blog_category_filter)->name}}</x-atoms.filter-chip>
        @endif
        @if ($tag_filter)
        <x-atoms.filter-chip>{{json_decode($tag_filter)->name}}</x-atoms.filter-chip>
        @endif
    </x-slot>
    <x-templates.table-wrapper>
        <x-slot name="table_head">
            <x-atoms.th field="id" sortBy=$sortBy>
                ID
                @include('components.atoms.th-sort', ['field' => 'id'])
            </x-atoms.th>
            <x-atoms.th>
                Title
                @include('components.atoms.th-sort', ['field' => 'name'])
            </x-atoms.th>
            <x-atoms.th>
                Category
                @include('components.atoms.th-sort', ['field' => 'email'])
            </x-atoms.th>
            <x-atoms.th>Creation Date</x-atoms.th>
            <x-atoms.th>Action {{$sortBy}}</x-atoms.th>
        </x-slot>
        <x-slot name="table_body">
            @foreach ($blogs as $blog)
            <tr>
                <x-atoms.td>{{$blog->id}}</x-atoms.td>
                <x-atoms.td>{{$blog->title}}</x-atoms.td>
                <x-atoms.td>{{$blog->category->name}}</x-atoms.td>
                <x-atoms.td>{{$blog->created_at}}</x-atoms.td>
                <x-atoms.td-action name="blogs" :slug="$blog->id" />
            </tr>
            @endforeach
        </x-slot>
    </x-templates.table-wrapper>
    <div class="m-3">
        {{ $blogs->links() }}
    </div>
</x-pages.list-container>