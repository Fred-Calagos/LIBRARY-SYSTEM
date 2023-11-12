var btn_edit_s= document.getElementById('edit-book-modal');
var modal_container_book_update= document.getElementById('modal_container_book_update');
var close_update = document.getElementById('c-edit-book');
var btn_update1 = document.getElementById('btn-edit');

btn_edit_s.addEventListener('click', () => {
	modal_container_book_update.classList.add('show');

});
close_update.addEventListener('click', () => {
	modal_container_book_update.classList.remove('show');
});
btn_update1.addEventListener('click', () => {
	modal_container_book_update.classList.remove('show');
});
  