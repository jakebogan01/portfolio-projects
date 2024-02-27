<script context="module">
    export {default as layout} from "../../../../Layouts/Epick/MainLayout.svelte";
</script>

<script>
    import { Link, page, inertia } from "@inertiajs/svelte";
    import Header from "@/Components/Epick/Global/Header.svelte";
    import GradientHeading from "@/Components/Epick/Global/GradientHeading.svelte";
    import SearchButton from "@/Components/Epick/Global/Search/SearchButton.svelte";
    import Search from "@/Components/Epick/Global/Search/Search.svelte";
    /* svelte-ignore unused-export-let */
    export let categories, searchResults, searchFilters;
    let showSearch = false;
</script>

<svelte:head>
    <title>Epick | Category</title>
</svelte:head>

<Search {showSearch} {searchResults} {searchFilters} />

<main>
    <div class="flex justify-center lg:justify-start max-w-[1198px] mx-auto">
        <Header addBtn={false} addImg={false}>
            <span slot="headingText">
                <GradientHeading>Choose</GradientHeading>
                <br>
                <span class="text-4xl md:text-7xl sm:ml-[72px]">A Category</span>
            </span>
            <span slot="introText">
                Explore our diverse range of high-quality products across multiple categories. We prioritize excellence, ensuring you receive only the finest items. Choose quality, choose satisfaction with us.
            </span>
        </Header>

        <SearchButton on:click={()=>{showSearch = !showSearch}} />
    </div>

    <section id="categories" class="my-28 md:mb-48">
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-x-4 sm:max-w-[580px] xl:max-w-[1220px] mx-auto mt-2.5 1440:mt-14">
            {#await categories}
                <p>loading categories...</p>
            {:then categories}
                {#each categories as {id, name, slug}, i (id)}
                    <a use:inertia href="/epick/products/category/{slug}" class="flex flex-col justify-end max-w-[260px] max-h-[220px] w-full mx-auto bg-[#181A1B] px-3 py-3 rounded-lg mt-28 sm:mt-20">
                        <div class="flex justify-center">
                            <div class="w-[210px] mb-4">
                                <img src="/images/epick/mobile/category/clothes.png" alt="headphone" class="w-full" />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <span class="block font-montserrat text-[#BDC0C2]">{name}</span>
                            <div class="text-[#54585a]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24.802" height="24"><path fill="currentColor" d="M.528.528a1.8 1.8 0 0 0 0 2.549L9.451 12 .528 20.923a1.802 1.802 0 1 0 2.549 2.549l10.2-10.2a1.8 1.8 0 0 0 0-2.549L3.077.523A1.8 1.8 0 0 0 .528.528Z"/><path fill="currentColor" d="M11.528.528a1.8 1.8 0 0 0 0 2.549L20.451 12l-8.923 8.923a1.802 1.802 0 1 0 2.549 2.549l10.2-10.2a1.8 1.8 0 0 0 0-2.549l-10.2-10.2a1.8 1.8 0 0 0-2.549.005Z"/></svg>
                            </div>
                        </div>
                    </a>
                {/each}
            {/await}
        </div>
    </section>
</main>
