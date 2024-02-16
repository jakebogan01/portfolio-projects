<script>
    import { inertia, page, router } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let searchResults, searchFilters;

    let search = searchFilters?.search || '';
    let timer;

    const debounce = v => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            router.visit($page?.url, {
                method: 'get',
                data: {
                    search: v.length !== 0 ? v : undefined
                },
                replace: true,
                preserveState: true,
                preserveScroll: true,
                only: ['searchResults']
            });
        }, 300);
    }
</script>

<div class="relative flex justify-end mb-6 mx-2">
    <input on:keyup={({ target: { value } }) => debounce(value)} value={search} type="text" placeholder="Search..." class="border px-2 rounded-lg"/>

    {#await searchResults}
        <p>loading products...</p>
    {:then results}
        {#if results.length !== 0}
            <div class="absolute top-12 right-0 bg-white overflow-y-auto max-h-[300px] w-[500px] shadow-2xl drop-shadow-2xl">
                <ul>
                    {#each results as { id, title, slug, image, price }, i (id)}
                        <li>
                            <a use:inertia href="/epick/products/{slug}" class="flex justify-between items-center p-2 {i  % 2 === 0 ? 'bg-gray-100' : 'bg-gray-200'}">
                                <img src={image} alt="" class="rounded-sm w-10 h-10">
                                <div class="flex flex-col items-end text-sm">
                                    <span>{title}</span>
                                    <p>${price}</p>
                                </div>
                            </a>
                        </li>
                    {/each}
                </ul>
            </div>
        {/if}
    {/await}
</div>
