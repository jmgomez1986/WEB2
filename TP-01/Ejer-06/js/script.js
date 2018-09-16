
"use strict"

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

  let btnCrearInputs = document.querySelector(".crearInputs").addEventListener("click", function(){

      let cantInputs = document.querySelector(".cantInputs").value;
      let form       = document.querySelector(".formValoresSumar");

      while (form.firstChild) {
          form.removeChild(form.firstChild);
      }

      for (let i = 0; i < cantInputs; i++){

        let input  = document.createElement("input");

        input.setAttribute("name","inputs[]");
        input.setAttribute("type","number");
        input.setAttribute("class","form-control m-4");

        form.appendChild(input);

      }

      let submit = document.createElement("input");

      submit.setAttribute("type","submit");
      submit.setAttribute("value","Sumar");
      submit.setAttribute("class","btn btn-primary mt-2 text-center");

      form.appendChild(submit);

    }
  );

  let divResult = document.querySelector(".result");
  let resultado = document.createElement("p");
  $(".formValoresSumar").on("submit", function(event) {
      event.preventDefault();
      let serializedData = $(this).serialize();
      $.post('suma.php', serializedData,
                    function(response) {
                      let texto = "El resultado es: "+response;
                      resultado.textContent = texto;
                      divResult.appendChild(resultado);
                      console.log(divResult);

                      //divResult.innerHTML = "El resultado es: "+response;
                }
              );
      }
  );

}
