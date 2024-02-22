<script>
    /* svelte-ignore unused-export-let */
    export let type = 'text';
    /* svelte-ignore unused-export-let */
    export let name;
    /* svelte-ignore unused-export-let */
    export let id;
    /* svelte-ignore unused-export-let */
    export let placeholder = '';
</script>

<input
    type={type}
    name={name}
    id={id}
    class="block w-full outline-none outline-0 border-none border-0 border-transparent bg-transparent caret-white placeholder-[#BDC0C2] focus:border-transparent focus:bg-transparent focus:text-white focus:placeholder-gray-500 focus:outline-none focus:ring-0 focus:ring-transparent focus:placeholder:text-transparent font-light text-[15px]"
    placeholder={placeholder}
    required />
