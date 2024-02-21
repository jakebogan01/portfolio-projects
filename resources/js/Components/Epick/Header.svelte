<script>
    /* svelte-ignore unused-export-let */
    import Button from "@/Components/Epick/Button.svelte";

    export let addBtn = true;
</script>

<header class="text-white mt-[107px]">
    <h1 class="font-montserrat text-6xl font-bold text-nowrap leading-[44px]">
        <slot name="headingText">
            <span class="ml-[30px] bg-gradient-to-t from-black to-[#87878F] bg-clip-text" style="-webkit-text-fill-color: transparent;">We fetch</span><br>
            <span class="text-4xl">You select</span>
        </slot>
    </h1>

    <p class="text-[#A3A6A7] mt-10">
        <slot name="introText">
            Explore endless choices at our online store – diverse categories, quality products, unbeatable prices. Your one-stop shop for convenience and satisfaction. Shop smarter with us today.
        </slot>
    </p>

    {#if addBtn}
        <Button />
    {/if}
</header>
