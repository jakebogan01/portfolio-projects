<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import Pagination from "@/Components/Epick/Pagination.svelte";
    import Products from "@/Components/Epick/Products.svelte";
    import Search from "@/Components/Epick/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let products;
    export let canLogin;
    /* svelte-ignore unused-export-let */
    export let canRegister;
</script>

<svelte:head>
    <title>Epick | Category</title>
</svelte:head>

<h1>Category Products</h1>

<Products {products} />

<Pagination {products} />
