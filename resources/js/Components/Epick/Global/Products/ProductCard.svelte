<script>
    import { inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let id, title, slug, image, price, project, category, color;
</script>

<div class="flex flex-col justify-end bg-[#181A1B] px-2 py-2 rounded-lg h-[152px] w-[162px] md:w-[200px] md:h-[160px] mt-[100px]">
    <div class="flex justify-center">
        <div class="w-[124px] md:w-[130px] mb-4">
            <img src="/images/epick/global/shirt.png" alt="headphone" class="w-full" />
        </div>
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col font-roboto">
            <span class="sr-only">{title}</span>
            <span class="block text-sm md:text-base">{color}</span>
            <span class="block text-[#BDC0C2] font-light">${Number.parseFloat(price).toFixed(0)}</span>
        </div>
        <div class="flex items-end">
            <a use:inertia href="/epick/products/{slug}" class="flex justify-center items-center bg-[#0A0A0B] rounded-lg size-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="15.493" height="21.422"><g fill="none" stroke="currentColor" stroke-miterlimit="10"><path d="M11.7 6.1h3.294v14.822H.5V6.1h11.2Z"/><path d="M4.453 8.076V3.794a3.294 3.294 0 1 1 6.588 0v4.282"/></g></svg>
            </a>
        </div>
    </div>
</div>
