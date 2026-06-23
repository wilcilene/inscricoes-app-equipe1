const numero =
  document.getElementById("numeroEdital");

const data =
  document.getElementById("dataInicio");

const header =
  document.getElementById("headerNumero");

const descricao =
  document.getElementById("descricao");

const form =
  document.querySelector(".form");


// ATUALIZAR CABEÇALHO

function atualizarCabecalho() {

  const numeroValor =
    numero.value || "000";

  let ano = "";

  if (data.value) {

    ano =
      new Date(data.value).getFullYear();

  }

  header.textContent =
    ano
      ? `${numeroValor}/${ano}`
      : numeroValor;

}


// ALTERAR NÚMERO

numero.addEventListener(
  "input",
  atualizarCabecalho
);


// ALTERAR DATA

data.addEventListener(
  "input",
  atualizarCabecalho
);


// AUTO AJUSTE TEXTAREA

descricao.addEventListener("input", () => {

  descricao.style.height = "auto";

  descricao.style.height =
    descricao.scrollHeight + "px";

});


// ENVIAR FORMULÁRIO

form.addEventListener("submit", (e) => {

  e.preventDefault();

  alert("Edital Criado com sucesso!");

  form.reset();

  header.textContent = "0000";

  descricao.style.height = "160px";

});