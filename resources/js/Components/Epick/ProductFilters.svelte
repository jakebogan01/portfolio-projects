<script>
    import { inertia, page } from "@inertiajs/svelte";
</script>

<form >
    <div class="w-[200px]">
        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
        <select id="price" name="price" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'high'}, only: ['products']}}">Highest Price</option>
            <option use:inertia="{{href: $page?.url, method: 'get', replace: true, preserveState: true, preserveScroll: true, data: {price: 'low'}, only: ['products']}}">Lowest Price</option>
        </select>
    </div>
</form>
