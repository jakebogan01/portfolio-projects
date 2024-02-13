<script context="module">
    export {default as layout} from "../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page } from "@inertiajs/svelte";
    export let canLogin;
    export let canRegister;
    export let laravelVersion;
    export let phpVersion;
</script>

<svelte:head>
    <title>Epick | Home</title>
</svelte:head>

<h1>Epick home</h1>

{#if canLogin}
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        {#if $page.props.auth.user}
            <Link
                href="/dashboard"
                class="text-sm text-gray-700 underline dark:text-white"
            >
                Dashboard
            </Link>
        {:else}
            <Link
                href="/login"
                class="text-sm text-gray-700 underline dark:text-white"
            >
                Log in
            </Link>

            {#if canRegister}
                <Link
                    href="/register"
                    class="ml-4 text-sm text-gray-700 underline dark:text-white"
                >
                    Register
                </Link>
            {/if}
        {/if}
    </div>
{/if}
