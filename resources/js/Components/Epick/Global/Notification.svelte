<script>
    import { fly } from "svelte/transition";
    /* svelte-ignore unused-export-let */
    export let flash;
    let msg = '';
    $: flashMessage = flash?.success || flash?.error || flash?.warning;
    $: if (flashMessage) {
        msg = flashMessage;
    }

    let type = '';
    let show = false;

    function handleFlash(flashType) {
        type = flashType.charAt(0).toUpperCase() + flashType.slice(1);
        show = true;
        let timeout = setTimeout(() => {
            show = false;
            msg = '';
            flash[flashType] = null;
            clearTimeout(timeout);
        }, 5000);
    }

    $: {
        if (flash?.success) {
            handleFlash('success');
        } else if (flash?.error) {
            handleFlash('error');
        } else if (flash?.warning) {
            handleFlash('warning');
        }
    }
</script>

{#if show}
    <div transition:fly={{ delay: 300, duration: 300, x: 400, opacity: 0 }} aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            {#if type === 'Success'}
                                <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" ><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            {:else if type === 'Error'}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
                            {:else}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                            {/if}
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">{type}!</p>
                            <p class="mt-1 text-sm text-gray-500">{msg}</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" on:click={()=>{show = false}} class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" /></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
