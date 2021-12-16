ndow.addEventListener("load",function(){

    const dni= document.getElementById("dni");
    const Fecha_nac= document.getElementById("Fecha_nac");
    
        const nombre=document.getElementById("nombre");


 

    function insertar(dni,nombre,Fecha_nac){
        var tr=document.createElement("tr");
        var td1=document.createElement("td");
        var td2=document.createElement("td");
        var td3=document.createElement("td");

        td1.innerHTML=dni;
        td2.innerHTML=nombre;
        td3.innerHTML=Fecha_nac;
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
    
        var tbody=document.getElementById("newAlum");
        tbody.appendChild(tr);
        
    }

})