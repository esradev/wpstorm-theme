import React from 'react';

const Settings = () => {
    return (
        <div>
            <h2 className="text-sm font-medium text-gray-500">Pinned Projects</h2>
            <ul role="list" className="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                <li className="col-span-1 flex rounded-md shadow-sm">
                    <div
                        className="flex w-16 flex-shrink-0 items-center justify-center bg-pink-600 rounded-l-md text-sm font-medium text-white">
                        GA
                    </div>
                    <div
                        className="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                        <div className="flex-1 truncate px-4 py-2 text-sm">
                            <a href="#" className="font-medium text-gray-900 hover:text-gray-600">Graph API</a>
                            <p className="text-gray-500">16 Members</p>
                        </div>
                        <div className="flex-shrink-0 pr-2">
                            <button type="button"
                                    className="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span className="sr-only">Open options</span>
                                <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
                <li className="col-span-1 flex rounded-md shadow-sm">
                    <div
                        className="flex w-16 flex-shrink-0 items-center justify-center bg-purple-600 rounded-l-md text-sm font-medium text-white">
                        CD
                    </div>
                    <div
                        className="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                        <div className="flex-1 truncate px-4 py-2 text-sm">
                            <a href="#" className="font-medium text-gray-900 hover:text-gray-600">Component Design</a>
                            <p className="text-gray-500">12 Members</p>
                        </div>
                        <div className="flex-shrink-0 pr-2">
                            <button type="button"
                                    className="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span className="sr-only">Open options</span>
                                <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
                <li className="col-span-1 flex rounded-md shadow-sm">
                    <div
                        className="flex w-16 flex-shrink-0 items-center justify-center bg-yellow-500 rounded-l-md text-sm font-medium text-white">
                        T
                    </div>
                    <div
                        className="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                        <div className="flex-1 truncate px-4 py-2 text-sm">
                            <a href="#" className="font-medium text-gray-900 hover:text-gray-600">Templates</a>
                            <p className="text-gray-500">16 Members</p>
                        </div>
                        <div className="flex-shrink-0 pr-2">
                            <button type="button"
                                    className="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span className="sr-only">Open options</span>
                                <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
                <li className="col-span-1 flex rounded-md shadow-sm">
                    <div
                        className="flex w-16 flex-shrink-0 items-center justify-center bg-green-500 rounded-l-md text-sm font-medium text-white">
                        RC
                    </div>
                    <div
                        className="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                        <div className="flex-1 truncate px-4 py-2 text-sm">
                            <a href="#" className="font-medium text-gray-900 hover:text-gray-600">React Components</a>
                            <p className="text-gray-500">8 Members</p>
                        </div>
                        <div className="flex-shrink-0 pr-2">
                            <button type="button"
                                    className="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span className="sr-only">Open options</span>
                                <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>

            <ul role="list" className="grid grid-cols-1 gap-x-6 gap-y-8 my-10 lg:grid-cols-3 xl:gap-x-8">
                <li className="overflow-hidden rounded-xl border border-gray-200">
                    <div className="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                        <img src="https://tailwindui.com/img/logos/48x48/tuple.svg" alt="Tuple"
                             className="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"/>
                        <div className="text-sm font-medium leading-6 text-gray-900">Tuple</div>
                        <div className="relative ml-auto">
                            <button type="button" className="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                    id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                <span className="sr-only">Open options</span>
                                <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                                </svg>
                            </button>
                            <div
                                className="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button"
                                tabIndex="-1">

                                <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900"
                                   role="menuitem"
                                   tabIndex="-1" id="options-menu-0-item-0">View<span
                                    className="sr-only">, Tuple</span></a>
                                <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900"
                                   role="menuitem"
                                   tabIndex="-1" id="options-menu-0-item-1">Edit<span
                                    className="sr-only">, Tuple</span></a>
                            </div>
                        </div>
                    </div>
                    <dl className="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                        <div className="flex justify-between gap-x-4 py-3">
                            <dt className="text-gray-500">Last invoice</dt>
                            <dd className="text-gray-700">
                                <time dateTime="2022-12-13">December 13, 2022</time>
                            </dd>
                        </div>
                        <div className="flex justify-between gap-x-4 py-3">
                            <dt className="text-gray-500">Amount</dt>
                            <dd className="flex items-start gap-x-2">
                                <div className="font-medium text-gray-900">$2,000.00</div>
                                <div
                                    className="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/10">
                                    Overdue
                                </div>
                            </dd>
                        </div>
                    </dl>
                </li>
                <li className="overflow-hidden rounded-xl border border-gray-200">
                    <div className="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                        <img src="https://tailwindui.com/img/logos/48x48/savvycal.svg" alt="SavvyCal"
                             className="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10" />
                            <div className="text-sm font-medium leading-6 text-gray-900">SavvyCal</div>
                            <div className="relative ml-auto">
                                <button type="button" className="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                        id="options-menu-1-button" aria-expanded="false" aria-haspopup="true">
                                    <span className="sr-only">Open options</span>
                                    <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                                    </svg>
                                </button>

                                <div
                                    className="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="options-menu-1-button"
                                    tabIndex="-1">
                                    <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900"
                                       role="menuitem"
                                       tabIndex="-1" id="options-menu-1-item-0">View<span
                                        className="sr-only">, SavvyCal</span></a>
                                    <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900"
                                       role="menuitem"
                                       tabIndex="-1" id="options-menu-1-item-1">Edit<span
                                        className="sr-only">, SavvyCal</span></a>
                                </div>
                            </div>
                    </div>
                    <dl className="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                        <div className="flex justify-between gap-x-4 py-3">
                            <dt className="text-gray-500">Last invoice</dt>
                            <dd className="text-gray-700">
                                <time dateTime="2023-01-22">January 22, 2023</time>
                            </dd>
                        </div>
                        <div className="flex justify-between gap-x-4 py-3">
                            <dt className="text-gray-500">Amount</dt>
                            <dd className="flex items-start gap-x-2">
                                <div className="font-medium text-gray-900">$14,000.00</div>
                                <div
                                    className="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                    Paid
                                </div>
                            </dd>
                        </div>
                    </dl>
                </li>
                <li className="overflow-hidden rounded-xl border border-gray-200">
                    <div className="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                        <img src="https://tailwindui.com/img/logos/48x48/reform.svg" alt="Reform"
                             className="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"/>
                        <div className="text-sm font-medium leading-6 text-gray-900">Reform</div>
                        <div className="relative ml-auto">
                            <button type="button" className="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                    id="options-menu-2-button" aria-expanded="false" aria-haspopup="true">
                                <span className="sr-only">Open options</span>
                                <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                                </svg>
                            </button>
                            <div
                                className="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-2-button"
                                tabIndex="-1">

                                <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900"
                                   role="menuitem"
                                   tabIndex="-1" id="options-menu-2-item-0">View<span
                                    className="sr-only">, Reform</span></a>
                                <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900"
                                   role="menuitem"
                                   tabIndex="-1" id="options-menu-2-item-1">Edit<span
                                    className="sr-only">, Reform</span></a>
                            </div>
                        </div>
                    </div>
                    <dl className="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                        <div className="flex justify-between gap-x-4 py-3">
                            <dt className="text-gray-500">Last invoice</dt>
                            <dd className="text-gray-700">
                                <time dateTime="2023-01-23">January 23, 2023</time>
                            </dd>
                        </div>
                        <div className="flex justify-between gap-x-4 py-3">
                            <dt className="text-gray-500">Amount</dt>
                            <dd className="flex items-start gap-x-2">
                                <div className="font-medium text-gray-900">$7,600.00</div>
                                <div
                                    className="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                    Paid
                                </div>
                            </dd>
                        </div>
                    </dl>
                </li>
            </ul>
            <div>
                <h3 className="text-base font-semibold leading-6 text-gray-900">Last 30 days</h3>
                <dl className="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-x md:divide-y-0">
                    <div className="px-4 py-5 sm:p-6">
                        <dt className="text-base font-normal text-gray-900">Total Subscribers</dt>
                        <dd className="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div className="flex items-baseline text-2xl font-semibold text-indigo-600">
                                71,897
                                <span className="ml-2 text-sm font-medium text-gray-500">from 70,946</span>
                            </div>

                            <div
                                className="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                <svg className="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-green-500"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span className="sr-only"> Increased by </span>
                                12%
                            </div>
                        </dd>
                    </div>
                    <div className="px-4 py-5 sm:p-6">
                        <dt className="text-base font-normal text-gray-900">Avg. Open Rate</dt>
                        <dd className="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div className="flex items-baseline text-2xl font-semibold text-indigo-600">
                                58.16%
                                <span className="ml-2 text-sm font-medium text-gray-500">from 56.14%</span>
                            </div>

                            <div
                                className="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                <svg className="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-green-500"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span className="sr-only"> Increased by </span>
                                2.02%
                            </div>
                        </dd>
                    </div>
                    <div className="px-4 py-5 sm:p-6">
                        <dt className="text-base font-normal text-gray-900">Avg. Click Rate</dt>
                        <dd className="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div className="flex items-baseline text-2xl font-semibold text-indigo-600">
                                24.57%
                                <span className="ml-2 text-sm font-medium text-gray-500">from 28.62%</span>
                            </div>

                            <div
                                className="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                                <svg className="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-red-500"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span className="sr-only"> Decreased by </span>
                                4.05%
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>

        </div>
);
};

export default Settings;