let armaduras = null;
let habilidades = null;
let amuletos = null;
const modal = document.getElementById("modal");

const setCompleto = {
  equipamiento:{
    head: null,
    chest: null,
    gloves: null,
    waist: null,
    legs: null,
  },
  charm:{
    id: null,
    rank: null,
  },
  habilidades: []
};

// Función para obtener las armaduras desde la API
async function obtenerArmadurasYHabilidades() {
  try {
    const [respArmaduras, respHabilidades, respAmuletos] = await Promise.all([
      fetch("https://mhw-db.com/armor"),
      fetch("https://mhw-db.com/skills"),
      fetch("https://mhw-db.com/charms")
    ]);
    armaduras = await respArmaduras.json();
    habilidades = await respHabilidades.json();
    amuletos = await respAmuletos.json();
  } catch (error) {
    console.error("Error:", error);
  } finally {
    document.getElementById("cargando").remove();
  }
}
obtenerArmadurasYHabilidades();

document.getElementById("head").addEventListener("click", function() {
  abrirListaModal("head");
});

document.getElementById("chest").addEventListener("click", function() {
  abrirListaModal("chest");
});

document.getElementById("gloves").addEventListener("click", function() {
  abrirListaModal("gloves");
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

document.getElementById("borrarTodo").addEventListener("click",function() {
  borrarTodo();
});

document.getElementById("borrarHead").addEventListener("click", function(e){
  e.stopPropagation();
  borrarParteArmadura("head");
});

document.getElementById("borrarChest").addEventListener("click", function(e){
  e.stopPropagation();
  borrarParteArmadura("chest");
});

document.getElementById("borrarGloves").addEventListener("click", function(e){
  e.stopPropagation();
  borrarParteArmadura("gloves");
});

document.getElementById("borrarWaist").addEventListener("click", function(e){
  e.stopPropagation();
  borrarParteArmadura("waist");
});

document.getElementById("borrarLegs").addEventListener("click", function(e){
  e.stopPropagation();
  borrarParteArmadura("legs");
});

document.getElementById("borrarCharm").addEventListener("click", function(e){
  e.stopPropagation();
  borrarCharm();
});


document.getElementById("guardarSet")?.addEventListener("click", guardarSet);

document.getElementById("btnSet1")?.addEventListener("click", function(){
  cargarSet("1");
});

document.getElementById("btnSet2")?.addEventListener("click", function(){
  cargarSet("2");
});

document.getElementById("btnSet3")?.addEventListener("click", function(){
  cargarSet("3");
});

// Función para abrir el modal con la lista de armaduras filtradas por tipo
function abrirListaModal(parteArmadura) {
  const ul = document.getElementById("ul-modal");
  ul.innerHTML = "";
  const pTitulo = document.getElementById("tituloModal");
  pTitulo.textContent = "Seleccione una parte de armadura";
  const armadurasFiltradas = armaduras.filter(armadura => armadura.type === parteArmadura);
  for (const armadura of armadurasFiltradas) {
    const li = document.createElement("li");
    const div = document.createElement("div");
    const divNombre = document.createElement("div");
    const divDetalles = document.createElement("div");
    const divDetalles2 = document.createElement("div");
    const divBloque = document.createElement("div");
    const divHabilidades = document.createElement("div");
    div.className = "armadura-item";
    divNombre.className = "armadura-item-nombre";
    divDetalles.className = "armadura-item-def";
    divDetalles2.className = "armadura-item-def";
    divBloque.className = "armadura-bloque-def";
    divHabilidades.className = "armadura-bloque-def";
    const resistenciasTexto = Object.entries(armadura.resistances)
      .map(([elemento, valor]) => `<img src="img/def/${elemento}-icon.png" class="img-icono">${valor}`)
      .join("  ");
    const textoNombre = `${armadura.name}`;
    let textoDetalles = `<img src="img/def/defense-icon.png" class="img-icono"> base: ${armadura.defense.base}  <img src="img/def/defense-icon.png" class="img-icono"> max: ${armadura.defense.max}   <img src="img/def/defense-icon.png" class="img-icono"> max: ${armadura.defense.augmented}`;
    divNombre.textContent = textoNombre;
    divDetalles.innerHTML = textoDetalles;
    textoDetalles = `Res: ${resistenciasTexto}`;
    divDetalles2.innerHTML = textoDetalles;

    for(const habilidad of armadura.skills){
      const divDetallesHabilidad = document.createElement("div");
      divDetallesHabilidad.className = "armadura-item-def";
      textoDetalles = `${habilidad.skillName} ${habilidad.level}`;
      console.log(textoDetalles);
      divDetallesHabilidad.innerHTML = textoDetalles;
      divHabilidades.appendChild(divDetallesHabilidad);
    }

    // Botón de los li
    li.style.cursor = "pointer";
    li.addEventListener("click", () => {
      const p = document.getElementById(parteArmadura + "-title");
      p.textContent = armadura.name;
      setCompleto.equipamiento[parteArmadura] = armadura.id;
      actualizarInfoStats();
      modal.close();
    });
    divBloque.appendChild(divDetalles);
    divBloque.appendChild(divDetalles2);
    div.appendChild(divNombre);
    div.appendChild(divBloque);
    div.appendChild(divHabilidades);
    li.appendChild(div);
    ul.appendChild(li);
  }
  modal.showModal();
};

// Función para abrir el modal con la lista de amuletos
function abrirListaModalCharm() {
const ul = document.getElementById("ul-modal");
ul.innerHTML = "";
const pTitulo = document.getElementById("tituloModal");
pTitulo.textContent = "Seleccione un amuleto";
  for (const amuleto of amuletos) {
    for(const rank of amuleto.ranks) {
      const li = document.createElement("li");
      const div = document.createElement("div");
      const divNombre = document.createElement("div");
      const divDetalles = document.createElement("div");
      div.className = "amuleto-item";
      divNombre.className = "amuleto-item-nombre";
      divDetalles.className = "amuleto-item-def";
      const textoNombre = `${rank.name}`;
      let textoDetalles = null;
      let contador = 0;
      for(const skill of rank.skills){
        if(contador === 0){
          textoDetalles = `${skill.description}`;
        }else{
          textoDetalles += ` - ${skill.description}`;
        }        
        contador++;
      }
      divNombre.textContent = textoNombre;
      divDetalles.innerHTML = textoDetalles;

      // Botón de los li
      li.style.cursor = "pointer";
      li.addEventListener("click", () => {
        const p = document.getElementById("charm-title");
        p.textContent = rank.name;
        setCompleto.charm.id = amuleto.id;
        setCompleto.charm.rank = rank.level-1;
        actualizarInfoStats();
        modal.close();
      });

      div.appendChild(divNombre);
      div.appendChild(divDetalles);
      li.appendChild(div);
      ul.appendChild(li);
    }
  }
  modal.showModal();
}

//Cierra el modal haciendo click fuera de él o en ningún elemento del modal
modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.close();
  }
});

