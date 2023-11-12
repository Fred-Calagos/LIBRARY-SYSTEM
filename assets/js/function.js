var edit = document.getElementById('add-admin-profile');
var modal_container = document.getElementById('modal_container');
var close = document.getElementById('close');
var update = document.getElementById('update');

edit.addEventListener('click', () => {
	modal_container.classList.add('show');
});
close.addEventListener('click', () => {
	modal_container.classList.remove('show');
});

update.addEventListener('click', () => {
	modal_container.classList.remove('show');
});
