<script context="module">
    export {default as layout} from "../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page, inertia, router } from "@inertiajs/svelte";
    import Pagination from "@/Components/Epick/Pagination.svelte";
    import Products from "@/Components/Epick/Products.svelte";
    import Search from "@/Components/Epick/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let products;
    /* svelte-ignore unused-export-let */
    export let filters;
    /* svelte-ignore unused-export-let */
    export let searchResults;
    /* svelte-ignore unused-export-let */
    export let canLogin;
    /* svelte-ignore unused-export-let */
    export let canRegister;

    $: console.log(searchResults)
</script>

<svelte:head>
    <title>Epick | Home</title>
</svelte:head>

<h1>HOME | All Products</h1>

<Search {filters} {searchResults} />

{#if canLogin}
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        {#if $page?.props.auth.user}
            <Link
                href="/dashboard"
                class="text-sm text-gray-700 underline dark:text-white"
            >
                Dashboard
            </Link>
        {:else}
            <Link
                href="/login"
                class="text-sm text-gray-700 underline dark:text-white"
            >
                Log in
            </Link>

            {#if canRegister}
                <Link
                    href="/register"
                    class="ml-4 text-sm text-gray-700 underline dark:text-white"
                >
                    Register
                </Link>
            {/if}
        {/if}
    </div>
{/if}

<Products {products} />

<Pagination {products} />