function actualizarInfoStats() {
  resetearDefensa();
  resetearHabilidades();
  const ulHabilidades = document.getElementById("ul-habilidades");
  ulHabilidades.innerHTML = "";
  console.log(setCompleto.habilidades);
  for(const habilidad of setCompleto.habilidades) {
    const idHabilidad = habilidad.id;
    const rankHabilidad = habilidad.rank;

    const habilidadInfo = habilidades.find(h => h.id === idHabilidad);
    const nombreHabilidad = habilidadInfo.name;
    const rankActual = habilidadInfo.ranks[rankHabilidad];
    const descripcionHabilidad = rankActual.description;
    const nivelActual = rankHabilidad + 1;
    const nivelMaximo = habilidadInfo.ranks.length;

    const li = document.createElement("li");
    const divPadre = document.createElement("div");
    const divNombre = document.createElement("div");
    const divNivel = document.createElement("div");
    divPadre.style = "display: flex; justify-content: space-between;";
    divNombre.style = "display: flex; align-items: center; gap: 5px;";
    divNombre.style.cursor = "pointer";
    const textoNombre = `<img src="img/interrogation.png" class="img-icono"> ${nombreHabilidad}`;
    divNombre.innerHTML = textoNombre;
    divNivel.textContent = `Nivel: ${nivelActual}/${nivelMaximo}`;
    divPadre.appendChild(divNombre);
    divPadre.appendChild(divNivel);
    li.appendChild(divPadre);

    //Cuadro informativo al pasar el mouse por encima de la habilidad
    divNombre.addEventListener("mouseenter", () => {
      const tooltip = document.createElement("div");
      tooltip.id = "tooltip"; 
      tooltip.textContent = descripcionHabilidad;
      tooltip.style.position = "fixed";
      tooltip.style.backgroundColor = "rgba(50, 50, 50, 1)";
      tooltip.style.color = "white";
      tooltip.style.padding = "5px 12px";
      tooltip.style.borderRadius = "5px";
      tooltip.style.border = "1px solid white";
      document.body.appendChild(tooltip);
      const rect = divNombre.getBoundingClientRect();
      tooltip.style.top = `${rect.top}px`;
      tooltip.style.left = `${rect.left - tooltip.offsetWidth - 10}px`;
    });
    divNombre.addEventListener("mouseleave", () => {
      const tooltip = document.getElementById("tooltip");
      if (tooltip) {
        tooltip.remove();
      }
    });
    ulHabilidades.appendChild(li);
  }
};

