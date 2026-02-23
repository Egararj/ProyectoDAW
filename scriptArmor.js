let armaduras = null;
const modal = document.getElementById("modal");

async function obtenerArmaduras() {
  try {

    const respuesta = await fetch("https://mhw-db.com/armor");
    armaduras = await respuesta.json();
    console.log(armaduras);
  } catch (error) {
    console.error("Error:", error);
  }
}
obtenerArmaduras();

document.getElementById("head").addEventListener("click", function() {
    abrirListaModal("head");
});

document.getElementById("chest").addEventListener("click", function() {
    abrirListaModal("chest");
});

document.getElementById("arms").addEventListener("click", function() {
    abrirListaModal("arms");
});

document.getElementById("waist").addEventListener("click", function() {
    abrirListaModal("waist");
});

document.getElementById("legs").addEventListener("click", function() {
    abrirListaModal("legs");
});

document.getElementById("charm").addEventListener("click", function() {
    abrirListaModalCharm();
});

function abrirListaModal(parteArmadura) {
  const ul = document.getElementById("ul-modal");
  ul.innerHTML = "";
  const armadurasFiltradas = armaduras.filter(armadura => armadura.type === parteArmadura);
  for (const armadura of armadurasFiltradas) {
    const li = document.createElement("li");
    const div = document.createElement("div");
    const divNombre = document.createElement("div");
    const divDetalles = document.createElement("div");
    div.className = "armadura-item";
    divNombre.className = "armadura-item-nombre";
    divDetalles.className = "armadura-item-def";
    const resistenciasTexto = Object.entries(armadura.resistances)
      .map(([elemento, valor]) => `<img src="img/def/${elemento}-icon.png" class="img-icono"> : ${valor}`)
      .join("  ");
    textoNombre = `${armadura.name}`;
    textoDetalles = `<img src="img/def/defense-icon.png" class="img-icono"> base: ${armadura.defense.base}  <img src="img/def/defense-icon.png" class="img-icono"> max: ${armadura.defense.max}, Res: ${resistenciasTexto}`;
    divNombre.textContent = textoNombre;
    divDetalles.innerHTML = textoDetalles;

    // Botón de los li
    li.style.cursor = "pointer";
    li.addEventListener("click", () => {
      const p = document.getElementById(parteArmadura + "-title");
      p.textContent = armadura.name;
      modal.close();
    });

    div.appendChild(divNombre);
    div.appendChild(divDetalles);
    li.appendChild(div);
    ul.appendChild(li);
  }
  modal.showModal();
};

function abrirListaModalCharm() {

}

//Cierra el modal si haciendo click fuera de él
modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.close();
  }
});