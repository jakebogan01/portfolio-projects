<script>
    import Nav from "@/Components/Epick/Global/Nav.svelte";
    import Footer from "@/Components/Epick/Global/Footer/Footer.svelte";
    import CtaBanner from "@/Components/Epick/Global/CtaBanner.svelte";
    import Notification from "@/Components/Epick/Global/Notification.svelte";
    import {onMount} from "svelte";
    /* svelte-ignore unused-export-let */
    export let canLogin, canRegister, cartQuantity, flash;

    onMount(() => {
        const handleOnMouseMove = e => {
            const { currentTarget: target } = e;

            const rect = target.getBoundingClientRect(),
                    x = e.clientX - rect.left,
                    y = e.clientY - rect.top;

            target.style.setProperty("--mouse-x", `${x}px`);
            target.style.setProperty("--mouse-y", `${y}px`);
        }

        for(const light of document.querySelectorAll(".light")) {
            light.onmousemove = e => handleOnMouseMove(e);
        }
    });
</script>

<div class="container light h-max sm:max-w-[1440px] overflow-hidden">
    <Nav {canLogin} {canRegister} {cartQuantity} />

    <main>
        <slot />
    </main>

    <CtaBanner />

    <Footer />

    <Notification {flash} />
</div>
