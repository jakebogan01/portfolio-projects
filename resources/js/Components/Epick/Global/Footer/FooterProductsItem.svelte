<script>
    import { inertia } from "@inertiajs/svelte";

    let items = [
        {
            title: 'Electronics',
            link: '/epick/products/category/electronics'
        },
        {
            title: 'Clothes',
            link: '/epick/products/category/clothes'
        },
        {
            title: 'Shoes',
            link: '/epick/products/category/shoes'
        },
        {
            title: 'Furniture',
            link: '/epick/products/category/furniture'
        },
    ]
</script>

{#each items as item}
    <li>
        <span class="block">
            <a use:inertia={{onSuccess: page => {window.scrollTo({ top: 0, left: 0, behavior: 'instant' })}}} href={item.link} class="text-[#BDC0C2] font-light text-[15px] sm:hover:text-white transition-colors">{item.title}</a>
        </span>
    </li>
{/each}
