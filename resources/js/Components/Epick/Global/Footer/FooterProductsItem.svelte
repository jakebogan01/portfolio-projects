<script>
    let items = [
        {
            title: 'Electronics',
            link: '#'
        },
        {
            title: 'Clothes',
            link: '#'
        },
        {
            title: 'Shoes',
            link: '#'
        },
        {
            title: 'Furniture',
            link: '#'
        },
    ]
</script>

{#each items as item}
    <li>
        <span class="block">
            <a href={item.link} class="text-[#BDC0C2] font-light text-[15px] sm:hover:text-white transition-colors">{item.title}</a>
        </span>
    </li>
{/each}
