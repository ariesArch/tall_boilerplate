<!-- sidenav  -->
@if (Request::is('virtual-reality'))
<aside class="fixed inset-y-0 xl:animate-fade-up z-990 xl:scale-60 xl:left-[18%] flex-wrap items-center justify-between block w-full p-0 my-4 xl:ml-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-none max-w-62.5 ease-nav-brand rounded-2xl xl:translate-x-0">
    @else
    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 block w-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 
{{ (Request::is('rtl') ? 'xl:right-0 mr-4 translate-x-full' : 'xl:left-0 ml-4 -translate-x-full ') }} xl:translate-x-0 xl:bg-transparent
">
        @endif
        <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-size-sm whitespace-nowrap text-slate-700" href="{{ url('') }}" target="_blank">
                <img src="{{asset('/assets/img/logo-ct.png')}}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
                <span class="{{ (Request::is('rtl') ? 'mr-1' : 'ml-1') }} font-semibold transition-all duration-200 ease-nav-brand">
                    ArtScape Gallary
                </span>
            </a>
        </div>
        <hr class="h-px mt-0 bg-transparent {{ (Request::is('virtual-reality') ? 'bg-gradient-horizontal-dark' : 'via-black/40 bg-gradient-to-r from-transparent to-transparent') }} " />
        <div class="items-center block w-auto max-h-screen h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                        {{ (Request::is('dashboard') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' :  'text-slate-900 font-extrabold') }}" href="{{ url('dashboard') }}">
                        <div class="{{ (Request::is('dashboard') ? ' bg-gradient-fuchsia' : '') }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="{{ (Request::is('dashboard') ? '' : 'fill-slate-800') }} " d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="{{ (Request::is('dashboard') ? '' : 'fill-slate-800') }}" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="{{ (Request::is('rtl') ? 'mr-1' : 'ml-1') }} duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>
                <li class="w-full mt-4">
                    <h6 class="{{ (Request::is('rtl') ? 'pr-6 mr-2' : 'pl-6 ml-2') }} font-bold leading-tight uppercase text-size-xs opacity-60">
                        Admin Roles and Permissions
                    </h6>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                        {{ (Request::is('roles') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' :  'text-slate-900 font-extrabold') }}" href="{{ url('roles') }}">
                        <div class="{{ (Request::is('roles') ? ' bg-gradient-fuchsia' : '') }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Role</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                                <path class="{{ (Request::is('roles') ? '' : 'fill-slate-800') }}" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" id="Path" opacity="0.59858631"></path>
                                                <path class="{{ (Request::is('roles') ? '' : 'fill-slate-800') }}" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z" id="Path"></path>
                                                <path class="{{ (Request::is('roles') ? '' : 'fill-slate-800') }}" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z" id="Path"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="{{ (Request::is('rtl') ? 'mr-1' : 'ml-1') }} duration-300 opacity-100 pointer-events-none ease-soft">Role
                        </span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                        {{ (Request::is('permissions') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' :  'text-slate-900 font-extrabold') }}" href="{{ url('permissions') }}">
                        <div class="{{ (Request::is('permissions') ? ' bg-gradient-fuchsia' : '') }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Permissions</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                                <path class="{{ (Request::is('permissions') ? '' : 'fill-slate-800') }}" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" id="Path" opacity="0.59858631"></path>
                                                <path class="{{ (Request::is('permissions') ? '' : 'fill-slate-800') }}" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z" id="Path"></path>
                                                <path class="{{ (Request::is('permissions') ? '' : 'fill-slate-800') }}" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z" id="Path"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="{{ (Request::is('rtl') ? 'mr-1' : 'ml-1') }} duration-300 opacity-100 pointer-events-none ease-soft">Permissions
                        </span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ (Request::is('admins') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' :  'text-slate-900 font-extrabold') }}" href="{{ url('admins') }}">
                        <div class="{{ (Request::is('admins') ? ' bg-gradient-fuchsia' : '') }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>User Profile</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                                <path class="{{ (Request::is('admins') ? '' : 'fill-slate-800') }}" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" id="Path" opacity="0.59858631"></path>
                                                <path class="{{ (Request::is('admins') ? '' : 'fill-slate-800') }}" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z" id="Path"></path>
                                                <path class="{{ (Request::is('admins') ? '' : 'fill-slate-800') }}" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z" id="Path"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="{{ (Request::is('rtl') ? 'mr-1' : 'ml-1') }} duration-300 opacity-100 pointer-events-none ease-soft">Admins
                        </span>
                    </a>
                </li>
                @can('access-user')
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ (Request::is('users') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : 'text-slate-900 font-extrabold') }}" href="{{ url('users') }}">
                        <div class="{{ (Request::is('users') ? ' bg-gradient-fuchsia' : '') }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">

                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z" />
                            </svg>
                        </div>
                        <span class="{{ (Request::is('rtl') ? 'mr-1' : 'ml-1') }} duration-300 opacity-100 pointer-events-none ease-soft">
                            User Management
                        </span>
                    </a>
                </li>
                @endcan
                <li class="w-full mt-4">
                    <h6 class="{{ (Request::is('rtl') ? 'pr-6 mr-2' : 'pl-6 ml-2') }} font-bold leading-tight uppercase text-size-xs opacity-60">
                        Example Blog
                    </h6>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                        {{ (Request::is('blogs') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' :  'text-slate-900 font-extrabold') }}" href="{{ url('blogs') }}">
                        <div class="{{ (Request::is('blogs') ? ' bg-gradient-fuchsia' : '') }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M139.61 35.5a12 12 0 0 0-17 0L58.93 98.81l-22.7-22.12a12 12 0 0 0-17 0L3.53 92.41a12 12 0 0 0 0 17l47.59 47.4a12.78 12.78 0 0 0 17.61 0l15.59-15.62L156.52 69a12.09 12.09 0 0 0 .09-17zm0 159.19a12 12 0 0 0-17 0l-63.68 63.72-22.7-22.1a12 12 0 0 0-17 0L3.53 252a12 12 0 0 0 0 17L51 316.5a12.77 12.77 0 0 0 17.6 0l15.7-15.69 72.2-72.22a12 12 0 0 0 .09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 0 0 0-96zm432 16H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" />
                            </svg>

                        </div>
                        <span class="{{ (Request::is('blogs') ? 'mr-1' : 'ml-1') }} duration-300 opacity-100 pointer-events-none ease-soft">Blogs</span>
                    </a>
                </li>
        </div>
    </aside>
    <!-- end sidenav -->