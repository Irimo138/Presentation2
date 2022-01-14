window.onload = iniciar;
var http;

function iniciar(){

    http = new XMLHttpRequest();
    http.onreadystatechange = cargarMunicipios;
    http.open("GET","../JSON/Municipies4.json", true);
    http.send();

    var login = $("#login");
    login.click(openModal);


}

function cargarMunicipios(){
    
    var select = document.getElementsByClassName("provincias");
    for(var i = 0; i < select.length;i++){
      select[i].addEventListener("click", cargar)
    }

   
   
}
function cargar(){
  
  var json = JSON.parse(http.response);
  var code = this.value;
  var select = document.getElementById("town");
  select.innerHTML="";
 var datos = json.items;
  for(var i = 0; i < datos.length; i++){
    var provCode = datos[i].provinceId;
    
    if(code == provCode){
      
      var option = document.createElement("option");
      option.innerHTML = datos[i].nameEu;
      select.appendChild(option);

    }
  } 
}

function openModal(){
  console.log("aa");

}