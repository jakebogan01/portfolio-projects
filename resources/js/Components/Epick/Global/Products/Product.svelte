<script>
    import { router } from "@inertiajs/svelte";
    import ProductImages from "@/Components/Epick/Global/Products/ProductImages.svelte";
    /* svelte-ignore unused-export-let */
    export let product;

    let paragraphs = product?.description.split('\n').filter(para => para.trim() !== '');
    let showFeatures = true;

    const handleBuyProduct = () => {
        router.visit('/epick/products/cart/add', {
            method: 'post',
            data: {
                product: product
            },
            replace: true,
            preserveState: true,
            preserveScroll: true,
        });
    }

    let currentImage = product?.image;
    const switchImage = (img) => {
        currentImage = img;
    }
</script>

<!-- Product -->
{#await product}
    <p>loading products...</p>
{:then product}
    <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <!-- Image gallery -->
        <div class="flex flex-col-reverse">
            <!-- Image selector -->
            <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                    {#each product?.images as image}
                        <ProductImages {image} on:click={()=>{switchImage(image)}} />
                    {/each}

                    <!-- More images... -->
                </div>
            </div>

            <div class="aspect-h-1 aspect-w-1 w-full">
                <!-- Tab panel, show/hide based on tab state. -->
                <div id="tabs-2-panel-1" aria-labelledby="tabs-2-tab-1" role="tabpanel" tabindex="0">
                    <img src={currentImage} alt="Angled front view with bag zipped and handles upright." class="h-full w-full object-cover object-center sm:rounded" loading="lazy" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true">
                </div>
                <!-- More images... -->
            </div>
        </div>

        <!-- Product info -->
        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
            <h1 class="text-3xl font-bold tracking-tight">{product?.title}</h1>

            <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight">${Number.parseFloat(product?.price).toFixed(0)}</p>
            </div>

            <!-- Reviews -->
            <div class="mt-3">
                <h3 class="sr-only">Reviews</h3>
                <div class="flex items-center">
                    <div class="flex items-center">
                        <!-- Active: "text-indigo-500", Inactive: "text-gray-300" -->
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="sr-only">4 out of 5 stars</p>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="sr-only">Description</h3>

                <div class="space-y-6 text-base text-[#A3A6A7]">
                    {#each paragraphs as paragraph}
                        <p>{paragraph}</p>
                    {/each}
                </div>
            </div>

            <!-- Colors -->
            <div class="flex mt-6 space-x-4">
                <div class="bg-[#181A1B] py-2 px-4  rounded-md">
                    <fieldset>
                        <legend class="sr-only">Product color {product?.color}</legend>
                        <div class="flex">
                            <div class="flex-1 flex flex-col space-y-2">
                                <h3 class="text-sm">Color</h3>
                                <span id="color-choice-0-label" class="sr-only">{product?.color}</span>
                                <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10" style="background-color: {product?.color};"></span>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <form on:submit|preventDefault class="mt-6">
                <div class="mt-10 flex">
                    <button type="submit" on:click={handleBuyProduct} class="group flex items-center justify-center text-white text-sm md:text-base font-light font-montserrat bg-[#353536] sm:hover:bg-transparent py-3.5 max-w-xs w-full rounded md:rounded-lg transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.493" height="21.422"><g fill="none" stroke="currentColor" stroke-miterlimit="10"><path d="M11.7 6.1h3.294v14.822H.5V6.1h11.2Z"/><path d="M4.453 8.076V3.794a3.294 3.294 0 1 1 6.588 0v4.282"/></g></svg>
                        <span class="ml-2 md:ml-4 relative before:content-[''] before:absolute before:-bottom-[2px] before:left-1/2 before:transform before:-translate-x-1/2 before:h-px before:w-0 before:bg-white before:transition-all before:sm:group-hover:w-full">Add to cart</span>
                    </button>
                </div>
            </form>

            <section aria-labelledby="details-heading" class="mt-12">
                <h2 id="details-heading" class="sr-only">Additional details</h2>

                <div class="divide-y divide-[#36363b] border-t border-[#36363b]">
                    <div>
                        <h3>
                            <!-- Expand/collapse question button -->
                            <button type="button" on:click={()=>{showFeatures = !showFeatures}} class="group relative flex w-full items-center justify-between py-6 text-left" aria-controls="disclosure-1" aria-expanded="false">
                                <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                                <span class="text-sm font-medium">Features</span>
                                <span class="ml-6 flex items-center">
                                    {#if showFeatures}
                                        <!-- Open: "hidden", Closed: "block" -->
                                        <svg class="block h-6 w-6 text-gray-400 sm:group-hover:text-gray-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                    {:else}
                                        <!-- Open: "block", Closed: "hidden" -->
                                        <svg class="bock h-6 w-6 text-gray-400 sm:group-hover:text-gray-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" /></svg>
                                    {/if}
                                </span>
                            </button>
                        </h3>
                        {#if showFeatures}
                            <div class="prose prose-sm pb-6" id="disclosure-1">
                                <ul role="list" class="text-gray-300">
                                    <li>Multiple strap configurations</li>
                                    <li>Spacious interior with top zip</li>
                                    <li>Leather handle and tabs</li>
                                    <li>Interior dividers</li>
                                    <li>Stainless strap loops</li>
                                    <li>Double stitched construction</li>
                                    <li>Water-resistant</li>
                                </ul>
                            </div>
                        {/if}
                    </div>

                    <!-- More sections... -->
                </div>
            </section>
        </div>
    </div>
{/await}
