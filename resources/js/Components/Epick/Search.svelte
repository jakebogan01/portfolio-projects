<script>
    import { inertia } from "@inertiajs/svelte";
    import { router } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let filters;
    /* svelte-ignore unused-export-let */
    export let searchResults;

    let search = filters?.search || '';
    let timer;

    const debounce = v => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            router.visit('/epick', {
                method: 'get',
                data: {
                    search: v
                },
                replace: true,
                preserveState: true,
                preserveScroll: true,
                only: ['searchResults']
            });
        }, 300);
    }
</script>

<div class="relative flex justify-between mb-6 mx-2">
    <h1 class="text-3xl">All Tasks</h1>

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
