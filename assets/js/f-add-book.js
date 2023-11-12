var btn_add_s= document.getElementById('add-book-modal');
var modal_container_book= document.getElementById('modal_container_book');
var close_add = document.getElementById('c-add-book');
var btn_add = document.getElementById('btn-add');

btn_add_s.addEventListener('click', () => {
	modal_container_book.classList.add('show');
});
close_add.addEventListener('click', () => {
	modal_container_book.classList.remove('show');
});
btn_add.addEventListener('click', () => {
	modal_container_book.classList.remove('show');
});