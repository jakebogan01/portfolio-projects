<script>
    import Nav from "@/Components/Epick/Global/Nav.svelte";
    import Footer from "@/Components/Epick/Global/Footer/Footer.svelte";
    import CtaBanner from "@/Components/Epick/Global/CtaBanner.svelte";
    /* svelte-ignore unused-export-let */
    export let canLogin, canRegister, cartQuantity;
</script>

<div class="container sm:max-w-[1440px] overflow-hidden">
    <Nav {canLogin} {canRegister} {cartQuantity} />

    <slot />

    <CtaBanner />

    <Footer />
</div>
