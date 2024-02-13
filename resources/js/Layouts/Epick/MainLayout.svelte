<script>
    import { inertia } from "@inertiajs/svelte";
</script>

<nav>
    <a href="/epick" use:inertia>Home</a>
</nav>

<h1>Epick main layout</h1>

<slot />
