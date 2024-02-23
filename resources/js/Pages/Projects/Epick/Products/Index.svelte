<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import Pagination from "@/Components/Epick/Products/Pagination.svelte";
    import Products from "@/Components/Epick/Global/Products/Products.svelte";
    import ProductFilters from "@/Components/Epick/Products/ProductFilters.svelte";
    /* svelte-ignore unused-export-let */
    export let products, filters;
</script>

<svelte:head>
    <title>Epick | Category</title>
</svelte:head>

<h1>Category Products</h1>

<ProductFilters {products} {filters} />

<Products {products} />

<Pagination {products} />
