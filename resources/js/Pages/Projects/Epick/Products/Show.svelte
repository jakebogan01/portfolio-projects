<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { inertia } from "@inertiajs/svelte";
    import Product from "@/Components/Epick/Global/Products/Product.svelte";
    import ShortCut from "@/Components/Epick/Global/Search/ShortCut.svelte";
    import Notification from "@/Components/Epick/Global/Notification.svelte";
    import Search from "@/Components/Epick/Global/Search/Search.svelte";
    import ProductCard from "@/Components/Epick/Global/Products/ProductCard.svelte";
    /* svelte-ignore unused-export-let */
    export let product, flash, searchResults, searchFilters;
    let showSearch = false;
</script>

<svelte:head>
    <title>Epick | {product?.title}</title>
</svelte:head>

<Search {showSearch} {searchResults} {searchFilters} />

<div class="flex justify-between items-center pointer-events-auto pt-24">
    <div>
        <span class="sr-only">Go back to previous page</span>
        <a use:inertia={{replace: true}} href="#" on:click|preventDefault={() => window.history.back()} class="text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg></a>
    </div>

    <ShortCut on:click={()=>{showSearch = !showSearch}} />
</div>

<div class="sm:pt-16 mb-24">
    <div class="mx-auto max-w-2xl lg:max-w-none">
        <Product {product} />

        <section aria-labelledby="related-heading" class="mt-10 border-t border-[#36363b] px-4 py-10 sm:px-0">
            <h2 id="related-heading" class="text-xl font-bold">Related products</h2>

            <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                {#each Array(4) as _, i}
                    <ProductCard />
                {/each}
                <!-- More products... -->
            </div>
        </section>
    </div>
</div>

<Notification {flash} />
