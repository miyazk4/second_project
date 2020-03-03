document.addEventListener("DOMContentLoaded", () => {
	const news = document.querySelectorAll(".newsInfo");


	const main = document.querySelector(".mainWrapper");

	window.addEventListener("scroll", () => {
		const main = document.querySelector(".mainWrapper");
		const newsContainer = document.querySelector(".newsWrapper");

		const pageEnd = document.querySelector(".divEnd");

		if(pageEnd){

			const divHeight = pageEnd.offsetTop;
			const Ypos = window.pageYOffset;

			console.log(divHeight - Ypos);

			const news = document.querySelectorAll(".newsInfo");

			if(divHeight - Ypos < 450) { // É de acordo com o computador. antes estava < 200 mas no meu não funciona
				pageEnd.remove();

					// Validar o ultimo id através do data
				const newsElements = document.querySelectorAll(".newsInfo");
				const lastId = newsElements[newsElements.length-1].dataset.news_id;

				// Ajax
				const moreNews = "request=getMoreNews&news_id=" + lastId;
					// my root criada no ficheiro views/news.php
				fetch(requestDirect + moreNews,{
					"method":"GET",
					"headers":{
						"Content-Type":"application/x-www-form-urlencoded"
					},
					"credentials":"same-origin"
				})
				.then(response =>  response.json())
				.then(jsonData => {
					
					if(jsonData) {
						for(let i = 0; i < jsonData.length; i++ ) {
							newsContainer.appendChild(document.createElement("div")).innerHTML = `
								<div class="newsInfo" data-news_id=${jsonData[i]["news_id"]}>
									<div class="newsImageContainer">
										<div class="newsImage">
											<a href="${myRoot}${jsonData[i]["news_id"]}">
												<img src="images/newsImages/${jsonData[i]["image"]}"alt="">
											</a>
										</div>
										<div class="buttonContainer">
											<a href="${myRoot}${jsonData[i]["news_id"]}" class="buttonLink">Read More</a>
										</div>
									</div>
									<div class="newsDate">
										<a href="${myRoot}${jsonData[i]["news_id"]}">${jsonData[i]["news_date"]}</a>
									</div>
									<h2 class="newsTitle">
										<a href="${myRoot}${jsonData[i]["news_id"]}">${jsonData[i]["title"]}</a>
									</h2>
									<p class="newsDescription">
										<a href="${myRoot}${jsonData[i]["news_id"]}">${jsonData[i]["description"]}</a>
									</p>
								</div>
							`;
						}

						main.appendChild(document.createElement("div")).classList.add("divEnd");
					}

				});

			}
		}
	});
});