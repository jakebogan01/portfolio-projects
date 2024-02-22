<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page, inertia } from "@inertiajs/svelte";
    import Header from "@/Components/Epick/Header.svelte";
    import GradientHeading from "@/Components/Epick/GradientHeading.svelte";
    import BrandListItem from "@/Components/Epick/Home/BrandListItem.svelte";
    import Button from "@/Components/Epick/Button.svelte";
    import ProductCard from "@/Components/Epick/Global/ProductCard.svelte";
    import Footer from "@/Components/Epick/Global/Footer/Footer.svelte";
    /* svelte-ignore unused-export-let */
    export let categories, cartQuantity;
    $: console.log(cartQuantity)
</script>

<svelte:head>
    <title>Epick | Home</title>
</svelte:head>

<div class="container overflow-hidden">
    <img src="/images/epick/mobile/home/banner-headphones.png" alt="" class="absolute -top-56 right-[5dvw] -z-10" role="presentation">

    <main>
        <Header addBtn={true} />

        <section id="brands" class="mb-28 mt-36">
            <div class="flex items-center justify-between text-white mb-36">
                <svg xmlns="http://www.w3.org/2000/svg" width="87.456" height="30"><path fill="currentColor" d="M18.213.015a6.117 6.117 0 0 0-4.374 2.2 5.96 5.96 0 0 0-1.652 4.715 5.451 5.451 0 0 0 4.656-2.359c1.8-2.522 1.433-4.483 1.369-4.556Zm6.234 22c-.09-.18-4.374-2.314-3.975-6.416a6.523 6.523 0 0 1 3.194-5.351 6.667 6.667 0 0 0-5.3-2.983 5.561 5.561 0 0 0-2.359.217c-.956.261-3.109 1.1-3.7 1.138s-2.363-.979-4.264-1.247a6.381 6.381 0 0 0-3.431.615 7.489 7.489 0 0 0-3.9 4.194c-1.226 2.779-.585 7.181-.126 8.55a19.1 19.1 0 0 0 2.395 5.242 12.693 12.693 0 0 0 3.118 3.561 3.96 3.96 0 0 0 3.467.126 7.731 7.731 0 0 1 3.322-.885 8.492 8.492 0 0 1 3.352 1.011 4.27 4.27 0 0 0 3.108-.2c1.018-.414 2.491-1.986 4.21-5.171a8.978 8.978 0 0 0 .89-2.4Z"/><path fill="#fff" d="M18.213.015a6.117 6.117 0 0 0-4.374 2.2 5.96 5.96 0 0 0-1.652 4.715 5.451 5.451 0 0 0 4.656-2.359c1.8-2.522 1.433-4.483 1.369-4.556Zm6.234 22c-.09-.18-4.374-2.314-3.975-6.416a6.523 6.523 0 0 1 3.194-5.351 6.667 6.667 0 0 0-5.3-2.983 5.561 5.561 0 0 0-2.359.217c-.956.261-3.109 1.1-3.7 1.138s-2.363-.979-4.264-1.247a6.381 6.381 0 0 0-3.431.615 7.489 7.489 0 0 0-3.9 4.194c-1.226 2.779-.585 7.181-.126 8.55a19.1 19.1 0 0 0 2.395 5.242 12.693 12.693 0 0 0 3.118 3.561 3.96 3.96 0 0 0 3.467.126 7.731 7.731 0 0 1 3.322-.885 8.492 8.492 0 0 1 3.352 1.011 4.27 4.27 0 0 0 3.108-.2c1.018-.414 2.491-1.986 4.21-5.171a8.978 8.978 0 0 0 .89-2.4ZM40.155 19.538h-6.722l-1.406 4.04h-3.134l6.554-17.352h2.705l6.567 17.352h-3.146Zm-5.876-2.431h5.029l-2.515-7.2Zm22.539.155a7.678 7.678 0 0 1-1.359 4.773 4.351 4.351 0 0 1-3.647 1.782 4.38 4.38 0 0 1-3.4-1.394v6.114h-2.9V10.684h2.67l.119 1.311a4.254 4.254 0 0 1 3.468-1.549 4.4 4.4 0 0 1 3.7 1.758 7.882 7.882 0 0 1 1.341 4.88Zm-2.884-.25a5.378 5.378 0 0 0-.769-3.063 2.5 2.5 0 0 0-2.2-1.132 2.665 2.665 0 0 0-2.55 1.466v5.72a2.689 2.689 0 0 0 2.574 1.5 2.5 2.5 0 0 0 2.163-1.114 5.92 5.92 0 0 0 .782-3.377Zm15.746.25a7.677 7.677 0 0 1-1.359 4.773 4.351 4.351 0 0 1-3.647 1.782 4.38 4.38 0 0 1-3.4-1.394v6.114h-2.9V10.684h2.67l.119 1.311a4.254 4.254 0 0 1 3.478-1.55 4.4 4.4 0 0 1 3.7 1.758 7.882 7.882 0 0 1 1.341 4.88Zm-2.884-.25a5.378 5.378 0 0 0-.769-3.063 2.5 2.5 0 0 0-2.2-1.132 2.665 2.665 0 0 0-2.55 1.466v5.72a2.689 2.689 0 0 0 2.574 1.5 2.5 2.5 0 0 0 2.163-1.114 5.92 5.92 0 0 0 .783-3.377Zm7.535 6.567h-2.9V5.273h2.9Zm7.952.238a5.991 5.991 0 0 1-4.462-1.734 6.29 6.29 0 0 1-1.71-4.618v-.358a7.737 7.737 0 0 1 .745-3.45 5.669 5.669 0 0 1 2.092-2.366 5.529 5.529 0 0 1 3-.846 5.061 5.061 0 0 1 4.07 1.68 7.105 7.105 0 0 1 1.436 4.755v1.168H79.03a3.872 3.872 0 0 0 1.067 2.525 3.2 3.2 0 0 0 2.354.93 3.921 3.921 0 0 0 3.242-1.609l1.561 1.49a5.214 5.214 0 0 1-2.068 1.794 6.473 6.473 0 0 1-2.902.639Zm-.342-11.044a2.439 2.439 0 0 0-1.925.834 4.324 4.324 0 0 0-.936 2.324h5.518v-.215a3.52 3.52 0 0 0-.775-2.2 2.42 2.42 0 0 0-1.882-.743Z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="70.286" height="30"><path fill="currentColor" d="M70.287 5.397 18.866 27.291q-6.396 2.706-10.742 2.706-4.925 0-7.137-3.444a7.838 7.838 0 0 1-.82-5.617 19.82 19.82 0 0 1 3.032-7.257 70.091 70.091 0 0 1 6.727-8.2 17.929 17.929 0 0 0-2.3 5.412q-1.227 5.25 2.22 7.706a7.756 7.756 0 0 0 4.51 1.148 20.987 20.987 0 0 0 5.166-.738Z"/><path fill="#fff" d="M20.285 12.331H17.88l-3.43-8.223-1.431 8.223h-2.482L12.68 0h2.4l3.438 8.24L19.949 0h2.473Zm4.861 0h-2.481L24.799 0h2.481Zm7.046-4.921-1.626 1.508-.593 3.413h-2.481L29.63 0h2.481l-.949 5.437 1.262-1.423L36.133 0h3.235l-5.327 5.607 3.176 6.724h-2.823Zm14.2-.423h-4.723l-.576 3.3h5.556l-.356 2.041h-8.037L40.399-.003h8.02l-.364 2.058h-5.53l-.517 2.939h4.743Z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"><path fill="currentColor" d="M6.535 0A6.541 6.541 0 0 0 0 6.535v16.93A6.541 6.541 0 0 0 6.535 30h16.93A6.541 6.541 0 0 0 30 23.465V6.535A6.541 6.541 0 0 0 23.465 0Zm7.524 6.889c.268.008.213.48.015 1.009-.089.235-.834 2.287-1.731 4.75.369-.049.7-.085.977-.1.6 0 .453.454.113.794a5.878 5.878 0 0 1-1.916 1.576c-1.2 3.3-2.411 6.589-2.58 6.963-.34.756-.455.377-.908-.039s-1.019-.756-.792-1.4c.1-.269.921-2.479 1.847-4.954-1 .218-2.11.471-2.966.72-.854 2.255-1.6 4.229-1.791 4.763-.491 1.36-1.02.152-.907-.264.043-.158.72-2 1.562-4.256-1.22-.884-1.348-1-1.675-1.222s.188-.719.188-.719c.336-.112 1.271-.349 2.448-.619 1.145-3.036 2.286-6 2.464-6.295.454-.756 1.171-.454.832.416-.157.4-1.112 2.908-2.143 5.622.939-.2 1.948-.414 2.906-.594l1.843-4.915c.3-.68 1.663-1.057 2.079-1.208a.371.371 0 0 1 .134-.028Zm11.855.158c.334 0 .351.332.251.663-.114.378-2.646 13.072-2.835 14.282s-1.85-.681-1.737-1.55 1.814-9.634 1.814-9.634-3.891 8.917-4.118 9.634-.417.417-.643.19a2.738 2.738 0 0 1-1.02-1.966c.038-1.02.378-7.217.378-7.217s-2.683 8.426-2.871 9.333-1.209 1.209-.982 0 3.513-11.6 3.929-12.468 1.588-1.058 2.041-1.172.642.226.566.679-.982 8.2-.982 9.3c.982-2.531 3.665-8.426 4.118-9.068a3.269 3.269 0 0 1 1.928-.982.711.711 0 0 1 .163-.024Zm-13.15 8.513a.861.861 0 0 1 .706 1.14 2.057 2.057 0 0 1-.642.869l.152.681s.037.189.359-.17.622-.076.49.246a3.091 3.091 0 0 1-.586.756s.434.547.17.755-.529-.359-.529-.359a1.45 1.45 0 0 1-1.077.453c-.642-.038-1.114-1.53.3-2.475a3.353 3.353 0 0 1-.095-1.3.844.844 0 0 1 .752-.597Zm.007.555c-.491-.038-.152.719-.152.719.17-.114.643-.681.152-.719Zm-.378 1.985c-.775.68-.265 1.057.133.642a2.853 2.853 0 0 1-.133-.642Z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="68.182" height="30"><path fill="currentColor" d="M0 0v30h68.182V0Zm34.091 2.727C53.115 2.727 66.842 8.3 66.842 15S53.125 27.273 34.091 27.273 1.329 21.7 1.329 15 15.067 2.727 34.091 2.727Zm25.984 6.688a1.252 1.252 0 0 0-1.305 1.22.083.083 0 0 0-.011.083 1.311 1.311 0 0 0 2.621.069v-.067a1.278 1.278 0 0 0-1.257-1.3Zm-.088.248h.077a1.026 1.026 0 0 1 1.044 1.007v.048a1.046 1.046 0 1 1-2.091.059v-.067a1.009 1.009 0 0 1 .97-1.047ZM6.8 9.932a1.784 1.784 0 0 1 .146.855v8.235a1.789 1.789 0 0 1-.146.855h6.57a1.784 1.784 0 0 1-.146-.855v-8.235a1.787 1.787 0 0 1 .144-.855Zm9.428 0a1.789 1.789 0 0 1 .147.855v8.235a1.784 1.784 0 0 1-.147.855h6.038a1.787 1.787 0 0 1-.144-.855v-3.465s1.661 2.525 1.968 2.986a3.321 3.321 0 0 1 .586 1.334h7.247a5.609 5.609 0 0 1-.711-.855c-.375-.567-3.284-4.991-3.284-4.991s1.961-2.39 2.306-2.813a6.816 6.816 0 0 1 1.305-1.286h-6.3a3.6 3.6 0 0 1-.748 1.353c-.442.6-2.37 3.1-2.37 3.1v-3.6a1.781 1.781 0 0 1 .144-.855Zm16.742 0a1.781 1.781 0 0 1 .144.855v8.235a1.787 1.787 0 0 1-.144.855h11.657v-2.754a1.781 1.781 0 0 1-.855.144h-4.906v-1.306h4.714v-2.1h-4.714v-1.317h4.906a1.9 1.9 0 0 1 .855.136V9.932Zm26.6 0v1.574h.232v-.557h.336l.306.557h.258l-.336-.6a.525.525 0 0 0 .28-.461.5.5 0 0 0-.49-.509Zm-10.56.008a1.84 1.84 0 0 1-.173.858l-2.986 8.235a2.519 2.519 0 0 1-.45.855h4.98a1.946 1.946 0 0 1 .165-.855c.1-.288.2-.565.2-.565l.056-.154h3.638l.059.144.229.565a1.843 1.843 0 0 1 .192.855h6.317a2.4 2.4 0 0 1-.471-.855c-.211-.558-2.906-7.6-3.156-8.224a1.469 1.469 0 0 1-.184-.858Zm10.789.232h.346a.27.27 0 0 1 .258.288.264.264 0 0 1-.288.258v.011H59.8Zm-7.228 3.082a5.116 5.116 0 0 0 .192.653l.884 2.3h-2.079c.431-1.2.8-2.208.834-2.3a3.743 3.743 0 0 0 .173-.654Z"/></svg>
            </div>

            <h2 class="font-montserrat text-7xl font-bold text-center">
                <GradientHeading>Brands</GradientHeading>
            </h2>

            <div class="flex justify-between mt-[62px] max-w-[500px] mx-auto">
                <div class="min-w-[180px]">
                    <ul class="space-y-7 font-montserrat text-xl font-semibold">
                        <BrandListItem />
                    </ul>
                </div>
                <div class="flex items-center">
                    <div class="max-w-[250px] transform translate-x-6">
                        <span class="block">
                            <img src="/images/epick/mobile/home/iwatch.png" alt="Two Apple iWatch" class="w-full min-w-[250px]" />
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <section id="new" class="bg-white py-14 shadow-[0px_0px_0px_100vmax_rgb(255,255,255)]" style="clip-path: inset(0 -100vmax);">
            <div class="relative">
                <h2 class="font-montserrat text-7xl font-bold text-center mb-[286px]">
                    <GradientHeading bkg="bg-gradient-to-t from-white to-black from-10%">New</GradientHeading>
                </h2>
                <div class="absolute top-[100px] left-1/2 transform -translate-x-1/2 w-[288px]">
                    <img src="/images/epick/mobile/home/back-shoe.png" alt="" class="absolute left-1/2 transform -translate-x-3/4 -translate-y-3.5 w-4/5" role="presentation">
                    <img src="/images/epick/mobile/home/front-shoe.png" alt="" class="absolute left-1/2 transform -translate-x-[47%] w-full" role="presentation">
                </div>
                <p class="text-[#2E2E2E] font-roboto">Explore the wonders of Epick! Unveil new treasures every week as we handpick the latest releases to fulfill your desires. Shop with certainty, knowing we're always stocked and ready for your every need.</p>
                <Button bkg="bg-[#0F0F10]">
                    <svg slot="btnIcon" xmlns="http://www.w3.org/2000/svg" width="21.42" height="21.42"><path fill="none" stroke="currentColor" d="M10.71 5.049v-.8m0 12.138V8.441m10.21 2.269A10.21 10.21 0 1 1 10.71.5a10.21 10.21 0 0 1 10.21 10.21Z"/></svg>
                    <span slot="btnText" class="ml-2">More info</span>
                </Button>
            </div>
        </section>

        <section id="featured" class="my-28">
            <h2 class="font-montserrat text-7xl font-bold text-center">
                <GradientHeading>Featured</GradientHeading>
            </h2>

            <div class="flex flex-wrap justify-between mx-auto max-w-[372px] mt-2.5">
                {#each Array(6) as _, i}
                    <ProductCard />
                {/each}
            </div>
        </section>

        <aside id="ctaBanner">
            <div class="bg-[#181A1B] py-12 shadow-[0px_0px_0px_100vmax_rgb(24,26,27)]" style="clip-path: inset(0 -100vmax);">
                <h3 class="font-roboto text-xl">Elevate your style, click and smile</h3>
                <span class="inline-block text-[#A3A6A7] text-base pb-1">Buy Now, up to 40% off.</span>
                <Button bkg="bg-[#0F0F10]">
                    <span slot="btnText" class="ml-2">Buy now</span>
                </Button>
            </div>
        </aside>
    </main>

    <Footer />
</div>

<!--{#if cartQuantity?.quantity > 0}-->
<!--    <a href="/epick/checkout" use:inertia>-->
<!--        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">-->
<!--            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />-->
<!--        </svg>-->
<!--    </a>-->
<!--{/if}-->

<!--<h1>HOME</h1>-->

<!--<div class="space-y-4 mt-5">-->
<!--    {#await categories}-->
<!--        <p>loading categories...</p>-->
<!--    {:then categories}-->
<!--        {#each categories as {id, name, slug}, i (id)}-->
<!--            <div class="border border-gray-200 rounded p-4 my-2">-->
<!--                <a use:inertia href="/epick/products/category/{slug}"><h2 class="text-2xl font-bold">{name}</h2></a>-->
<!--            </div>-->
<!--        {/each}-->
<!--    {/await}-->
<!--</div>-->
