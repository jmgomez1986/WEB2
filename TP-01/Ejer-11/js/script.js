"use strict"

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

	$(".formIngreso").on("submit", function(event){
	  event.preventDefault();

	  let stringSerialize = $(this).serialize();
	  $.post("calcRaices.php", stringSerialize, function(response){

	    let div       = document.createElement("div");

	    div.innerHTML = response;

	    document.body.appendChild(div);

	    console.log(response);

	  });

	});

}
