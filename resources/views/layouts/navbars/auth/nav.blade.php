<!-- Navbar -->
<nav class="relative flex flex-wrap items-center justify-between px-0 py-0 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-0 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg">
                <li class="{{ (Request::is('rtl') ? 'pl-2' : '') }} leading-normal text-size-sm">
                    <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                </li>
                <li class="text-size-sm pl-2 capitalize leading-normal text-slate-700 {{ (Request::is('rtl') ? 'before:float-right before:pl-2' : 'before:float-left before:pr-2') }} before:text-gray-600 before:content-['/']" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <!-- <h6 class="mb-0 font-bold capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6> -->
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 {{ (Request::is('rtl') ? '' : 'sm:mr-6') }}md:mr-0 lg:flex lg:basis-auto">

            <div class="flex items-center md:ml-auto md:pr-4">
                <!-- pro btn  -->
            </div>
        </div>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full {{ (Request::is('rtl') ? 'pr-10 ml-0 mr-auto' : '') }}">

            <!-- online builder btn  -->
            {{-- <li class="flex items-center">
          <a class="inline-block px-8 py-2 mb-0 {{ (Request::is('rtl') ? 'ml-4' : 'mr-4') }} font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in text-size-xs hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent"
            target="_blank"
            href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online
            Builder</a>
            </li> --}}
            <li class="flex items-center">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
            <li class="flex items-center {{ (Request::is('rtl') ? 'pr-4' : 'pl-4') }} xl:hidden">
                <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-size-sm text-slate-500" sidenav-trigger>
                    <div class="w-4.5 overflow-hidden">
                        <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                        <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                        <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    </div>
                </a>
            </li>
            <li class="flex items-center px-4">
                <a href="javascript:;" class="p-0 transition-all text-size-sm ease-nav-brand text-slate-500">
                    <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                    <!-- fixed-plugin-button-nav  -->
                </a>
            </li>

            <!-- notifications -->

            <li class="relative flex items-center {{ (Request::is('rtl') ? 'pl-2' : 'pr-2') }}">
                <p class="hidden transform-dropdown-show"></p>
                <a href="javascript:;" class="block p-0 transition-all text-size-sm ease-nav-brand text-slate-500" dropdown-trigger aria-expanded="false">
                    <i class="cursor-pointer fa fa-bell"></i>
                </a>

                @if (Request::is('rtl'))
                <ul dropdown-menu class="text-size-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:text-5.5 pointer-events-none absolute left-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-auto before:top-0 before:left-2 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 before:sm:left-3 lg:absolute lg:mt-2 lg:block lg:cursor-pointer">
                    @else
                    <ul dropdown-menu class="text-size-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        @endif
                        <!-- add show class on dropdown open js -->
                        <li class="relative mb-2">
                            <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img src="{{asset('/assets/img/team-2.jpg')}}" class="inline-flex items-center justify-center {{ (Request::is('rtl') ? 'ml-4' : 'mr-4') }} text-white text-size-sm h-9 w-9 max-w-none rounded-xl" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 font-normal leading-normal text-size-sm"><span class="font-semibold">New
                                                message</span> from Laur</h6>
                                        <p class="mb-0 {{ (Request::is('rtl') ? 'ml-auto' : '') }} leading-tight text-size-xs text-slate-400">
                                            <i class="{{ (Request::is('rtl') ? 'ml-1' : 'mr-1') }} fa fa-clock"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative mb-2">
                            <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center {{ (Request::is('rtl') ? 'ml-4' : 'mr-4') }} text-white text-size-sm bg-gradient-dark-gray h-9 w-9 max-w-none rounded-xl" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 font-normal leading-normal text-size-sm"><span class="font-semibold">New
                                                album</span> by Travis Scott</h6>
                                        <p class="mb-0 {{ (Request::is('rtl') ? 'ml-auto' : '') }} leading-tight text-size-xs text-slate-400">
                                            <i class="{{ (Request::is('rtl') ? 'ml-1' : 'mr-1') }} fa fa-clock"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative">
                            <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                                <div class="flex py-1">
                                    <div class="inline-flex items-center justify-center my-auto {{ (Request::is('rtl') ? 'ml-4' : 'mr-4') }} text-white transition-all duration-200 ease-nav-brand text-size-sm bg-gradient-slate h-9 w-9 rounded-xl">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 font-normal leading-normal text-size-sm">Payment successfully completed</h6>
                                        <p class="mb-0 {{ (Request::is('rtl') ? 'ml-auto' : '') }} leading-tight text-size-xs text-slate-400">
                                            <i class="{{ (Request::is('rtl') ? 'ml-1' : 'mr-1') }} fa fa-clock"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </li>
        </ul>
    </div>
    </div>
</nav>

<!-- end Navbar -->