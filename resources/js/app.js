import './bootstrap';
import '../scss/app.scss';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function openDeleteModal(button) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');

    form.action = button.dataset.deleteUrl;
    modal.classList.add('is-active');
}

document.getElementById('cancelDelete')?.addEventListener('click', () => {
    document.getElementById('deleteModal').classList.remove('is-active');
});