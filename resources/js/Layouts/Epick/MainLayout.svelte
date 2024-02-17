<script>
    import { inertia } from "@inertiajs/svelte";
    import Search from "@/Components/Epick/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let searchResults, searchFilters, flash;
</script>

{#if flash.message}
    <div class="text-center text-blue-500 dark:text-blue-400 font-bold pb-4">{flash.message}</div>
{/if}

<nav>
    <a href="/epick" use:inertia>Home</a>
</nav>

<h1>Epick main layout</h1>

<Search {searchFilters} {searchResults} />

<slot />
