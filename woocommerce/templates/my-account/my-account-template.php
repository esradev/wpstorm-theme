<?php
get_header();
?>
    <div class="flex grow flex-col-2">
        <div class="flex grow gap-y-5 overflow-y-hidden px-6 py-6 bg-white my-3">
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li>
                                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
                                <a href="#"
                                   class="bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="h-6 w-6 shrink-0 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                    </svg>
                                    Dashboard
                                    <span class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-600 ring-1 ring-inset ring-gray-200"
                                          aria-hidden="true">5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                    </svg>
                                    Team
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/>
                                    </svg>
                                    Projects
                                    <span class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-600 ring-1 ring-inset ring-gray-200"
                                          aria-hidden="true">12</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                    </svg>
                                    Calendar
                                    <span class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-600 ring-1 ring-inset ring-gray-200"
                                          aria-hidden="true">20+</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"/>
                                    </svg>
                                    Documents
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"/>
                                    </svg>
                                    Reports
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                        <ul role="list" class="-mx-2 mt-2 space-y-1">
                            <li>
                                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600">H</span>
                                    <span class="truncate">Heroicons</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600">T</span>
                                    <span class="truncate">Tailwind Labs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600">W</span>
                                    <span class="truncate">Workcation</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="-mx-6 mt-auto">
                        <a href="#"
                           class="flex items-center gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-50">
                            <img class="h-8 w-8 rounded-full bg-gray-50"
                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                            <span class="sr-only">Your profile</span>
                            <span aria-hidden="true">Tom Cook</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="flex grow px-6 py-6 my-3">
            <div>
                <h2 class="text-sm font-medium text-gray-500">Pinned Projects</h2>
                <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                    <li class="col-span-1 flex rounded-md shadow-sm">
                        <div class="flex w-16 flex-shrink-0 items-center justify-center bg-pink-600 rounded-l-md text-sm font-medium text-white">
                            GA
                        </div>
                        <div class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                            <div class="flex-1 truncate px-4 py-2 text-sm">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-600">Graph API</a>
                                <p class="text-gray-500">16 Members</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button type="button"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="col-span-1 flex rounded-md shadow-sm">
                        <div class="flex w-16 flex-shrink-0 items-center justify-center bg-purple-600 rounded-l-md text-sm font-medium text-white">
                            CD
                        </div>
                        <div class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                            <div class="flex-1 truncate px-4 py-2 text-sm">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-600">Component Design</a>
                                <p class="text-gray-500">12 Members</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button type="button"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="col-span-1 flex rounded-md shadow-sm">
                        <div class="flex w-16 flex-shrink-0 items-center justify-center bg-yellow-500 rounded-l-md text-sm font-medium text-white">
                            T
                        </div>
                        <div class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                            <div class="flex-1 truncate px-4 py-2 text-sm">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-600">Templates</a>
                                <p class="text-gray-500">16 Members</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button type="button"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="col-span-1 flex rounded-md shadow-sm">
                        <div class="flex w-16 flex-shrink-0 items-center justify-center bg-green-500 rounded-l-md text-sm font-medium text-white">
                            RC
                        </div>
                        <div class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                            <div class="flex-1 truncate px-4 py-2 text-sm">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-600">React Components</a>
                                <p class="text-gray-500">8 Members</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button type="button"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul role="list" class="grid grid-cols-1 gap-x-6 gap-y-8 my-10 lg:grid-cols-3 xl:gap-x-8">
                    <li class="overflow-hidden rounded-xl border border-gray-200">
                        <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                            <img src="https://tailwindui.com/img/logos/48x48/tuple.svg" alt="Tuple"
                                 class="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
                            <div class="text-sm font-medium leading-6 text-gray-900">Tuple</div>
                            <div class="relative ml-auto">
                                <button type="button" class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                        id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                                    </svg>
                                </button>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                     role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button"
                                     tabindex="-1">
                                    <!-- Active: "bg-gray-50", Not Active: "" -->
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                       tabindex="-1" id="options-menu-0-item-0">View<span class="sr-only">, Tuple</span></a>
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                       tabindex="-1" id="options-menu-0-item-1">Edit<span class="sr-only">, Tuple</span></a>
                                </div>
                            </div>
                        </div>
                        <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500">Last invoice</dt>
                                <dd class="text-gray-700">
                                    <time datetime="2022-12-13">December 13, 2022</time>
                                </dd>
                            </div>
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500">Amount</dt>
                                <dd class="flex items-start gap-x-2">
                                    <div class="font-medium text-gray-900">$2,000.00</div>
                                    <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/10">
                                        Overdue
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </li>
                    <li class="overflow-hidden rounded-xl border border-gray-200">
                        <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                            <img src="https://tailwindui.com/img/logos/48x48/savvycal.svg" alt="SavvyCal"
                                 class="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
                            <div class="text-sm font-medium leading-6 text-gray-900">SavvyCal</div>
                            <div class="relative ml-auto">
                                <button type="button" class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                        id="options-menu-1-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                                    </svg>
                                </button>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                     role="menu" aria-orientation="vertical" aria-labelledby="options-menu-1-button"
                                     tabindex="-1">
                                    <!-- Active: "bg-gray-50", Not Active: "" -->
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                       tabindex="-1" id="options-menu-1-item-0">View<span
                                                class="sr-only">, SavvyCal</span></a>
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                       tabindex="-1" id="options-menu-1-item-1">Edit<span
                                                class="sr-only">, SavvyCal</span></a>
                                </div>
                            </div>
                        </div>
                        <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500">Last invoice</dt>
                                <dd class="text-gray-700">
                                    <time datetime="2023-01-22">January 22, 2023</time>
                                </dd>
                            </div>
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500">Amount</dt>
                                <dd class="flex items-start gap-x-2">
                                    <div class="font-medium text-gray-900">$14,000.00</div>
                                    <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                        Paid
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </li>
                    <li class="overflow-hidden rounded-xl border border-gray-200">
                        <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                            <img src="https://tailwindui.com/img/logos/48x48/reform.svg" alt="Reform"
                                 class="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
                            <div class="text-sm font-medium leading-6 text-gray-900">Reform</div>
                            <div class="relative ml-auto">
                                <button type="button" class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                        id="options-menu-2-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                                    </svg>
                                </button>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                     role="menu" aria-orientation="vertical" aria-labelledby="options-menu-2-button"
                                     tabindex="-1">
                                    <!-- Active: "bg-gray-50", Not Active: "" -->
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                       tabindex="-1" id="options-menu-2-item-0">View<span
                                                class="sr-only">, Reform</span></a>
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                       tabindex="-1" id="options-menu-2-item-1">Edit<span
                                                class="sr-only">, Reform</span></a>
                                </div>
                            </div>
                        </div>
                        <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500">Last invoice</dt>
                                <dd class="text-gray-700">
                                    <time datetime="2023-01-23">January 23, 2023</time>
                                </dd>
                            </div>
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500">Amount</dt>
                                <dd class="flex items-start gap-x-2">
                                    <div class="font-medium text-gray-900">$7,600.00</div>
                                    <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                        Paid
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </li>
                </ul>
                <div>
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Last 30 days</h3>
                    <dl class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-x md:divide-y-0">
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-base font-normal text-gray-900">Total Subscribers</dt>
                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                    71,897
                                    <span class="ml-2 text-sm font-medium text-gray-500">from 70,946</span>
                                </div>

                                <div class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                    <svg class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only"> Increased by </span>
                                    12%
                                </div>
                            </dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-base font-normal text-gray-900">Avg. Open Rate</dt>
                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                    58.16%
                                    <span class="ml-2 text-sm font-medium text-gray-500">from 56.14%</span>
                                </div>

                                <div class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                    <svg class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only"> Increased by </span>
                                    2.02%
                                </div>
                            </dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-base font-normal text-gray-900">Avg. Click Rate</dt>
                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                    24.57%
                                    <span class="ml-2 text-sm font-medium text-gray-500">from 28.62%</span>
                                </div>

                                <div class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                                    <svg class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only"> Decreased by </span>
                                    4.05%
                                </div>
                            </dd>
                        </div>
                    </dl>
                </div>

            </div>
        </div>
    </div>
<?php
get_footer();
?>