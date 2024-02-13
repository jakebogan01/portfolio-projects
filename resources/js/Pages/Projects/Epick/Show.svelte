<script context="module">
    export {default as layout} from "../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import Product from "@/Components/Epick/Product.svelte";
    /* svelte-ignore unused-export-let */
    export let errors;
    /* svelte-ignore unused-export-let */
    export let auth;
    /* svelte-ignore unused-export-let */
    export let product;
    /* svelte-ignore unused-export-let */
    export let canLogin;
    /* svelte-ignore unused-export-let */
    export let canRegister;
    /* svelte-ignore unused-export-let */
    export let laravelVersion;
    /* svelte-ignore unused-export-let */
    export let phpVersion;
</script>

<svelte:head>
    <title>Epick | Product</title>
</svelte:head>

<h1>Product | Product</h1>

<Product {product} />

