<script>
    /* svelte-ignore unused-export-let */
    export let product;
</script>

<div class="space-y-4 mt-5">
    {#await product}
        <p>loading products...</p>
    {:then product}
        <div class="border border-gray-200 rounded p-4 my-2">
            <h2 class="text-2xl font-bold pb-3">{product?.title}</h2>
        </div>
    {/await}
</div>
