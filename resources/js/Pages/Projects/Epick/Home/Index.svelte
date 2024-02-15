<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page, inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let categories, canLogin, canRegister;
</script>

<svelte:head>
    <title>Epick | Home</title>
</svelte:head>

<h1>HOME</h1>

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

<div class="space-y-4 mt-5">
    {#await categories}
        <p>loading categories...</p>
    {:then categories}
        {#each categories as {id, name, slug}, i (id)}
            <div class="border border-gray-200 rounded p-4 my-2">
                <a use:inertia href="/epick/products/category/{slug}"><h2 class="text-2xl font-bold">{name}</h2></a>
            </div>
        {/each}
    {/await}
</div>
