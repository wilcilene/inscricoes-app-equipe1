@props([
'editais',
'tipoUsuarioId'
])

<div class="editais-topo">

<div class="busca-container">

<i class="icone buscar cz"></i>

<input
type="text"
id="filtroEdital"
class="busca-edital"
placeholder="Buscar Editais..."
>

</div>

<select
id="filtroStatus"
class="filtro-select"
>

<option value="todos">
Todos
</option>

<option value="abertos">
Inscrições abertas
</option>

<option value="encerrados">
Encerrados
</option>

</select>

</div>



<div class="grid-editais">

@foreach($editais as $edital)

@php

$bloqueado=
now()
->gt(
$edital->data_fim_inscr
);

@endphp


<div

class="
card-edital
{{ $bloqueado ? 'card-bloqueado' : '' }}
"

data-nome="{{ strtolower($edital->nome) }}"
>

<div class="card-topo"></div>


<div class="card-corpo">

<h2>

EDITAL

{{ $edital->nome }}

</h2>


<h3>

{{ strtoupper($edital->descricao) }}

</h3>



<div class="card-data">

<i class="icone calendario bk"></i>

Data Limite:

{{
\Carbon\Carbon
::parse(
$edital->data_fim_inscr
)
->format(
'd/m/Y'
)
}}

</div>



<p>

{{ $edital->descricao }}

</p>



@if(!$bloqueado)

@if(!auth()->check())

<a
href="{{ route('login') }}"
class="btn-card"
>

<i class="icone adicionar wt"></i>

REALIZAR INSCRIÇÃO

</a>

@endif



@if(auth()->check() && $tipoUsuarioId==2)

<form
method="GET"
action="{{ route('inscrever') }}"
>

<input
type="hidden"
name="edital"
value="{{ $edital->nome }}"
>

<button
class="btn-card"
>

<i class="icone adicionar wt"></i>

REALIZAR INSCRIÇÃO

</button>

</form>

@endif



@if(auth()->check() && $tipoUsuarioId==1)

<div class="acoes-admin">

<form
action="{{ route('cad_edital') }}"
>

<input
type="hidden"
name="edital"
value="{{ $edital->nome }}"
>

<button
class="btn Br">

<i class="icone editar wt"></i>

EDITAR

</button>

</form>



<form
method="POST"
action="{{ route('edital.destroy',$edital->id) }}"
>

@csrf

@method('DELETE')

<button
class="btn Vm">

<i class="icone excluir wt"></i>

REMOVER

</button>

</form>

</div>

@endif


@else

<div class="status status-rejeitado">

Inscrições encerradas

</div>

@endif


</div>

</div>

@endforeach

</div>

<script>

const campoBusca =
document.getElementById(
'filtroEdital'
);

const filtro =
document.getElementById(
'filtroStatus'
);

const cards =
document.querySelectorAll(
'.card-edital'
);



function filtrarEditais(){

const texto =

campoBusca
.value
.toLowerCase()
.trim();

const tipo =

filtro.value;



cards.forEach(

(card)=>{

const nome =

(
card
.dataset
.nome
||
''
)

.toLowerCase();


const bloqueado =

card
.classList
.contains(
'card-bloqueado'
);



let mostrar =

nome.includes(
texto
);



/* FILTRO */

if(
tipo==='abertos'
){

mostrar =
mostrar
&&
!bloqueado;

}


if(
tipo==='encerrados'
){

mostrar =
mostrar
&&
bloqueado;

}


/* EXIBE */

card.style.display =

mostrar

?

''

:

'none';

}

);

}



/* EVENTOS */

campoBusca
.addEventListener(
'input',
filtrarEditais
);


filtro
.addEventListener(
'change',
filtrarEditais
);



/* EXECUÇÃO INICIAL */

filtrarEditais();

</script>