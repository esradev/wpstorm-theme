<?php
get_header();
?>

    <main class="mx-auto max-w-7xl sm:px-6 sm:pt-16 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <!-- Product -->
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                <!-- Image gallery -->
                <div class="flex flex-col-reverse">
                    <!-- Image selector -->
                    <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                        <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                            <button id="tabs-2-tab-1"
                                    class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4"
                                    aria-controls="tabs-2-panel-1" role="tab" type="button">
                                <span class="sr-only">Angled view</span>
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg" alt=""
                       class="h-full w-full object-cover object-center">
                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2"
                                      aria-hidden="true"></span>
                            </button>

                            <!-- More images... -->
                        </div>
                    </div>

                    <div class="aspect-h-1 aspect-w-1 w-full">
                        <!-- Tab panel, show/hide based on tab state. -->
                        <div id="tabs-2-panel-1" aria-labelledby="tabs-2-tab-1" role="tabpanel" tabindex="0">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg"
                                 alt="Angled front view with bag zipped and handles upright."
                                 class="h-full w-full object-cover object-center sm:rounded-lg">
                        </div>

                        <!-- More images... -->
                    </div>
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">

                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol role="list" class="flex space-x-4 rounded-md bg-white px-6 shadow">
                            <li class="flex">
                                <div class="flex items-center">
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Home</span>
                                    </a>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex items-center">
                                    <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
                                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                    </svg>
                                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Projects</a>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex items-center">
                                    <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
                                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                    </svg>
                                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Project Nero</a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Zip Tote Basket</h1>

                    <div class="mt-3">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl tracking-tight text-gray-900">$140</p>
                    </div>

                    <!-- Reviews -->
                    <div class="mt-3">
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <!-- Active: "text-indigo-500", Inactive: "text-gray-300" -->
                                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="sr-only">4 out of 5 stars</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6 text-base text-gray-700">
                            <p>The Zip Tote Basket is the perfect midpoint between shopping tote and comfy backpack.
                                With convertible straps, you can hand carry, should sling, or backpack this convenient
                                and spacious bag. The zip top and durable canvas construction keeps your goods protected
                                for all-day use.</p>
                        </div>
                    </div>

                    <form class="mt-6">
                        <!-- Colors -->
                        <div>
                            <h3 class="text-sm text-gray-600">Color</h3>

                            <fieldset class="mt-2">
                                <legend class="sr-only">Choose a color</legend>
                                <div class="flex items-center space-x-3">
                                    <!--
                                      Active and Checked: "ring ring-offset-1"
                                      Not Active and Checked: "ring-2"
                                    -->
                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-700">
                                        <input type="radio" name="color-choice" value="Washed Black" class="sr-only"
                                               aria-labelledby="color-choice-0-label">
                                        <span id="color-choice-0-label" class="sr-only">Washed Black</span>
                                        <span aria-hidden="true"
                                              class="h-8 w-8 bg-gray-700 rounded-full border border-black border-opacity-10"></span>
                                    </label>
                                    <!--
                                      Active and Checked: "ring ring-offset-1"
                                      Not Active and Checked: "ring-2"
                                    -->
                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                        <input type="radio" name="color-choice" value="White" class="sr-only"
                                               aria-labelledby="color-choice-1-label">
                                        <span id="color-choice-1-label" class="sr-only">White</span>
                                        <span aria-hidden="true"
                                              class="h-8 w-8 bg-white rounded-full border border-black border-opacity-10"></span>
                                    </label>
                                    <!--
                                      Active and Checked: "ring ring-offset-1"
                                      Not Active and Checked: "ring-2"
                                    -->
                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-500">
                                        <input type="radio" name="color-choice" value="Washed Gray" class="sr-only"
                                               aria-labelledby="color-choice-2-label">
                                        <span id="color-choice-2-label" class="sr-only">Washed Gray</span>
                                        <span aria-hidden="true"
                                              class="h-8 w-8 bg-gray-500 rounded-full border border-black border-opacity-10"></span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="mt-10 flex">
                            <button type="submit"
                                    class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">
                                Add to bag
                            </button>

                            <button type="button"
                                    class="ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                                <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                </svg>
                                <span class="sr-only">Add to favorites</span>
                            </button>
                        </div>
                    </form>

                    <section aria-labelledby="details-heading" class="mt-12">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>

                        <div class="divide-y divide-gray-200 border-t">
                            <div>
                                <h3>
                                    <!-- Expand/collapse question button -->
                                    <button type="button"
                                            class="group relative flex w-full items-center justify-between py-6 text-left"
                                            aria-controls="disclosure-1" aria-expanded="false">
                                        <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                                        <span class="text-gray-900 text-sm font-medium">Features</span>
                                        <span class="ml-6 flex items-center">
                      <!-- Open: "hidden", Closed: "block" -->
                      <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24"
                           stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                      </svg>
                                            <!-- Open: "block", Closed: "hidden" -->
                      <svg class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500" fill="none"
                           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"/>
                      </svg>
                    </span>
                                    </button>
                                </h3>
                                <div class="prose prose-sm pb-6" id="disclosure-1">
                                    <ul role="list">
                                        <li>Multiple strap configurations</li>
                                        <li>Spacious interior with top zip</li>
                                        <li>Leather handle and tabs</li>
                                        <li>Interior dividers</li>
                                        <li>Stainless strap loops</li>
                                        <li>Double stitched construction</li>
                                        <li>Water-resistant</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- More sections... -->
                        </div>
                        <div class="divide-y divide-gray-200 border-t">
                            <div>
                                <h3>
                                    <!-- Expand/collapse question button -->
                                    <button type="button"
                                            class="group relative flex w-full items-center justify-between py-6 text-left"
                                            aria-controls="disclosure-1" aria-expanded="false">
                                        <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                                        <span class="text-gray-900 text-sm font-medium">Features</span>
                                        <span class="ml-6 flex items-center">
                      <!-- Open: "hidden", Closed: "block" -->
                      <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24"
                           stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                      </svg>
                                            <!-- Open: "block", Closed: "hidden" -->
                      <svg class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500" fill="none"
                           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"/>
                      </svg>
                    </span>
                                    </button>
                                </h3>
                                <div class="prose prose-sm pb-6" id="disclosure-1">
                                    <ul role="list">
                                        <li>Multiple strap configurations</li>
                                        <li>Spacious interior with top zip</li>
                                        <li>Leather handle and tabs</li>
                                        <li>Interior dividers</li>
                                        <li>Stainless strap loops</li>
                                        <li>Double stitched construction</li>
                                        <li>Water-resistant</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- More sections... -->
                        </div>
                    </section>
                </div>
            </div>

            <div class="lg:grid lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
                <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:mt-0 lg:max-w-none">
                    <div>
                        <div class="border-b border-gray-200">
                            <div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
                                <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800" -->
                                <button id="tab-reviews"
                                        class="border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800 whitespace-nowrap border-b-2 py-6 text-sm font-medium"
                                        aria-controls="tab-panel-reviews" role="tab" type="button">Customer Reviews
                                </button>
                                <button id="tab-faq"
                                        class="border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800 whitespace-nowrap border-b-2 py-6 text-sm font-medium"
                                        aria-controls="tab-panel-faq" role="tab" type="button">FAQ
                                </button>
                                <button id="tab-license"
                                        class="border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800 whitespace-nowrap border-b-2 py-6 text-sm font-medium"
                                        aria-controls="tab-panel-license" role="tab" type="button">License
                                </button>
                            </div>
                        </div>

                        <!-- 'Customer Reviews' panel, show/hide based on tab state -->
                        <div id="tab-panel-reviews" class="-mb-10" aria-labelledby="tab-reviews" role="tabpanel"
                             tabindex="0">
                            <h3 class="sr-only">Customer Reviews</h3>

                            <div class="flex space-x-4 text-sm text-gray-500">
                                <div class="flex-none py-10">
                                    <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                         alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                </div>
                                <div class="flex-1 py-10">
                                    <h3 class="font-medium text-gray-900">Emily Selman</h3>
                                    <p>
                                        <time datetime="2021-07-16">July 16, 2021</time>
                                    </p>

                                    <div class="mt-4 flex items-center">
                                        <!-- Active: "text-yellow-400", Default: "text-gray-300" -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <p class="sr-only">5 out of 5 stars</p>

                                    <div class="prose prose-sm mt-4 max-w-none text-gray-500">
                                        <p>This icon pack is just what I need for my latest project. There's an icon for
                                            just about anything I could ever need. Love the playful look!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-4 text-sm text-gray-500">
                                <div class="flex-none py-10">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                         alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                </div>
                                <div class="flex-1 py-10 border-t border-gray-200">
                                    <h3 class="font-medium text-gray-900">Hector Gibbons</h3>
                                    <p>
                                        <time datetime="2021-07-12">July 12, 2021</time>
                                    </p>

                                    <div class="mt-4 flex items-center">
                                        <!-- Active: "text-yellow-400", Default: "text-gray-300" -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <p class="sr-only">5 out of 5 stars</p>

                                    <div class="prose prose-sm mt-4 max-w-none text-gray-500">
                                        <p>Blown away by how polished this icon pack is. Everything looks so consistent
                                            and each SVG is optimized out of the box so I can use it directly with
                                            confidence. It would take me several hours to create a single icon this
                                            good, so it's a steal at this price.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- More reviews... -->
                        </div>

                        <!-- 'FAQ' panel, show/hide based on tab state -->
                        <div id="tab-panel-faq" class="text-sm text-gray-500" aria-labelledby="tab-faq" role="tabpanel"
                             tabindex="0">
                            <h3 class="sr-only">Frequently Asked Questions</h3>

                            <dl>
                                <dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
                                <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
                                    <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into
                                        your design tool of choice and used directly in code.</p>
                                </dd>
                                <dt class="mt-10 font-medium text-gray-900">Can I use the icons at different sizes?</dt>
                                <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
                                    <p>Yes. The icons are drawn on a 24 x 24 pixel grid, but the icons can be scaled to
                                        different sizes as needed. We don&#039;t recommend going smaller than 20 x 20 or
                                        larger than 64 x 64 to retain legibility and visual balance.</p>
                                </dd>

                                <!-- More FAQs... -->
                            </dl>
                        </div>

                        <!-- 'License' panel, show/hide based on tab state -->
                        <div id="tab-panel-license" class="pt-10" aria-labelledby="tab-license" role="tabpanel"
                             tabindex="0">
                            <h3 class="sr-only">License</h3>

                            <div class="prose prose-sm max-w-none text-gray-500">
                                <h4>Overview</h4>

                                <p>For personal and professional use. You cannot resell or redistribute these icons in
                                    their original or modified state.</p>

                                <ul role="list">
                                    <li>You're allowed to use the icons in unlimited projects.</li>
                                    <li>Attribution is not required to use the icons.</li>
                                </ul>

                                <h4>What you can do with it</h4>

                                <ul role="list">
                                    <li>Use them freely in your personal and professional work.</li>
                                    <li>Make them your own. Change the colors to suit your project or brand.</li>
                                </ul>

                                <h4>What you can't do with it</h4>

                                <ul role="list">
                                    <li>Don't be greedy. Selling or distributing these icons in their original or
                                        modified state is prohibited.
                                    </li>
                                    <li>Don't be evil. These icons cannot be used on websites or applications that
                                        promote illegal or immoral beliefs or activities.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section aria-labelledby="related-heading" class="mt-10 border-t border-gray-200 px-4 py-16 sm:px-0">
                <h2 id="related-heading" class="text-xl font-bold text-gray-900">Customers also bought</h2>

                <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                    <div>
                        <div class="relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg"
                                     alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                     class="h-full w-full object-cover object-center">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                                <div aria-hidden="true"
                                     class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                               class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg"
                                     alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                     class="h-full w-full object-cover object-center">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                                <div aria-hidden="true"
                                     class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                               class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg"
                                     alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                     class="h-full w-full object-cover object-center">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                                <div aria-hidden="true"
                                     class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                               class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg"
                                     alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                     class="h-full w-full object-cover object-center">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                                <div aria-hidden="true"
                                     class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                               class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>

                    <!-- More products... -->
                </div>
            </section>
        </div>
    </main>


<?php
get_footer();
?>