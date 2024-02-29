<script>
    import BreezeApplicationLogo from "@/Components/ApplicationLogo.svelte";
    import { inertia } from "@inertiajs/svelte";
</script>

<div class="container min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0f0f10]">
    <div>
        <a href="/" use:inertia>
            <BreezeApplicationLogo class="w-20 h-20 fill-current text-white" />
        </a>
    </div>

    <div class="w-full max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        <slot />
    </div>
</div>
