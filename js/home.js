document.addEventListener("DOMContentLoaded", () => {
	const nav = document.querySelector("#headerContainer .rightSide nav .hamburger");
	const list = document.querySelector("#headerContainer .rightSide nav .menu");
	const social = document.querySelector("#headerContainer .rightSide nav .social");
	const wrapper = document.querySelector("#headerWrapper .rightSide nav .menuWrapper");
	const join = document.querySelector("#headerContainer .rightSide nav .socialJoinContainer");
	const slider = document.querySelector("main .carousselContainer");

	console.log(nav);
	console.log(list);

	nav.addEventListener("click", () => {
		list.classList.toggle("open");
		social.classList.toggle("open");
		join.classList.toggle("open");
		wrapper.classList.toggle("background");
	
	});

});