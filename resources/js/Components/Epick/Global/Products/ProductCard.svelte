<script>
    import { inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let id, title, slug, image, price, project, category, color, is_featured;
</script>

<div class="group relative flex flex-col justify-end bg-[#181A1B] px-2 py-2 rounded-lg h-[152px] w-[162px] md:w-[200px] md:h-[160px] mt-[100px]">
    {#if is_featured}
        <div class="ribbon bg-[#c3af3c] text-white font-roboto z-0">40%</div>
    {/if}
    <div class="relative flex justify-center z-10 transform sm:group-hover:-translate-y-3 transition-transform duration-500">
        <div class="w-[124px] md:w-[130px] mb-4">
            <img src="/images/epick/global/shirt.png" alt="headphone" class="w-full" loading="lazy" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true" />
        </div>
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col font-roboto">
            <span class="sr-only">{title}</span>
            <span class="block text-sm md:text-base truncate max-w-[130px]">{color}</span>
            <span class="block text-[#BDC0C2] font-light">${Number.parseFloat(price).toFixed(0)}</span>
        </div>
        <div class="flex items-end">
            <a use:inertia={{onSuccess: page => {window.scrollTo({ top: 0, left: 0, behavior: 'instant' })},}} href="/epick/products/{slug}" class="flex justify-center items-center bg-[#0A0A0B] sm:hover:bg-white sm:hover:text-black rounded-lg size-10 transition-colors duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="15.493" height="21.422"><g fill="none" stroke="currentColor" stroke-miterlimit="10"><path d="M11.7 6.1h3.294v14.822H.5V6.1h11.2Z"/><path d="M4.453 8.076V3.794a3.294 3.294 0 1 1 6.588 0v4.282"/></g></svg>
            </a>
        </div>
    </div>
</div>
