<script>
    import ProductCard from "@/Components/Epick/Global/Products/ProductCard.svelte";
    /* svelte-ignore unused-export-let */
    export let products;
</script>

{#await products?.data}
    <p>loading products...</p>
{:then products}
    {#each products as product, i (product?.id)}
        <ProductCard {...product} />
    {/each}
{/await}
