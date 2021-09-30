require('@github/details-dialog-element');
require('./bootstrap');

Livewire.on('closeModals', () => {
    var modals = document.getElementsByTagName('details');
    for (let i = 0; i < modals.length; i++) {
        modals[i].open = false;
    }
});
