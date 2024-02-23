<script>
    import FooterSocialItem from "@/Components/Epick/Global/Footer/FooterSocialItem.svelte";
    import FooterSupportItem from "@/Components/Epick/Global/Footer/FooterSupportItem.svelte";
    import FooterProductsItem from "@/Components/Epick/Global/Footer/FooterProductsItem.svelte";
    import Input from "@/Components/Epick/Global/FormFields/Input.svelte";
</script>

<footer class="relative mt-28 md:mt-48 mb-6 lg:mt-[188px]">
    <div class="flex justify-between flex-col md:flex-row md:space-x-20 lg:space-x-40">
        <div class="flex-1 flex md:justify-between md:max-w-[350px]">
            <div class="mr-6 md:mr-0">
                <a href="index.html" class="mt-1 inline-block transform scale-[0.75] text-white transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="logo-svg transform hover:transition-transform duration-700" style="transform-style: preserve-3d" width="28.99" height="28.875"><path fill="#aeaeae" d="M0 1.344v27.53h27.531V1.344Z"/><path fill="#0f0f10" d="M18.845 13.839a.9.9 0 0 0-1.235.39l-1.18 2.407a.2.2 0 0 1-.38-.088V9.862a.73.73 0 0 0-.763-.684.71.71 0 0 0-.741.684v4.467a.321.321 0 0 1-.308.324.314.314 0 0 1-.32-.314V8.493a.714.714 0 0 0-1.426 0v5.836a.321.321 0 0 1-.308.324.314.314 0 0 1-.32-.314v-4.93a.71.71 0 0 0-.741-.684.734.734 0 0 0-.741.713v5.347a.321.321 0 0 1-.308.324.314.314 0 0 1-.32-.314v-3.564a.714.714 0 0 0-1.426 0v6.16c0 3.348 2.053 5.019 4.563 5.019h.456c2.509 0 3.3-1.129 3.878-2.509l1.959-4.819a.941.941 0 0 0-.339-1.243Z"/><path fill="#fff" d="M1.409 0v27.577h27.582V0Z"/><path fill="#0f0f10" d="M16.292 5.922c.009-1.468-.636-1.777-1.19-1.777s-1.027.262-1.09 1.777-.259 6.959-.4 7.3-4.037 1.658-4.709 2.025a2.072 2.072 0 0 0-1.039 1.738c.021.573 1.088 6.173 1.209 6.477a2.843 2.843 0 0 0 .582 1.012 1.3 1.3 0 0 0 .687.383c.251.059 5.231.237 5.575.119a2.476 2.476 0 0 0 .825-.36c.4-.259.35-.345.7-.8s3.91-6.935 4.292-7.594a1.024 1.024 0 0 0-.127-1.406.915.915 0 0 0-1.328.122 20.826 20.826 0 0 1-2.371 2.246c-.587.382-1.273-.288-1.306-.653s-.319-9.142-.31-10.609Z"/><path fill="#0f0f10" d="M15.154 2.671a2.511 2.511 0 0 1 2.539 1.979 2.511 2.511 0 0 1-.626 2.341 9.629 9.629 0 0 0-.237-2.464 1.794 1.794 0 0 0-1.676-1.086 1.751 1.751 0 0 0-1.721 1.086 6.683 6.683 0 0 0-.182 2.423 2.6 2.6 0 0 1-.746-2.3 2.622 2.622 0 0 1 2.649-1.979ZM8.462 2.519a2.737 2.737 0 1 1-2.737 2.737 2.737 2.737 0 0 1 2.737-2.737ZM21.966 2.519a2.737 2.737 0 1 1-2.737 2.737 2.737 2.737 0 0 1 2.737-2.737Z"/></svg>
                </a>
            </div>
            <div class="mr-6 md:mr-0">
                <h4 class="font-semibold text-xl mb-4">Products</h4>
                <ul class="space-y-2">
                    <FooterProductsItem />
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-xl mb-4">Support</h4>
                <ul class="space-y-2">
                    <FooterSupportItem />
                </ul>
            </div>
        </div>
        <div class="flex-1 mt-5 md:mt-0 md:max-w-[500px]">
            <form on:submit|preventDefault id="emailForm" class="flex items-center justify-between bg-[#181A1B] rounded-lg py-2 px-4">
                <div class="flex-1 mr-2">
                    <label for="email" class="sr-only">Email</label>
                    <Input type="email" name="email" id="email" placeholder="Email"/>
                </div>

                <button type="submit" class="relative group flex bg-[#0A0A0B] min-w-[8.125rem] w-[130px] h-[51px] rounded-lg overflow-hidden border border-transparent sm:hover:border-[#3F3F45] transition-all duration-700" style="will-change: transform">
                    <span class="flex justify-center items-center h-full w-full sm:transform sm:group-hover:-translate-x-[14px] transition-transform cursor-pointer duration-700"> Subscribe </span>
                    <span class="absolute top-0 -right-[30px] sm:group-hover:-right-0 h-full flex justify-center items-center px-1.5 bg-[#29292D] transition-all cursor-pointer duration-700">
                        <svg width="18" height="16" fill="none" stroke="#ffffff" xmlns="http://www.w3.org/2000/svg"><path d="M7.434 8H3L1.518 2.101a.496.496 0 0 1-.018-.105c-.016-.54.58-.915 1.095-.668L16.5 8 2.595 14.672c-.51.245-1.098-.12-1.095-.65a.495.495 0 0 1 .025-.14l1.1-3.632" stroke-width="2.083" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </span>
                </button>
            </form>

            <div class="flex items-center justify-between mt-6">
                <ul class="flex space-x-5">
                    <FooterSocialItem />
                </ul>

                <div class="sm:transform sm:hover:-translate-y-1 transition-transform duration-700">
                    <a href="#home" class="flex justify-center items-center bg-[#181A1B] sm:hover:bg-white rounded w-9 h-9 group transition-colors">
                        <svg width="16" height="10" class="sm:group-hover:stroke-black transition-colors" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.333 8.5 8 1.833 14.666 8.5" stroke-width="2.083" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
