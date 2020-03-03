document.addEventListener("DOMContentLoaded", () => {
	const quantityInputs = document.querySelectorAll(".quantity");
	const deleteInputs = document.querySelectorAll(".deleteProduct");

	const table = document.getElementById("productContainer");
	const productRow = document.querySelectorAll(".productRow");
	const tableRow = document.querySelectorAll(".tableRow");
	const trLastId = productRow[productRow.length-1].dataset.product_id;

	console.log(quantityInputs);
	console.log(deleteInputs);

	for(let input of quantityInputs) {
		input.addEventListener("change", () => {
			//console.log("quantidade",input.value);
			//console.log("product_id",input.parentNode.parentNode.dataset.product_id);
			const quantity = input.value;
			const product_id = input.parentNode.parentNode.dataset.product_id;

			let quantityData = "request=changeQuantity&quantity="+quantity+"&product_id="+product_id;

			// Fazer o fetch através do index
			//fetch("requests/",{
			fetch(requestDirect,{
				"method":"POST",
				"headers":{
					"Content-Type":"application/x-www-form-urlencoded"
				},
				"body":quantityData,
				"credentials":"same-origin"
			})
			.then(response => response.json())
			.then(json => console.log(json));
		});
	}

	for(let button of deleteInputs) {

		button.addEventListener("click", () => {
			const product_id = button.parentNode.parentNode.dataset.product_id;

			let deleteProduct = "request=deleteProduct&product_id="+product_id;

			fetch(requestDirect,{
				"method":"POST",
				"headers":{
					"Content-Type":"application/x-www-form-urlencoded"
				},
				"body":deleteProduct,
				"credentials":"same-origin"
			})
			.then(response => response.json())
			.then(json => console.log(json));

			button.parentNode.parentNode.remove();
		});
	}

	const editBtn = document.querySelectorAll('.editBtn');
	const inactive = document.querySelectorAll('.editToggle');
	
});