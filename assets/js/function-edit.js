// this is for the button for edit
var update1 = document.getElementById('edit-admin-profile');
// this is for the div id of modal_container_edit
var modal_container_1= document.getElementById('modal_container_edit');
// this is the close button inside the modal_content
var close = document.getElementById('close-edit');
// this is the update button inside the modal_content
var update = document.getElementById('update-edit');

update1.addEventListener('click', () => {
	modal_container_1.classList.add('show');
});
close.addEventListener('click', () => {
	modal_container_1.classList.remove('show');
});
update.addEventListener('click', () => {
	modal_container_1.classList.remove('show');
});