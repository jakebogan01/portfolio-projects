<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page, inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let categories, canLogin, canRegister, cartQuantity;
    $: console.log(cartQuantity)
</script>

<svelte:head>
    <title>Epick | Home</title>
</svelte:head>

{#if cartQuantity?.quantity > 0}
    <a href="/epick/checkout" use:inertia>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
        </svg>
    </a>
{/if}

<h1>HOME</h1>

{#if canLogin}
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        {#if $page?.props.auth.user}
            <button
                type="button"
                use:inertia={{ href: '/epick/logout', method: 'post' }}
                class="text-sm text-gray-700 underline dark:text-white"
            >
                Logout
            </button>
        {:else}
            <Link
                href="/epick/login"
                class="text-sm text-gray-700 underline dark:text-white"
            >
                Log in
            </Link>

            {#if canRegister}
                <Link
                    href="/epick/register"
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
