<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { inertia } from "@inertiajs/svelte";
    import Product from "@/Components/Epick/Global/Products/Product.svelte";
    import ShortCut from "@/Components/Epick/Global/Search/ShortCut.svelte";
    import Search from "@/Components/Epick/Global/Search/Search.svelte";
    import ProductCard from "@/Components/Epick/Global/Products/ProductCard.svelte";
    import Carousel from 'svelte-carousel';
    import { onMount, onDestroy } from 'svelte';
    /* svelte-ignore unused-export-let */
    export let product, searchResults, searchFilters, relatedProducts;
    let showSearch = false;
    let carousel; // for calling methods of the carousel instance
    let particlesToShow; // number of particles to show in the carousel
    let windowWidth = window.innerWidth;

    const handleResize = () => {
        windowWidth = window.innerWidth;
    };

    onMount(() => {
        window.addEventListener('resize', handleResize);
    });

    onDestroy(() => {
        window.removeEventListener('resize', handleResize);
    });

    $: if (windowWidth < 500) {
        particlesToShow = 1;
    } else if (windowWidth < 640) {
        particlesToShow = 2;
    } else if (windowWidth < 1024) {
        particlesToShow = 3;
    } else if (windowWidth < 1280) {
        particlesToShow = 4;
    } else {
        particlesToShow = 5;
    }
</script>

<svelte:head>
    <title>Epick | {product?.title}</title>
</svelte:head>

<Search {showSearch} {searchResults} {searchFilters} />

<div class="flex justify-between items-center pointer-events-auto pt-24 mb-4">
    <div>
        <span class="sr-only">Go back to previous page</span>
        <a use:inertia={{replace: true}} href="#" on:click|preventDefault={() => window.history.back()} class="text-white sm:hover:text-[#353536] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg></a>
    </div>

    <ShortCut on:click={()=>{showSearch = !showSearch}} />
</div>

<div class="sm:pt-16 mb-24">
    <div class="mx-auto max-w-2xl md:max-w-none">
        <Product {product} />

        <section aria-labelledby="related-heading" class="mt-10 border-t border-[#36363b] px-4 py-10 sm:px-0">
            <h2 id="related-heading" class="text-xl font-bold">Related products</h2>

            <div class="cursor-grab">
                <Carousel
                        particlesToShow={particlesToShow}
                        particlesToScroll={1}
                        autoplay
                        autoplayDuration={10000}
                        arrows={false}
                        dots={true}
                        swiping={true}
                        bind:this={carousel}>
                        {#each relatedProducts as product (product?.id)}
                            <div class="flex justify-center">
                                <ProductCard {...product} />
                            </div>
                        {/each}
                </Carousel>
            </div>
        </section>
    </div>
</div>
