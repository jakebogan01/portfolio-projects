<script>
    import { inertia, page } from "@inertiajs/svelte";
    import { router } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let products;
    /* svelte-ignore unused-export-let */
    export let filters;
    $: filters = $page.props.filters;

    const filterValues = (filterValue, array) => {
        filterValue.forEach((value, i) => {
            array.push({id: i, name: value, 'checked': false});
        });
    }

    // Color filter
    let colorValues = [];
    let filteredColorValues;
    filterValues(products?.data?.map(product => product.color) ?? [], colorValues);
    $: filteredColorValues = colorValues.filter(color => color.checked).map(color => color.name).join(',');

    // Size filter
    let sizeValues = [];
    let filteredSizeValues;
    filterValues(products?.data?.map(product => product.size) ?? [], sizeValues);
    $: filteredSizeValues = sizeValues.filter(size => size.checked).map(size => size.name).join(',');
    sizeValues = sizeValues.filter(size => size.name !== null);

    const handleFilterRequest = (filterType, filterValue) => {
        router.visit($page?.url, {
            method: 'get',
            data: {
                [filterType]: filterValue,
                price: filters?.price
            },
            replace: true,
            preserveState: true,
            preserveScroll: true,
            only: ['products', 'filters']
        });
    }
</script>

<form >
    <div class="w-[200px]">
        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
        <select id="price" name="price" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: undefined, color: filters?.color}, only: ['products', 'filters']}}">All</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'high', color: filters?.color}, only: ['products', 'filters']}}">Highest Price</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'low', color: filters?.color}, only: ['products', 'filters']}}">Lowest Price</option>
        </select>
    </div>

    <div class="flex space-x-4 mt-4 px-3">
        {#each colorValues as color, i (color.id)}
            <div class="flex items-center">
                <input id={'checkbox'+color.id}  name="color" bind:checked={color.checked} value={color.name} on:change={()=>{handleFilterRequest('color', filteredColorValues.length !== 0 ? filteredColorValues : undefined)}} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for={'checkbox'+color.id} class="ml-3 text-sm text-gray-500">{color.name}</label>
            </div>
        {/each}
    </div>

    {#if sizeValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each sizeValues as size, i (size.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+size.id}  name="color" bind:checked={size.checked} value={size.name} on:change={()=>{handleFilterRequest('size', filteredSizeValues.length !== 0 ? filteredSizeValues : undefined)}} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+size.id} class="ml-3 text-sm text-gray-500">{size.name}</label>
                </div>
            {/each}
        </div>
    {/if}
</form>
