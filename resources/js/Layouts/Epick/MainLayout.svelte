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

<style>
    .light:hover::before {
        opacity: 1;
    }
    .light::before {
        background: radial-gradient(800px circle at var(--mouse-x) var(--mouse-y), rgba(255, 255, 255, 0.05), transparent 40%);
        border-radius: inherit;
        content: "";
        height: 100%;
        left: 0;
        opacity: 0;
        position: absolute;
        top: 0;
        transition: opacity 500ms;
        width: 100%;
        z-index: -100;
    }
    @media (max-width: 1024px) {
        .light::before {
            content: none;
        }
    }
</style>
