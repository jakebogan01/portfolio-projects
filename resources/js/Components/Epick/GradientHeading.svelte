<script>
    /* svelte-ignore unused-export-let */
    export let margin = '';
    /* svelte-ignore unused-export-let */
    export let bkg = 'bg-gradient-to-t from-black to-[#87878F] from-10%';
</script>

<span class="{margin} {bkg} bg-clip-text" style="-webkit-text-fill-color: transparent;"><slot /></span>
