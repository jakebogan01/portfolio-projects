<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import Product from "@/Components/Epick/Product.svelte";
    /* svelte-ignore unused-export-let */
    export let product;
</script>

<svelte:head>
    <title>Epick | Product</title>
</svelte:head>

<h1>Product | Product</h1>

<Product {product} />

