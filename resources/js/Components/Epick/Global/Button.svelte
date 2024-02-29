<script>
    import { inertia } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let bkg = 'bg-[#1E1E21] sm:hover:bg-transparent', src = '';
</script>

<a use:inertia={{onSuccess: page => {window.scrollTo({ top: 0, left: 0, behavior: 'instant' })},}} href={src} class="group flex items-center justify-center text-white text-sm md:text-base font-light font-montserrat {bkg} py-3.5 px-6 mt-6 w-full sm:w-max rounded md:rounded-lg transition-colors">
    <slot name="btnIcon">
        <svg xmlns="http://www.w3.org/2000/svg" width="15.493" height="21.422"><g fill="none" stroke="currentColor" stroke-miterlimit="10"><path d="M11.7 6.1h3.294v14.822H.5V6.1h11.2Z"/><path d="M4.453 8.076V3.794a3.294 3.294 0 1 1 6.588 0v4.282"/></g></svg>
    </slot>
    <slot name="btnText">
        <span class="ml-2 md:ml-4 relative before:content-[''] before:absolute before:-bottom-[2px] before:left-1/2 before:transform before:-translate-x-1/2 before:h-px before:w-0 before:bg-white before:transition-all before:sm:group-hover:w-full before:duration-500">Shop by category</span>
    </slot>
</a>
