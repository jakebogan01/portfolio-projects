<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { page, inertia } from "@inertiajs/svelte";
    import { fade, fly } from "svelte/transition";
    import Pagination from "@/Components/Epick/Products/Pagination.svelte";
    import Products from "@/Components/Epick/Global/Products/Products.svelte";
    import ProductFilters from "@/Components/Epick/Products/ProductFilters.svelte";
    import ShortCut from "@/Components/Epick/Global/Search/ShortCut.svelte";
    import Search from "@/Components/Epick/Global/Search/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let products, filters, searchResults, searchFilters;
    let showSearch = false;
    let showFilters = false;
    let showSidebar = false;

    let currentCategory = $page.url.split("/").pop();
    currentCategory = currentCategory.split("?")[0];
</script>

<svelte:head>
    <title>Epick | {currentCategory}</title>
</svelte:head>

<Search {showSearch} {searchResults} {searchFilters} />

<div class="relative sm:mb-20">
    {#if showSidebar}
        <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div transition:fade={{ duration: 300 }} class="fixed inset-0 bg-black bg-opacity-25"></div>

            <div transition:fly={{ duration: 300, x: 320, opacity: 0 }} class="fixed inset-0 z-40 flex">
                <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-[#0F0F10] py-4 pb-12">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium">Filters</h2>
                        <button type="button" on:click={()=>{showSidebar = false}} class="relative -mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-[#1E1E21] p-2 text-gray-400">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4 border-t border-[#36363b]">
                        <h3 class="sr-only">Categories</h3>

                        <div class="border-t border-[#36363b] px-4 py-6">
                            <ProductFilters {products} {filters} />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {/if}

    <div>
        <div class="flex items-baseline justify-between border-b border-[#36363b] pb-6 pt-24">
            <div class="flex items-center space-x-2 pointer-events-auto">
                <h1 class="text-4xl tracking-tight capitalize">{currentCategory === 'clothes' ? 'clothing' : currentCategory}</h1>
                <ShortCut on:click={()=>{showSearch = !showSearch}} />
            </div>

            <div class="flex items-center">
                <div class="relative inline-block text-left">
                    <div>
                        <button type="button" on:click={()=>{showFilters = !showFilters}} class="inline-flex justify-center text-sm font-medium text-gray-300 sm:hover:text-white transition-colors" id="menu-button" aria-expanded="false" aria-haspopup="true">
                            Sort
                            <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>
                        </button>
                    </div>

                    {#if showFilters}
                        <div transition:fade={{ duration: 200 }} on:keydown={()=>{}} on:click|self={()=>{showFilters = false}} class="fixed inset-0 bg-black bg-opacity-25"></div>
                        <div transition:fade={{ duration: 200 }} class="absolute right-0 z-50 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none" on:keydown={()=>{}} on:click={()=>{showFilters = false}}>
                                <!--
                                  Active: "bg-gray-100", Not Active: ""
                                  Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                                -->
                                <a use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: undefined, price: undefined, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}" href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">All</a>
                                <a use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: 'popular', price: filters?.price, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}" href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Most Popular</a>
                                <a use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'high', color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}" href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Price: High to Low</a>
                                <a use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'low', color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}" href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Price: Low to High</a>
                            </div>
                        </div>
                    {/if}
                </div>

                <button type="button" on:click={()=>{showSidebar = !showSidebar}} class="-m-2 ml-4 p-2 text-gray-300 sm:ml-6 lg:hidden">
                    <span class="sr-only">Filters</span>
                    <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" /></svg>
                </button>
            </div>
        </div>

        <section aria-labelledby="products-heading" class="pt-6">
            <h2 id="products-heading" class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-4 lg:col-span-3 lg:gap-x-20">
                <form class="hidden lg:block pt-[50px]">
                    <h3 class="sr-only">Categories</h3>

                    <ProductFilters {products} {filters} />
                </form>

                <div class="col-span-4 lg:col-span-3 h-min">
                    <div class="grid gap-x-4 sm:gap-x-0 grid-cols-2 sm:grid-cols-3 888:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4">
                        <Products {products} />
                    </div>
                    <Pagination {products} />
                </div>
            </div>
        </section>
    </div>
</div>