function actualizarCamposArmadurasYCharm() {
  for(const [parte, idArmadura] of Object.entries(setCompleto.equipamiento)){
    const p = document.getElementById(parte + "-title"); 
    if(idArmadura !== null){
      const armadura = armaduras.find(a => a.id === idArmadura);
      p.textContent = armadura.name;    
    }else{
      p.textContent = "";
    }
  }

  const pCharm = document.getElementById("charm-title");
  if(setCompleto.charm.id !== null) {
    const amuleto = amuletos.find(a => a.id === setCompleto.charm.id);
    pCharm.textContent = amuleto.ranks[setCompleto.charm.rank].name;
  }else{
    pCharm.textContent = "";
  }
}

function resetearHabilidades() {
  setCompleto.habilidades = [];
  for (const parte in setCompleto.equipamiento) {
    if(setCompleto.equipamiento[parte] !== null) {
      const idArmadura = setCompleto.equipamiento[parte];
      const armadura = armaduras.find(a => a.id === idArmadura);
      for(const habilidad of armadura.skills) {
        const idHabilidad = habilidad.skill;
        const nivel = habilidad.level;
        if(!setCompleto.habilidades.some(h => h.id === idHabilidad)) {
          setCompleto.habilidades.push({id: idHabilidad, rank: nivel-1});
        }else {
          const habilidadExistente = setCompleto.habilidades.find(h => h.id === idHabilidad);
          habilidadExistente.rank += nivel;
          if(habilidadExistente.rank >= habilidades.find(h => h.id === idHabilidad).ranks.length-1) {
            habilidadExistente.rank = habilidades.find(h => h.id === idHabilidad).ranks.length-1;
          }
        }
      }
    }
  }
  if(setCompleto.charm.id !== null) {
    const amuleto = amuletos.find(a => a.id === setCompleto.charm.id);
    const rank = amuleto.ranks[setCompleto.charm.rank];
    for(const habilidad of rank.skills){
      const idHabilidad = habilidad.skill;
      const nivel = habilidad.level;
      if(!setCompleto.habilidades.some(h => h.id === idHabilidad)) {
        setCompleto.habilidades.push({id: idHabilidad, rank: nivel-1});
      }else {
        const habilidadExistente = setCompleto.habilidades.find(h => h.id === idHabilidad);
        habilidadExistente.rank += nivel;
        if(habilidadExistente.rank >= habilidades.find(h => h.id === idHabilidad).ranks.length-1) {
          habilidadExistente.rank = habilidades.find(h => h.id === idHabilidad).ranks.length-1;
        }
      }
    }
  }
};

