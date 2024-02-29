<script>
    import { inertia, page, router } from "@inertiajs/svelte";
    import { onMount } from "svelte";
    import { fade } from "svelte/transition";
    /* svelte-ignore unused-export-let */
    export let showSearch = false, searchResults, searchFilters;

    onMount(()=>{
        router.visit($page?.url, {
            method: 'get',
            data: {
                search: undefined
            },
            replace: true,
            preserveState: true,
            preserveScroll: true,
            only: ['searchResults']
        });
    });

    let search = searchFilters?.search || '';
    let timer;

    const debounce = v => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            visit({ search: v.length !== 0 ? v : undefined });
        }, 300);
    }

    const onKeyDown = (e) => {
        if (e.keyCode === 27) {
            showSearch = false;
        }

        if (e.ctrlKey && (e.key === 'k' || e.keyCode === 75)) {
            console.log('Control key and letter k are pressed simultaneously.');
            showSearch = !showSearch;
        }

        visit({ search: undefined });
    }

    const hideSearch = () => {
        showSearch = false;
        visit({ search: undefined });
    }

    const visit = (data = {}) => {
        router.visit($page?.url, {
            method: 'get',
            data,
            replace: true,
            preserveState: true,
            preserveScroll: true,
            only: ['searchResults']
        });
    }
    $: autofocus = showSearch ? 'autofocus' : '';
</script>

{#if showSearch}
    <div transition:fade={{ duration: 200 }} class="fixed inset-0 flex items-start justify-center pt-16 sm:pt-24" role="dialog" aria-modal="true" data-headlessui-state={showSearch ? 'open' : 'close'} style="z-index: 100;">
        <div on:keydown|self={()=>{}} on:click|self={hideSearch} class="fixed inset-0 bg-slate-900/25 backdrop-blur transition-opacity opacity-100"></div>
        <div class="relative w-full max-w-lg transform px-4 transition-all opacity-100 scale-100">
            <div class="overflow-hidden rounded-lg bg-white" data-headlessui-state={showSearch ? 'open' : 'close'}>
                <div class="relative">
                    <input on:keyup={({ target: { value } }) => debounce(value)} value={search} class="block w-full appearance-none bg-transparent py-4 pl-4 pr-12 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6 border-0 ring-0 ring-transparent focus:ring-transparent focus:outline-0 focus:border-0" style="caret-color: rgb(107, 114, 128);" placeholder="Find anything..." aria-label="Search products" role="combobox" type="text" aria-expanded="false" aria-autocomplete="list" data-headlessui-state="" tabindex="0" {autofocus}>
                    <svg class="pointer-events-none absolute right-4 top-4 h-6 w-6 fill-slate-400" xmlns="http://www.w3.org/2000/svg"><path d="M20.47 21.53a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-9.97-4.28a6.75 6.75 0 0 1-6.75-6.75h-1.5a8.25 8.25 0 0 0 8.25 8.25v-1.5ZM3.75 10.5a6.75 6.75 0 0 1 6.75-6.75v-1.5a8.25 8.25 0 0 0-8.25 8.25h1.5Zm6.75-6.75a6.75 6.75 0 0 1 6.75 6.75h1.5a8.25 8.25 0 0 0-8.25-8.25v1.5Zm11.03 16.72-5.196-5.197-1.061 1.06 5.197 5.197 1.06-1.06Zm-4.28-9.97c0 1.864-.755 3.55-1.977 4.773l1.06 1.06A8.226 8.226 0 0 0 18.75 10.5h-1.5Zm-1.977 4.773A6.727 6.727 0 0 1 10.5 17.25v1.5a8.226 8.226 0 0 0 5.834-2.416l-1.061-1.061Z"></path></svg>
                </div>
                {#await searchResults}
                    <p>loading products...</p>
                {:then results}
                    {#if results.length !== 0}
                        <ul class="max-h-[18.375rem] divide-y divide-slate-200 overflow-y-auto rounded-b-lg border-t border-slate-200 text-sm leading-6" role="listbox" data-headlessui-state="open">
                            {#each results as { id, title, slug, image, price }, i (id)}
                                <li role="option" tabindex="-1" aria-selected="false" data-headlessui-state="">
                                    <a use:inertia href="/epick/products/{slug}" class="flex items-center justify-between p-4">
                                        <img src={image} alt="" class="rounded-sm size-10 object-cover object-center">
                                        <span class="grid w-full max-w-[300px] text-right">
                                            <span class="whitespace-nowrap font-semibold text-slate-900 truncate">{title}</span>
                                            <span class="ml-4 text-right text-xs text-slate-600">${price}</span>
                                        </span>
                                    </a>
                                </li>
                            {/each}
                        </ul>
                    {/if}
                {/await}
            </div>
        </div>
    </div>
{/if}

<svelte:window on:keydown={onKeyDown} />
