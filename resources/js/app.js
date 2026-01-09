import './bootstrap';
import '../scss/app.scss';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const modal = document.getElementById('deleteModal');
let deleteForm = null;

document.querySelectorAll('.js-delete-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        deleteForm = btn.closest('form');
        modal.classList.add('is-active');
    });
});

document.getElementById('cancelDelete')?.addEventListener('click', () => {
    modal.classList.remove('is-active');
    deleteForm = null;
});

modal.querySelector('.modal__overlay')?.addEventListener('click', () => {
    modal.classList.remove('is-active');
    deleteForm = null;
});

document.getElementById('confirmDelete')?.addEventListener('click', () => {
    deleteForm?.submit();
});

