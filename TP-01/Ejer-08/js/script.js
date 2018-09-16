"use strict"

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

$(".formArray").on("submit", function(event){
  event.preventDefault();

  let stringSerialize = $(this).serialize();
  $.post("ordenArreglo.php", stringSerialize, function(response){

     let dataJson = JSON.parse(response);
     let div       = document.createElement("div");
     let orderList = document.createElement("ol");

     for (var i = 0; i < dataJson.length; i++) {
       let itemList = document.createElement("li");
       itemList.innerHTML = "Valor: "+dataJson[i];
       orderList.appendChild(itemList);
       // console.log(dataJson[i]);
     }
     div.appendChild(orderList);
     document.body.appendChild(div);
  });

});

}