function resetearDefensa() {
  const defensa = document.getElementById("defense");
  const resistenciaFuego = document.getElementById("fire");
  const resistenciaAgua = document.getElementById("water");
  const resistenciaHielo = document.getElementById("ice");
  const resistenciaTrueno = document.getElementById("thunder");
  const resistenciaDragon = document.getElementById("dragon");
  let defBase = 0, defMax = 0, defAug = 0, fire = 0, water = 0, ice = 0, thunder = 0, dragon = 0;
  let hayPartes = false;
  for(const parte in setCompleto.equipamiento){
    if(setCompleto.equipamiento[parte] !== null){
      const armadura = armaduras.find(a => a.id === setCompleto.equipamiento[parte]);
      console.log(armadura);
      defBase += armadura.defense.base;
      defMax += armadura.defense.max;
      defAug += armadura.defense.augmented;
      fire += armadura.resistances.fire;
      water += armadura.resistances.water;
      ice += armadura.resistances.ice;
      thunder += armadura.resistances.thunder;
      dragon += armadura.resistances.dragon;

      defensa.textContent = `Base:${defBase} | Max:${defMax} | Aug:${defAug}`;
      resistenciaFuego.textContent = fire;
      resistenciaAgua.textContent = water;
      resistenciaHielo.textContent = ice;
      resistenciaTrueno.textContent = thunder;
      resistenciaDragon.textContent = dragon;
      hayPartes = true;
    }
  }
  if(!hayPartes){
    defensa.textContent = 0;
    resistenciaFuego.textContent = fire;
    resistenciaAgua.textContent = water;
    resistenciaHielo.textContent = ice;
    resistenciaTrueno.textContent = thunder;
    resistenciaDragon.textContent = dragon;
  }
}

function borrarTodo() {
  setCompleto.equipamiento.head = null;
  setCompleto.equipamiento.chest = null;
  setCompleto.equipamiento.gloves = null;
  setCompleto.equipamiento.waist = null;
  setCompleto.equipamiento.legs = null;
  setCompleto.charm.id = null;
  setCompleto.charm.rank = null;
  document.getElementById("head-title").textContent = "";
  document.getElementById("chest-title").textContent = "";
  document.getElementById("gloves-title").textContent = "";
  document.getElementById("waist-title").textContent = "";
  document.getElementById("legs-title").textContent = "";
  document.getElementById("charm-title").textContent = "";
  actualizarInfoStats();
}

function borrarParteArmadura(parte) {
  setCompleto.equipamiento[parte] = null;
  document.getElementById(parte + "-title").textContent = "";
  actualizarInfoStats();
}

function borrarCharm() {
  setCompleto.charm.id = null;
  setCompleto.charm.rank = null;
  document.getElementById("charm-title").textContent = "";
  actualizarInfoStats();
}

function guardarSet() {
    const selectSet = document.getElementById('selectSet');
    const numeroSet = selectSet.value;
    
    const datos = {
        setCompleto: setCompleto,
        numeroSet: numeroSet
    };
    
    fetch('guardarSet.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Set ' + numeroSet + ' guardado correctamente');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('Error al guardar');
    });
}

function cargarSet(numeroSet) {
    fetch('cargarSet.php?set=' + numeroSet)
    .then(response => response.json())
    .then(data => {
        if(data.success && data.setCompleto) {
            setCompleto.equipamiento = data.setCompleto.equipamiento;
            setCompleto.charm = data.setCompleto.charm;
            actualizarInfoStats();
            actualizarCamposArmadurasYCharm();
            alert('Set ' + numeroSet + ' cargado');
        } else {
            alert('No hay datos guardados para Set ' + numeroSet);
        }
    });
}