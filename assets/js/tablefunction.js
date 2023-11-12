document.getElementById("update").addEventListener("click", change);

function change() {
	
document.getElementById("td_course_id").innerHTML = document.getElementById("course_id").value;
document.getElementById("td_course_name").innerHTML = document.getElementById("course_name").value;
document.getElementById("td_year_section").innerHTML = document.getElementById("year_section").value;

}