window.onload = async function(){
    cargarListaMonstruos();
}

listaMonstruos = null;

async function cargarListaMonstruos() {
    await cargarJson();
    const contenedorFlex = document.getElementById("contenedor-flex");

    for(const [id, nombre] of Object.entries(listaMonstruos)){
        const cajaMonstruos = document.createElement("div");
        cajaMonstruos.className = "cajaMonstruos";
        const img = document.createElement("img");
        img.className = "img-monstruos";
        img.src = "img/monstruos/"+id+".png";
        const p = document.createElement("p");
        p.innerHTML = nombre;
        cajaMonstruos.appendChild(img);
        cajaMonstruos.appendChild(p);
        contenedorFlex.appendChild(cajaMonstruos);
    }
}

async function cargarJson() {
    const response = await fetch("listaMonstruos.json");
    listaMonstruos = await response.json();
}