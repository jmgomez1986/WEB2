"use strict"

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

  $(".formInversion").on("submit", function(event) {

      event.preventDefault();
      let serializedData = $(this).serialize();
      $.post('proyeccion.php', serializedData,
                    function(response) {
                      let tmpDiv = document.createElement('div');
                      tmpDiv.innerHTML = response;
                      document.body.appendChild(tmpDiv);
                          
                }
              );
      }
  );

}