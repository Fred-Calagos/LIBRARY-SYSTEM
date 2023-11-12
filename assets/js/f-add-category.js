var btn_add_cat= document.getElementById('add-category-modal');
var modal_container_category = document.getElementById('modal_container_category');
var close_add_cat = document.getElementById('c-cat-book');
var btn_add_c = document.getElementById('btn-cat');

btn_add_cat.addEventListener('click', () => {
	modal_container_category.classList.add('show');
});
close_add_cat.addEventListener('click', () => {
	modal_container_category.classList.remove('show');
});
btn_add_c.addEventListener('click', () => {
	modal_container_category.classList.remove('show');
}); 