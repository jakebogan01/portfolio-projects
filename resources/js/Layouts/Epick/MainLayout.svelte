<script>
    import { inertia } from "@inertiajs/svelte";
    import Search from "@/Components/Epick/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let searchResults, searchFilters;
</script>

<nav>
    <a href="/epick" use:inertia>Home</a>
</nav>

<h1>Epick main layout</h1>

<Search {searchFilters} {searchResults} />

<slot />
