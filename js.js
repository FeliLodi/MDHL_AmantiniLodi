document.addEventListener("DOMContentLoaded", function() {
    var contacto = document.getElementById('formmdhl');
  
    contacto.addEventListener('submit', (event) => {
      event.preventDefault();
  
      var firstname = document.getElementById("firstname").value;
      var lastname = document.getElementById("lastname").value;
      var streetaddress = document.getElementById("streetaddress").value;
      var city = document.getElementById("city").value;
      var zipcode = document.getElementById("zipcode").value;
      var birthdate = document.getElementById("birthdate").value;
      
      var datosEnviar = {
        firstname: firstname,
        lastname: lastname,
        streetaddress: streetaddress,
        city: city,
        zipcode: zipcode,
        birthdate: birthdate,
      };
  
      fetch('./cargar.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(datosEnviar)
      })
      .then(response => response.text())
      .then(data => {
        console.log(data);
        contacto.reset(); 
      })
      .catch(error => {
        console.error(error);
      });
    });
  });