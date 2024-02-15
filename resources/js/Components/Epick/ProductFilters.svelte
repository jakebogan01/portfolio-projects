<script>
    import { inertia, page } from "@inertiajs/svelte";
    import { router } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let products, filters;
    $: filters = $page.props.filters;

    const filterValues = (filterValue, array) => {
        filterValue.forEach((value, i) => {
            if (array.findIndex(item => item.name === value) === -1) {
                array.push({id: i, name: value, checked: false});
            }
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

    // Gender filter
    let genderValues = [];
    let filteredGenderValues;
    filterValues(products?.data?.map(product => product.gender) ?? [], genderValues);
    $: filteredGenderValues = genderValues.filter(gender => gender.checked).map(gender => gender.name).join(',');
    genderValues = genderValues.filter(gender => gender.name !== null);

    // Age filter
    let ageValues = [];
    let filteredAgeValues;
    filterValues(products?.data?.map(product => product.age) ?? [], ageValues);
    $: filteredAgeValues = ageValues.filter(age => age.checked).map(age => age.name).join(',');
    ageValues = ageValues.filter(age => age.name !== null);

    // Style filter
    let styleValues = [];
    let filteredStyleValues;
    filterValues(products?.data?.map(product => product.style) ?? [], styleValues);
    $: filteredStyleValues = styleValues.filter(style => style.checked).map(style => style.name).join(',');
    styleValues = styleValues.filter(style => style.name !== null);

    // Brand filter
    let brandValues = [];
    let filteredBrandValues;
    filterValues(products?.data?.map(product => product.brand) ?? [], brandValues);
    $: filteredBrandValues = brandValues.filter(brand => brand.checked).map(brand => brand.name).join(',');
    brandValues = brandValues.filter(brand => brand.name !== null);

    // Shape filter
    let shapeValues = [];
    let filteredShapeValues;
    filterValues(products?.data?.map(product => product.shape) ?? [], shapeValues);
    $: filteredShapeValues = shapeValues.filter(shape => shape.checked).map(shape => shape.name).join(',');
    shapeValues = shapeValues.filter(shape => shape.name !== null);


    const handleFilterRequest = () => {
        router.visit($page?.url, {
            method: 'get',
            data: {
                price: filters?.price,
                rating: filters?.rating,
                color: filteredColorValues.length !== 0 ? filteredColorValues : undefined,
                size: filteredSizeValues.length !== 0 ? filteredSizeValues : undefined,
                gender: filteredGenderValues.length !== 0 ? filteredGenderValues : undefined,
                age: filteredAgeValues.length !== 0 ? filteredAgeValues : undefined,
                style: filteredStyleValues.length !== 0 ? filteredStyleValues : undefined,
                brand: filteredBrandValues.length !== 0 ? filteredBrandValues : undefined,
                shape: filteredShapeValues.length !== 0 ? filteredShapeValues : undefined
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
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: undefined, price: undefined, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">All</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'high', color: filters?.color}, only: ['products', 'filters']}}">Highest Price</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'low', color: filters?.color}, only: ['products', 'filters']}}">Lowest Price</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: 'popular', price: filters?.price, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">Most Popular</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: 'unpopular', price: filters?.price, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">Least Popular</option>
        </select>
    </div>

    <div class="flex space-x-4 mt-4 px-3">
        {#each colorValues as color, i (color.id)}
            <div class="flex items-center">
                <input id={'checkbox'+color.id}  name="color" bind:checked={color.checked} value={color.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for={'checkbox'+color.id} class="ml-3 text-sm text-gray-500">{color.name}</label>
            </div>
        {/each}
    </div>

    {#if sizeValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each sizeValues as size, i (size.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+size.id}  name="color" bind:checked={size.checked} value={size.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+size.id} class="ml-3 text-sm text-gray-500">{size.name}</label>
                </div>
            {/each}
        </div>
    {/if}

    {#if genderValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each genderValues as gender, i (gender.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+gender.id}  name="color" bind:checked={gender.checked} value={gender.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+gender.id} class="ml-3 text-sm text-gray-500">{gender.name}</label>
                </div>
            {/each}
        </div>
    {/if}

    {#if ageValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each ageValues as age, i (age.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+age.id}  name="color" bind:checked={age.checked} value={age.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+age.id} class="ml-3 text-sm text-gray-500">{age.name}</label>
                </div>
            {/each}
        </div>
    {/if}

    {#if styleValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each styleValues as style, i (style.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+style.id}  name="color" bind:checked={style.checked} value={style.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+style.id} class="ml-3 text-sm text-gray-500">{style.name}</label>
                </div>
            {/each}
        </div>
    {/if}

    {#if brandValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each brandValues as brand, i (brand.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+brand.id}  name="color" bind:checked={brand.checked} value={brand.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+brand.id} class="ml-3 text-sm text-gray-500">{brand.name}</label>
                </div>
            {/each}
        </div>
    {/if}

    {#if shapeValues.length > 0}
        <div class="flex space-x-4 mt-4 px-3">
            {#each shapeValues as shape, i (shape.id)}
                <div class="flex items-center">
                    <input id={'checkbox'+shape.id}  name="color" bind:checked={shape.checked} value={shape.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for={'checkbox'+shape.id} class="ml-3 text-sm text-gray-500">{shape.name}</label>
                </div>
            {/each}
        </div>
    {/if}
</form>
