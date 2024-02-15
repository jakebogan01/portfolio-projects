<script>
    import { inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let products;
</script>

<div class="flex justify-between my-6 px-10">
    {#if products?.next_page_url !== null || products?.prev_page_url !== null }
        {#if products?.prev_page_url}
            <a use:inertia={{replace: true}} href="{products?.prev_page_url}" class="text-[#238AB6] hover:opacity-40"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg></a>
        {:else}
            <button type="button" class="text-[#238AB6] opacity-40" disabled><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg></button>
        {/if}

        {#if products?.next_page_url}
            <a use:inertia={{replace: true}} href="{products?.next_page_url}" class="text-[#238AB6] hover:opacity-40"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg></a>
        {:else}
            <button type="button" class="text-[#238AB6] opacity-40" disabled><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg></button>
        {/if}
    {/if}
</div>
