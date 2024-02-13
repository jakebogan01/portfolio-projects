<script>
    import { inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let products;
</script>

<div class="space-y-4 mt-5">
    {#await products?.data}
        <p>loading products...</p>
    {:then products}
        {#each products as { id, title, slug, image, price, project }, i (id)}
            <div class="border border-gray-200 rounded p-4 my-2">
                <a use:inertia href="/"><h2 class="text-2xl font-bold pb-3">{title}</h2></a>
                <p>${price}</p>
                <img src={image} alt="" class="w-[50px]">
                <p><b>Project:</b> {project}</p>
                <a use:inertia href="/" class="inline-block mt-2 text-blue-500 border border-gray-200 px-4 py-1 rounded-lg bg-white">view</a>
            </div>
        {/each}
    {/await}
</div>
