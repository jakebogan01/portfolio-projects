<script>
    import Button from "@/Components/Epick/Global/Button.svelte";
</script>

<aside id="ctaBanner">
    <div class="group relative bg-[#181A1B] py-24 shadow-[0px_0px_0px_100vmax_rgb(24,26,27)] sm:shadow-none sm:rounded-lg sm:px-12 md:px-[146px] sm:py-[86px] max-w-[968px] mx-auto" style="clip-path: inset(0 -100vmax);">
        <div class="relative text-center sm:text-left z-0">
            <h3 class="font-roboto text-xl sm:text-2xl sm:group-hover:-translate-y-8 transition-transform duration-700 ease-in-out">Elevate your style, click and smile</h3>
            <span class="inline-block text-[#A3A6A7] text-base pb-1 sm:group-hover:-translate-y-8 transition-transform duration-700 ease-in-out delay-100">Buy Now, up to 40% off.</span>
            <Button bkg="bg-[#0F0F10] sm:group-hover:bg-white sm:group-hover:text-black duration-500" src="/epick/products/category/clothes">
                <span slot="btnText" class="ml-2 sm:ml-4">Buy now</span>
            </Button>
        </div>
        <img src="/images/epick/tablet/home/shopping-bags.png" alt="" class="hidden sm:block absolute right-0 top-1/2 -translate-y-1/2 w-[26%] -z-10" role="presentation" loading="eager" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true">
    </div>
</aside>
