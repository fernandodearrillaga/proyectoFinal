function validacion() {
    let origen = document.forms["busqueda"]["origen"].value;
    let destino = document.forms["busqueda"]["destino"].value;



    if (origen == destino) {
      alert("Mismo origen y destino");
      return false;
    }

    

    


  }