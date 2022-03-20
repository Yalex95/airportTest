$( document ).ready(function() {
    console.log( "ready!" );
    //obtencion de datos mediante la llamada de la API
    getDatos();

    $("#agregarForm").submit(function(){ 
        agregar(); 
        // return false;  
    });

    $("#updateForm").submit(function(){ 
        update(); 
        // return false;  
    });
    $("#liberar").click(function(){ 
        getAllData(); 
        // return false;  
    });
    

//     $('#tbody').click(function(){
//         console.log("clicked");
//         var id = $("tr").find(".id").html();
//         console.log(id);
// });
     
    



});
function getDatos() {
    const xhr = new XMLHttpRequest();
  
    // Open an obejct (GET/POST, PATH,
    // ASYN-TRUE/FALSE)
    xhr.open("GET", "http://localhost/airportPHPtest/api/post/read.php", true);
    xhr.onload = function () {
       if (this.status === 200) {

           // Changing string data into JSON Object
           obj = JSON.parse(this.responseText);

           // Getting the ul element
           let list = document.getElementById("tbody");
           str = ""
           for (key in obj.data) {
               str += 
               `<tr id="edit-${obj.data[key].Id}">
               <td>${obj.data[key].Id}</td>
               <td>${obj.data[key].type}</td>
               <td>${obj.data[key].size}</td>
               
               </tr>`;
            //    <td>
            //        <button id="edit-${obj.data[key].Id}" onclick="update()" class="btn btn-warning"> Editar <i class="fa fa-edit"></i></button>
            //    </td>
           }
           list.innerHTML = str;
       }
       else {
           console.log("File not found");
       }
   }
   xhr.send();
}
//funcion para agregar datos
function agregar() {

//  const data = new FormData();
 const typeS=document.getElementById('tipo').value;
 const sizeS=document.getElementById('size').value;
 var jsondata = JSON.stringify({
   type:typeS,
    size:sizeS
}); 

$.ajax({
    url: "http://localhost/airportPHPtest/api/post/create.php",
    method: "POST",       
    data:  jsondata,
    contentType: "application/json",
    dataType: "json",
    success: function(data){
        alert(JSON.stringify(data.mensaje));
       
    },
    error: function(errMsg) {
        console.log(JSON.stringify(errMsg));
    }
});
        
}
//funcion para actualizar datos
function update(){
    //  const data = new FormData();
    const id=document.getElementById('idUpd').value;
    const typeS=document.getElementById('tipoUpdate').value;
    const sizeS=document.getElementById('sizeUpdate').value;
    
    var jsondata = JSON.stringify({
      Id:id,
      type:typeS,
       size:sizeS
   });
   console.log(jsondata); 

$.ajax({
    url: "http://localhost/airportPHPtest/api/post/update.php",
    method: "PUT",       
    data:  jsondata,
    contentType: "application/json",
    dataType: "json",
    success: function(data){
        alert(JSON.stringify(data.mensaje));
        location.reload();
       
    },
    error: function(errMsg) {
        console.log(JSON.stringify(errMsg));
    }
});
}
//funcion para aagregar datos a cola
function addQueue(){
    $.post('/aeronaves', {elements: elements})

}
function getAllData() {
    
    const xhr = new XMLHttpRequest();
  
    // Open an obejct (GET/POST, PATH,
    // ASYN-TRUE/FALSE)
    xhr.open("POST", "http://localhost/airportPHPtest/api/post/read.php", true);
    xhr.onload = function () {
       if (this.status === 200) {

           // Changing string data into JSON Object
           obj = JSON.parse(this.responseText);

           let datos=Object.values(obj);
          let datosArray=datos[0];
            let nDatos=[];
            let nDatos2=[];

           for (var i = 0; i < datosArray.length; i++) {
            //    console.log(i);
                // datosPrior.push(datos[i]);
                
                console.log('hola');
                // for(var i =0; i<nDatos.length; i++){
                    if(i===0){
                    nDatos.push(datosArray[i]);
                    }else 
                    if(datosArray[i]['type'] == 'Emergencia' 
                    && datosArray[i]['size'] == 'Chico' &&
                    nDatos[i]['type'] == 'Emergencia' &&
                    datosArray[i]['size'] == 'Grande' 
                    ){
                        nDatos.push(datosArray[i]);
                    }
                // }
               
          }
          console.log(nDatos)
       
       }
       else {
           console.log("File not found");
       }
   }
   xhr.send();
}