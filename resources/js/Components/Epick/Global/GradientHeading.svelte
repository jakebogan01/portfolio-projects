<script>
    /* svelte-ignore unused-export-let */
    export let styles = '';
    /* svelte-ignore unused-export-let */
    export let bkg = 'bg-gradient-to-t from-black to-[#87878F] from-10%';
</script>

<span class="{styles} {bkg} bg-clip-text whitespace-nowrap" style="-webkit-text-fill-color: transparent;"><slot /></span>
