<li class="relative flex items-center {{ (Request::is('rtl') ? 'pl-2' : 'pr-2') }}">
    <p class="hidden transform-dropdown-show"></p>
    <a href="javascript:;" class="block p-0 transition-all text-size-sm ease-nav-brand text-slate-500" dropdown-trigger aria-expanded="false">
        <i class="cursor-pointer fa fa-filter fa-2xl"></i>
    </a>
    @if (Request::is('rtl'))
    <ul dropdown-menu class="text-size-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-72 before:text-5.5 pointer-events-none absolute left-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-auto before:top-0 before:left-2 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 before:sm:left-3 lg:absolute lg:mt-2 lg:block lg:cursor-pointer">
        @else
        <ul dropdown-menu class="text-size-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-72 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
            @endif
            <!-- add show class on dropdown open js -->
            {{$slot}}
        </ul>
</li>