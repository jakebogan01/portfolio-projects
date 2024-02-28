<script>
    import { inertia, Link, page } from "@inertiajs/svelte";
    /* svelte-ignore unused-export-let */
    export let canLogin, canRegister, cartQuantity;

    let showMobileMenu = false;
</script>

<nav class="flex justify-between items-center py-5 text-white md:text-right">
    <div class="hidden md:block">
        <a use:inertia href="/epick" class="inline-block">
            <span class="sr-only">Epick</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="87.576" height="20.974"><g fill="#fff"><path d="M70.577.025h1.579v13.189L85.072.025h1.925l-9.1 9.535 9.678 11.212h-1.886l-8.84-10.113-4.693 4.731v5.382h-1.579ZM65.656 2.768l-1.045 1.021a7.964 7.964 0 0 0-5.208-2.469 12.237 12.237 0 0 0-4.506.463 9.5 9.5 0 0 0-3.556 2.233 9.7 9.7 0 0 0-2.353 6.707 8.671 8.671 0 0 0 3.777 7.125 8 8 0 0 0 5.254 1.693 17.249 17.249 0 0 0 2.875-.341 6.478 6.478 0 0 0 3.688-2.193l1.075 1.045a9.5 9.5 0 0 1-4.762 2.589 11.06 11.06 0 0 1-10.936-3.262 9.6 9.6 0 0 1-2.446-6.658 10.016 10.016 0 0 1 5.382-9.526 13.491 13.491 0 0 1 7.33-1.1 10.2 10.2 0 0 1 5.431 2.673ZM40.63.025h1.579v20.747H40.63ZM19.838.025s9.068.05 9.45.072a4.523 4.523 0 0 1 1.143.195 7.882 7.882 0 0 1 2.614 1.333 5.948 5.948 0 0 1 2.46 5.495 6.893 6.893 0 0 1-2.742 5.511 8.184 8.184 0 0 1-2.733 1.122c-.209.062-1.251.189-1.414.2s-7.209.1-7.209.1v6.851l-1.569-.142v-8.133h8.792a6.547 6.547 0 0 0 3.508-1.206 4.92 4.92 0 0 0 2.075-4.563 5 5 0 0 0-2.238-4.241 5.884 5.884 0 0 0-2.03-1.037 6.877 6.877 0 0 0-1.477-.194c-.326-.031-8.63-.04-8.63-.04ZM0 .025h13.4v1.324H0ZM0 9.562h13.4v1.324H0ZM0 19.481h13.4v1.324H0Z"/></g></svg>
        </a>
    </div>
    <button type="button" on:click={()=>{showMobileMenu = true}} class="lg:hidden -m-2.5 md:m-2.5 p-2 text-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg height="20" width="4" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><circle cx="2" cy="2" r="2"/><circle cx="2" cy="10" r="2"/><circle cx="2" cy="18" r="2"/></g></svg>
    </button>
    <ul class="hidden lg:flex items-center space-x-[57px] font-montserrat font-light">
        <li>
            <a use:inertia href="/epick">Home</a>
        </li>
        <li>
            <a use:inertia={{replace: false}} href="/epick#brands">Brands</a>
        </li>
        <li>
            <a use:inertia={{replace: false}} href="/epick#new">New</a>
        </li>
        <li>
            <a use:inertia={{replace: false}} href="/epick#featured">Featured</a>
        </li>
        <li>
            <a use:inertia href="/epick/category" class="flex items-center justify-center bg-[#1E1E21] text-white text-sm md:text-base font-light font-montserrat py-4 px-14 w-full sm:w-max rounded md:rounded-lg">
                Shop
            </a>
        </li>
        <li>
            <a use:inertia href="/epick/checkout">
                {#if cartQuantity?.quantity > 0}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" /></svg>
                {:else}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                {/if}
            </a>
        </li>
        <li>
            {#if canLogin}
                {#if $page?.props.auth.user}
                    <button type="button" use:inertia={{ href: '/epick/logout', method: 'post' }} class="mt-2">
                        <span class="sr-only">logout</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" /></svg>
                    </button>
                {:else}
                    <Link href="/epick/login">
                        <span class="sr-only">login</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                    </Link>
                {/if}
            {/if}
        </li>
    </ul>
</nav>

{#if showMobileMenu}
    <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
        <!--
          Off-canvas menu backdrop, show/hide based on off-canvas menu state.

          Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-900/80"></div>

        <div class="fixed inset-0 flex">
            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative mr-16 flex w-full max-w-xs flex-1">
                <!--
                  Close button, show/hide based on off-canvas menu state.

                  Entering: "ease-in-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                    <button type="button" on:click={()=>{showMobileMenu = false}} class="-m-2.5 p-2.5">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#0F0F10] px-6 pb-4">
                    <div class="flex h-16 shrink-0 items-center">
                        <a use:inertia href="/epick" on:click={()=>{showMobileMenu = false}} class="inline-block">
                            <span class="sr-only">Epick</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="87.576" height="20.974"><g fill="#fff"><path d="M70.577.025h1.579v13.189L85.072.025h1.925l-9.1 9.535 9.678 11.212h-1.886l-8.84-10.113-4.693 4.731v5.382h-1.579ZM65.656 2.768l-1.045 1.021a7.964 7.964 0 0 0-5.208-2.469 12.237 12.237 0 0 0-4.506.463 9.5 9.5 0 0 0-3.556 2.233 9.7 9.7 0 0 0-2.353 6.707 8.671 8.671 0 0 0 3.777 7.125 8 8 0 0 0 5.254 1.693 17.249 17.249 0 0 0 2.875-.341 6.478 6.478 0 0 0 3.688-2.193l1.075 1.045a9.5 9.5 0 0 1-4.762 2.589 11.06 11.06 0 0 1-10.936-3.262 9.6 9.6 0 0 1-2.446-6.658 10.016 10.016 0 0 1 5.382-9.526 13.491 13.491 0 0 1 7.33-1.1 10.2 10.2 0 0 1 5.431 2.673ZM40.63.025h1.579v20.747H40.63ZM19.838.025s9.068.05 9.45.072a4.523 4.523 0 0 1 1.143.195 7.882 7.882 0 0 1 2.614 1.333 5.948 5.948 0 0 1 2.46 5.495 6.893 6.893 0 0 1-2.742 5.511 8.184 8.184 0 0 1-2.733 1.122c-.209.062-1.251.189-1.414.2s-7.209.1-7.209.1v6.851l-1.569-.142v-8.133h8.792a6.547 6.547 0 0 0 3.508-1.206 4.92 4.92 0 0 0 2.075-4.563 5 5 0 0 0-2.238-4.241 5.884 5.884 0 0 0-2.03-1.037 6.877 6.877 0 0 0-1.477-.194c-.326-.031-8.63-.04-8.63-.04ZM0 .025h13.4v1.324H0ZM0 9.562h13.4v1.324H0ZM0 19.481h13.4v1.324H0Z"/></g></svg>
                        </a>
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="-mx-2 space-y-1 font-montserrat">
                                    <li>
                                        <!-- Current: "bg-indigo-700 text-white", Default: "text-indigo-200 hover:text-white hover:bg-indigo-700" -->
                                        <a use:inertia href="/epick" on:click={()=>{showMobileMenu = false}} class="bg-[#1e1e21] text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a use:inertia={{replace: false}} href="/epick#brands" on:click={()=>{showMobileMenu = false}} class="text-gray-400 hover:text-white hover:bg-[#1e1e21] group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                            Brands
                                        </a>
                                    </li>
                                    <li>
                                        <a use:inertia={{replace: false}} href="/epick#new" on:click={()=>{showMobileMenu = false}} class="text-gray-400 hover:text-white hover:bg-[#1e1e21] group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                            New
                                        </a>
                                    </li>
                                    <li>
                                        <a use:inertia={{replace: false}} href="/epick#featured" on:click={()=>{showMobileMenu = false}} class="text-gray-400 hover:text-white hover:bg-[#1e1e21] group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                            Feature
                                        </a>
                                    </li>
                                    <li>
                                        <a use:inertia href="/epick/category" on:click={()=>{showMobileMenu = false}} class="text-gray-400 hover:text-white hover:bg-[#1e1e21] group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                            Shop
                                        </a>
                                    </li>
                                    <li>
                                        {#if canLogin}
                                            {#if $page?.props.auth.user}
                                                <button type="button" on:click={()=>{showMobileMenu = false}} use:inertia={{ href: '/epick/logout', method: 'post' }} class="text-white font-semibold hover:bg-[#1e1e21] group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                                    Logout
                                                </button>
                                            {:else}
                                                <a use:inertia href="/epick/login" on:click={()=>{showMobileMenu = false}} class="text-white font-semibold hover:bg-[#1e1e21] group flex gap-x-3 rounded-md p-2 text-sm leading-6">
                                                    Login
                                                </a>
                                            {/if}
                                        {/if}
                                    </li>
                                </ul>
                            </li>
                            <li class="mt-auto">
                                <a use:inertia href="/epick/checkout" on:click={()=>{showMobileMenu = false}} class="text-gray-400 hover:text-white hover:bg-[#1e1e21] group flex gap-x-3 rounded-md pr-2 py-2 text-sm leading-6">
                                    {#if cartQuantity?.quantity > 0}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" /></svg>
                                    {:else}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                                    {/if}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
{/if}
