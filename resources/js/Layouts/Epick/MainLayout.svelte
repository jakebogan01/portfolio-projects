<script>
    import {inertia, Link, page} from "@inertiajs/svelte";
    import Search from "@/Components/Epick/Global/Search.svelte";
    import Nav from "@/Components/Epick/Global/Nav.svelte";
    import Footer from "@/Components/Epick/Global/Footer/Footer.svelte";
    /* svelte-ignore unused-export-let */
    export let searchResults, searchFilters, flash, canLogin, canRegister;
</script>

<!--{#if flash.message}-->
<!--    <div class="text-center text-blue-500 dark:text-blue-400 font-bold pb-4">{flash.message}</div>-->
<!--{/if}-->

<!--{#if flash.success}-->
<!--    <div class="text-center text-green-500 dark:text-blue-400 font-bold pb-4">{flash.success}</div>-->
<!--{/if}-->

<!--{#if flash.error}-->
<!--    <div class="text-center text-red-500 dark:text-blue-400 font-bold pb-4">{flash.error}</div>-->
<!--{/if}-->

<!--{#if canLogin}-->
<!--    <div class="fixed top-0 right-0 px-6 py-4">-->
<!--        {#if $page?.props.auth.user}-->
<!--            <button-->
<!--                type="button"-->
<!--                use:inertia={{ href: '/epick/logout', method: 'post' }}-->
<!--                class="text-sm text-gray-700 underline dark:text-white"-->
<!--            >-->
<!--                Logout-->
<!--            </button>-->
<!--        {:else}-->
<!--            <Link-->
<!--                href="/epick/login"-->
<!--                class="text-sm text-gray-700 underline dark:text-white"-->
<!--            >-->
<!--                Log in-->
<!--            </Link>-->

<!--            {#if canRegister}-->
<!--                <Link-->
<!--                    href="/epick/register"-->
<!--                    class="ml-4 text-sm text-gray-700 underline dark:text-white"-->
<!--                >-->
<!--                    Register-->
<!--                </Link>-->
<!--            {/if}-->
<!--        {/if}-->
<!--    </div>-->
<!--{/if}-->

<!--<Search {searchFilters} {searchResults} />-->

<div class="container sm:max-w-[1440px] overflow-hidden">
    <Nav {canLogin} {canRegister}/>

    <slot />

    <Footer />
</div>
