<script>
    /* svelte-ignore unused-export-let */
    import Button from "@/Components/Epick/Global/Button.svelte";
    import GradientHeading from "@/Components/Epick/Global/GradientHeading.svelte";

    export let addBtn = true;
</script>

<header class="text-white mt-[107px]">
    <h1 class="font-montserrat text-7xl md:text-[105px] font-bold text-nowrap leading-[44px] md:leading-[85px]">
        <slot name="headingText">
            <GradientHeading styles="sm:ml-[30px]">We fetch</GradientHeading>
            <br>
            <span class="text-4xl md:text-7xl">You select</span>
        </slot>
    </h1>

    <p class="text-[#A3A6A7] mt-10 max-w-[500px]">
        <slot name="introText">
            Explore endless choices at our online store – diverse categories, quality products, unbeatable prices. Your one-stop shop for convenience and satisfaction. Shop smarter with us today.
        </slot>
    </p>

    {#if addBtn}
        <Button />
    {/if}
</header>
