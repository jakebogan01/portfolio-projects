<script>
    import { inertia } from "@inertiajs/svelte";

    let items = [
        {
            title: 'Brands',
            link: '/epick#brands'
        },
        {
            title: 'New',
            link: '/epick#new'
        },
        {
            title: 'Featured',
            link: '/epick#featured'
        },
        {
            title: 'Shop',
            link: '/epick/category'
        },
    ]
</script>

{#each items as item}
    <li>
        <span class="block">
            <a use:inertia href={item.link} class="text-[#BDC0C2] font-light text-[15px] sm:hover:text-white transition-colors">{item.title}</a>
        </span>
    </li>
{/each}
