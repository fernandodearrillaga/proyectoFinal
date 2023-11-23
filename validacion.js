function validacion() {
    let origen = document.forms["busqueda"]["origen"].value;
    let destino = document.forms["busqueda"]["destino"].value;
    let tren = document.getElementById("tren");
    let autobus = document.getElementById("autobus");



    if (origen == destino) {
      alert("Mismo origen y destino");
      return false;
    }
    if(!tren.checked && !autobus.checked){
      alert("No se ha seleccionado ningún medio de transporte");
      return false;
    }

    

    


  }