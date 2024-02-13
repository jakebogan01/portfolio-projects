<script context="module">
    export {default as layout} from "../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page, inertia } from "@inertiajs/svelte";
    export let canLogin;
    export let canRegister;
    export let laravelVersion;
    export let phpVersion;
    export let products;
</script>

<svelte:head>
    <title>Epick | Home</title>
</svelte:head>

<h1>HOME | All Products</h1>

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

{#each products?.data as product (product?.id)}
    <div class="border border-gray-200 rounded p-4 my-2">
        <h2 class="text-xl">{product?.title}</h2>
        <p>${@html product?.price}</p>
        <img src={product?.image} alt="">
    </div>
{/each}

<div>
    <div class="mt-6">
        {#if products?.prev_page_url === null || products?.prev_page_url === undefined}
            <span class="px-1">&laquo; Prev</span>
        {:else}
            <a use:inertia href="{products?.first_page_url}" class="px-1">First Page</a>
            <a use:inertia href="{products?.prev_page_url}" class="px-1">&laquo; Prev</a>
        {/if}

        {#if products?.next_page_url === null || products?.next_page_url === undefined}
            <span class="px-1">Next &raquo;</span>
        {:else}
            <a use:inertia href="{products?.next_page_url}" class="px-1">Next &raquo;</a>
        {/if}
    </div>
</div>
