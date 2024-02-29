<script>
    import { onMount } from "svelte";
    import { gsap } from "gsap/dist/gsap";
    import { ScrollTrigger } from "gsap/dist/ScrollTrigger";

    gsap.registerPlugin(ScrollTrigger);
    let el2, el3;

    onMount(()=>{
        gsap.to(el2, {
            scrollTrigger: {
                trigger: el2,
                markers: false,
                scrub: 2,
                end: "bottom 30%",
            },
            x: 0,
        });

        gsap.to(el3, {
            scrollTrigger: {
                trigger: el3,
                markers: false,
                end: "bottom 1%",
                scrub: 2,
            },
            y: 0,
        });
    });
</script>

<div bind:this={el2} class="relative transform -translate-x-[100px]">
    <picture>
        <source media="(min-width:640px)" srcset="/images/epick/tablet/home/back-shoe.png">
        <img src="/images/epick/mobile/home/back-shoe.png" alt="" class="absolute left-1/2 transform -translate-x-3/4 1440:-translate-x-[469px] -translate-y-3.5 w-4/5" role="presentation" loading="eager" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true">
    </picture>
</div>
<div bind:this={el3} class="relative transform translate-y-[200px]">
    <picture>
        <source media="(min-width:640px)" srcset="/images/epick/tablet/home/front-shoe.png">
        <img src="/images/epick/mobile/home/front-shoe.png" alt="" class="absolute left-1/2 transform -translate-x-[47%] 1440:-translate-x-[400px] w-full" role="presentation" loading="eager" draggable="false" style="-webkit-user-drag: none; user-select: none; pointer-events: none;" aria-hidden="true">
    </picture>
</div>
