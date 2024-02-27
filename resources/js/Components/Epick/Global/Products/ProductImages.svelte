<script>
    /* svelte-ignore unused-export-let */
    export let image;
</script>

<button id="tabs-2-tab-1" class="relative flex h-24 cursor-pointer items-center justify-center rounded bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-4" aria-controls="tabs-2-panel-1" role="tab" type="button">
    <span class="sr-only">Angled view</span>
    <span class="absolute inset-0 overflow-hidden rounded">
        <img src={image} alt="" class="h-full w-full object-cover object-center" loading="lazy" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true">
    </span>
    <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
    <span class="ring-transparent pointer-events-none absolute inset-0 rounded ring-2 ring-offset-2" aria-hidden="true"></span>
</button>
