<script>
    let items = [
        {
            title: 'Brands',
            link: '#'
        },
        {
            title: 'New',
            link: '#'
        },
        {
            title: 'Featured',
            link: '#'
        },
        {
            title: 'Shop',
            link: '#'
        },
    ]
</script>

{#each items as item}
    <li>
        <span class="block">
            <a href={item.link} class="text-[#BDC0C2] font-light text-[15px] hover:text-white transition-colors">{item.title}</a>
        </span>
    </li>
{/each}
