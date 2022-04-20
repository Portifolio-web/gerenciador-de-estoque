const body = document.querySelector("body"),
	sidebar = body.querySelector(".sidebar"),
	toggle = body.querySelector(".toggle"),
	searchBtn = body.querySelector(".search-box"),
	modeSwtich = body.querySelector(".toggle-switch"),
	modeText = body.querySelector(".mode-text"),
	//selelcionando a classe .sbmenu para aplicar um envento click
	sbmenu = body.querySelector(".sbmenu"),
	//selecionando a class .smenu para aplicar efeito de opem
	smenuOpen = body.querySelector(".smenu")

toggle.addEventListener("click", () => {
	sidebar.classList.toggle("close");
});

searchBtn.addEventListener("click", () => {
	sidebar.classList.remove("close");
});
//pegando o efieto do click no botao cadastro
sbmenu.addEventListener("click", () => {
	//aplicando o efeito dentro da tag smenu
	smenuOpen.classList.toggle("open");
});

modeSwtich.addEventListener("click", () => {
	body.classList.toggle("dark");

	if (body.classList.contains("dark")) {
		modeText.innerText = "Light Mode"
	} else {
		modeText.innerText = "Dark Mode"
	}


});
