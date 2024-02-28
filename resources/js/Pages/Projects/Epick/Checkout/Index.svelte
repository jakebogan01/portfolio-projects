<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { router } from "@inertiajs/svelte";
    import Search from "@/Components/Epick/Global/Search/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let canLogin, canRegister, cartQuantity, searchResults, searchFilters;
    $: shipping = (cartQuantity?.products.length > 0 && cartQuantity?.subtotal > 25) ? 25 : 0;
    $: taxes = cartQuantity?.products.length * 0.1 * cartQuantity?.subtotal;
    $: total = cartQuantity?.subtotal + shipping + taxes;

    const handleBuyProduct = (productId) => {
        const product = cartQuantity?.products.filter(product => product.id === productId);

        router.delete(`/epick/products/cart/remove/${product[0]?.id}`, {
            method: 'delete',
            data: {
                product: product[0]
            },
            replace: true,
            preserveState: true,
            preserveScroll: true,
        });
    }
</script>

<svelte:head>
    <title>Epick | My Cart</title>
</svelte:head>

<Search {searchResults} {searchFilters} />

<div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 mt-24 mb-48">
    <h1 class="sr-only">Checkout</h1>

    <section aria-labelledby="summary-heading" class="bg-[#181A1B] pb-12 pt-6 md:px-10 lg:col-start-2 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:rounded-md shadow-[0px_0px_0px_100vmax_rgb(24,26,27)] lg:shadow-none lg:h-min" style="clip-path: inset(0 -100vmax);">
        <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
            <h2 id="summary-heading" class="sr-only">Order summary</h2>

            {#await cartQuantity?.products}
                <p>loading categories...</p>
            {:then products}
                <dl>
                    <dt class="text-sm font-medium text-gray-300">Amount due</dt>
                    <dd class="mt-1 text-3xl font-bold tracking-tight text-white">
                        ${products.length > 0 ? Number.parseFloat(cartQuantity?.subtotal).toFixed(0) : '0.00'}
                    </dd>
                </dl>

                <ul role="list" class="divide-y divide-white divide-opacity-10 text-sm font-medium mt-4">
                    {#each products as {id, title, price, image, quantity}, i (id)}
                        <li class="flex items-start space-x-4 py-6">
                            <img src={image} alt="Front of zip tote bag with white canvas, white handles, and black drawstring top." class="h-20 w-20 flex-none rounded-md object-cover object-center">
                            <div class="flex-auto space-y-1">
                                <h3 class="text-white truncate max-w-60">{title}</h3>
                                <p>White and black</p>
                                <form on:submit|preventDefault>
                                    <button type="submit" on:click={()=>{handleBuyProduct(id)}} class="text-gray-500">remove</button>
                                </form>
                            </div>
                            <p class="flex-none text-base font-medium text-white">
                                ${Number.parseFloat(price).toFixed(0)}
                                {#if quantity > 1}
                                    <span class="text-xs">x{quantity}</span>
                                {/if}
                            </p>
                        </li>
                    {/each}
                </ul>

                <dl class="space-y-6 border-t border-white border-opacity-10 pt-6 text-sm text-gray-300 font-medium">
                    <div class="flex items-center justify-between">
                        <dt>Subtotal</dt>
                        <dd>${cartQuantity?.subtotal.toFixed(2)}</dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt>Shipping</dt>
                        <dd>{shipping === 0 ? 'Free' : `$${shipping}.00`}</dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt>Taxes</dt>
                        <dd>${taxes.toFixed(2)}</dd>
                    </div>

                    <div class="flex items-center justify-between border-t border-white border-opacity-10 pt-6 text-white">
                        <dt class="text-base">Total</dt>
                        <dd class="text-base">${total.toFixed(2)}</dd>
                    </div>
                </dl>
            {/await}
        </div>
    </section>

    <section aria-labelledby="payment-and-shipping-heading" class="py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:pb-0 lg:pt-0">
        <h2 id="payment-and-shipping-heading" class="sr-only">Payment and shipping details</h2>

        <form on:submit|preventDefault>
            <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                <div>
                    <h3 id="contact-info-heading" class="text-lg font-medium">Contact information</h3>

                    <div class="mt-6">
                        <label for="email-address" class="block text-sm font-medium text-gray-300">Email address</label>
                        <div class="mt-1">
                            <input type="email" id="email-address" name="email-address" autocomplete="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 id="payment-heading" class="text-lg font-medium">Payment details</h3>

                    <div class="mt-6 grid grid-cols-3 gap-x-4 gap-y-6 sm:grid-cols-4">
                        <div class="col-span-3 sm:col-span-4">
                            <label for="card-number" class="block text-sm font-medium text-gray-300">Card number</label>
                            <div class="mt-1">
                                <input type="text" id="card-number" name="card-number" autocomplete="cc-number" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-2 sm:col-span-3">
                            <label for="expiration-date" class="block text-sm font-medium text-gray-300">Expiration date (MM/YY)</label>
                            <div class="mt-1">
                                <input type="text" name="expiration-date" id="expiration-date" autocomplete="cc-exp" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="cvc" class="block text-sm font-medium text-gray-300">CVC</label>
                            <div class="mt-1">
                                <input type="text" name="cvc" id="cvc" autocomplete="csc" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 id="shipping-heading" class="text-lg font-medium">Shipping address</h3>

                    <div class="mt-6 grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-3">
                        <div class="sm:col-span-3">
                            <label for="address" class="block text-sm font-medium text-gray-300">Address</label>
                            <div class="mt-1">
                                <input type="text" id="address" name="address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-300">City</label>
                            <div class="mt-1">
                                <input type="text" id="city" name="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="region" class="block text-sm font-medium text-gray-300">State / Province</label>
                            <div class="mt-1">
                                <input type="text" id="region" name="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="postal-code" class="block text-sm font-medium text-gray-300">Postal code</label>
                            <div class="mt-1">
                                <input type="text" id="postal-code" name="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-lg font-medium">Billing information</h3>

                    <div class="mt-6 flex items-center">
                        <input id="same-as-shipping" name="same-as-shipping" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <div class="ml-2">
                            <label for="same-as-shipping" class="text-sm font-medium text-gray-300">Same as shipping information</label>
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex justify-end border-t border-[#36363b] pt-6">
                    <button type="submit" on:click={handleBuyProduct} class="flex items-center justify-center text-white text-sm md:text-base font-light font-montserrat bg-[#1E1E21] sm:hover:bg-white sm:hover:text-black py-3.5 w-full rounded md:rounded-lg transition-colors">
                        <span class="ml-2 md:ml-4">Pay now</span>
                    </button>
                </div>
            </div>
        </form>
    </section>
</div>
