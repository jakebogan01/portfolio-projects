<script>
    /* svelte-ignore unused-export-let */
    export let bkg = 'bg-[#1E1E21]';
</script>

<button type="button" class="flex items-center justify-center text-white text-sm md:text-base font-light font-montserrat {bkg} py-3.5 px-6 mt-6 w-full sm:w-max rounded md:rounded-lg">
    <slot name="btnIcon">
        <svg xmlns="http://www.w3.org/2000/svg" width="15.493" height="21.422"><g fill="none" stroke="currentColor" stroke-miterlimit="10"><path d="M11.7 6.1h3.294v14.822H.5V6.1h11.2Z"/><path d="M4.453 8.076V3.794a3.294 3.294 0 1 1 6.588 0v4.282"/></g></svg>
    </slot>
    <slot name="btnText">
        <span class="ml-2 md:ml-4">Shop by category</span>
    </slot>
</button>
