<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { page } from "@inertiajs/svelte";
    import Pagination from "@/Components/Epick/Products/Pagination.svelte";
    import Products from "@/Components/Epick/Global/Products/Products.svelte";
    import ProductFilters from "@/Components/Epick/Products/ProductFilters.svelte";
    /* svelte-ignore unused-export-let */
    export let products, filters;

    let currentCategory = $page.url.split("/").pop();
</script>

<svelte:head>
    <title>Epick | {currentCategory}</title>
</svelte:head>



<!--<ProductFilters {products} {filters} />-->

<!--<Products {products} />-->

<!--<Pagination {products} />-->
