<script>
    import { inertia, page, router } from "@inertiajs/svelte";
    import {onMount} from "svelte";
    /* svelte-ignore unused-export-let */
    export let products, filters;
    $: filters = $page.props.filters;

    let titles = ['Color', 'Size', 'Gender', 'Age', 'Style', 'Brand', 'Shape'];

    onMount(()=>{
        router.visit($page?.url, {
            method: 'get',
            data: {
                price: undefined,
                rating: undefined,
                color: undefined,
                size: undefined,
                gender: undefined,
                age: undefined,
                style: undefined,
                brand: undefined,
                shape: undefined,
                search: undefined
            },
            replace: true,
            preserveState: true,
            preserveScroll: true,
            only: ['products']
        });
    });

    const filterValues = (filterValue, array) => {
        filterValue.forEach((value, i) => {
            if (array.findIndex(item => item.name === value) === -1) {
                array.push({id: i, name: value, checked: false, show: false});
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

<!--    <div class="w-[200px]">-->
<!--        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>-->
<!--        <select id="price" name="price" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">-->
<!--            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: undefined, price: undefined, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">All</option>-->
<!--            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'high', color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">Highest Price</option>-->
<!--            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'low', color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">Lowest Price</option>-->
<!--            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: 'popular', price: filters?.price, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">Most Popular</option>-->
<!--            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {rating: 'unpopular', price: filters?.price, color: filters?.color, size: filters?.size, gender: filters?.gender, age: filters?.age, style: filters?.style, brand: filters?.brand, shape: filters?.shape}, only: ['products', 'filters']}}">Least Popular</option>-->
<!--        </select>-->
<!--    </div>-->

{#each [colorValues, sizeValues, genderValues, ageValues, styleValues, brandValues, shapeValues] as values, i}
    {#if values.length > 0}
        <div class="border-b border-[#36363b] last:border-none py-6">
            <h3 class="-my-3 flow-root">
                <!-- Expand/collapse section button -->
                <button type="button" on:click={()=>{values.show = !values.show}} class="flex w-full items-center justify-between py-3 text-sm" aria-controls="filter-section-1" aria-expanded="false">
                    <span class="font-medium">{titles[i]}</span>
                    <span class="ml-6 flex items-center">
                        {#if values.show}
                            <!-- Collapse icon, show/hide based on section open state. -->
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" /></svg>
                        {:else}
                            <!-- Expand icon, show/hide based on section open state. -->
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /></svg>
                        {/if}
                    </span>
                </button>
            </h3>
            <!-- Filter section, show/hide based on section state. -->
            {#if values.show}
                <div class="pt-6" id="filter-section-1">
                    <div class="space-y-4">
                        {#each values as value (value.id)}
                            <div class="flex items-center">
                                <input id={'checkbox'+value.id} name="color" bind:checked={value.checked} value={value.name} on:change={handleFilterRequest} type="checkbox" class="h-4 w-4 rounded border-gray-300 text-[#2780EA] focus:ring-[#2f85eb]">
                                <label for={'checkbox'+value.id} class="ml-3 text-sm text-gray-300">{value.name}</label>
                            </div>
                        {/each}
                    </div>
                </div>
            {/if}
        </div>
    {/if}
{/each}
