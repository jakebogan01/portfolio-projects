<script>
    import { inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let products;
</script>

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
