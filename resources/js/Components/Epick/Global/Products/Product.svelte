<script>
    import { router } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let product;

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
</script>

<div class="space-y-4 mt-5">
    {#await product}
        <p>loading products...</p>
    {:then product}
        <div class="flex items-start justify-between border border-gray-200 rounded p-4 my-2">
            <h2 class="text-2xl font-bold pb-3">{product?.title}</h2>
            <form on:submit|preventDefault>
                <button type="submit" on:click={handleBuyProduct} class="bg-blue-400 py-1 px-5 text-white rounded-sm">buy</button>
            </form>
        </div>
    {/await}
</div>
