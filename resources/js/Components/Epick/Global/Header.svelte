<script>
    import { onMount } from "svelte";
    import { gsap } from "gsap/dist/gsap";
    import { ScrollTrigger } from "gsap/dist/ScrollTrigger";
    import Button from "@/Components/Epick/Global/Button.svelte";
    import GradientHeading from "@/Components/Epick/Global/GradientHeading.svelte";

    gsap.registerPlugin(ScrollTrigger);
    let el1;

    /* svelte-ignore unused-export-let */
    export let addBtn = true, addImg = true;

    onMount(()=>{
        let mm = gsap.matchMedia();

        mm.add("(min-width: 1440px)", () => {
            gsap.to(el1, {
                scrollTrigger: {
                    trigger: el1,
                    markers: false,
                    scrub: 2,
                },
                y: 200,
            });
        });
    });
</script>

<header class="flex text-white mt-[107px]">
    {#if addImg}
        <div bind:this={el1} class="1440:relative w-0 1440:w-full transition-all duration-300">
            <picture>
                <source media="(min-width:1440px)" srcset="/images/epick/desktop/home/banner-headphones.png">
                <source media="(min-width:640px)" srcset="/images/epick/tablet/home/banner-headphones.png">
                <img src="/images/epick/mobile/home/banner-headphones.png" alt="" class="absolute -top-56 md:-top-[288px] 1440:-top-[446px] right-[5dvw] md:left-1/2 1440:right-20 sm:max-w-[219px] md:max-w-[320px] -z-10" role="presentation" loading="eager" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true">
            </picture>
        </div>
    {/if}
    <div class="w-full">
        <h1 class="font-montserrat text-7xl md:text-[105px] font-bold text-nowrap leading-[44px] md:leading-[85px]" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;">
            <slot name="headingText">
                <GradientHeading styles="sm:ml-[30px]">We fetch</GradientHeading>
                <br>
                <span class="text-4xl md:text-7xl">You select</span>
            </slot>
        </h1>

        <p class="text-[#A3A6A7] mt-10 max-w-[500px]">
            <slot name="introText">
                Explore endless choices at our online store – diverse categories, quality products, unbeatable prices.
                Your one-stop shop for convenience and satisfaction. Shop smarter with us today.
            </slot>
        </p>

        {#if addBtn}
            <Button src="/epick/category"/>
        {/if}
    </div>
</header>
