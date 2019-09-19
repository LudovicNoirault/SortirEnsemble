/* lol je skrypte */
function burgerActivate(){
	let navbox = document.getElementById('header-nav-box');
	let dasBurger = document.getElementById('header-burger');
	if (navbox.style.right == '-20rem') {
		navbox.style.right = '0rem';
		dasBurger.style.top = '10%';
	}
	else {
		navbox.style.right = '-20rem';
		dasBurger.style.top = '0%';
	}
}
let burger = document.getElementById('header-burger');
burger.addEventListener("click", burgerActivate);