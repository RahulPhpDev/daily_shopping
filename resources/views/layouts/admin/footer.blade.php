

<script src ="{{ URL::asset('admin-assets/js/plugins.js') }}"/></script>
<script src ="{{ URL::asset('admin-assets/js/search.js') }}"/></script>
<script src ="{{ URL::asset('admin-assets/js/custom-script.js') }}"/></script>
<script src ="{{ URL::asset('admin-assets/js/customizer.js') }}"/></script>
<script src ="{{ URL::asset('admin-assets/js/advance-ui-modals.js') }}"/></script>
<script src ="{{ URL::asset('admin-assets/js/advance-ui-toasts.js') }}"/></script>



@livewireScripts

<script>


    $("#editModal").on('close', function (e) {
        Livewire.emit('resetInputFields')
    });

    window.livewire.on('showCreatedUpdatedToast', (msg) => {
        M.toast({html: msg, classes: 'rounded'});
    });

    window.livewire.on('modalFadeOut', () => {
        $('#createModal').modal('close');
        $('#editModal').modal('close');
    });
</script>


</body>

</html>
