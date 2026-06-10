    <aside class="sidebar">
    <div class="logo-container">
        <div class="logo-img-wrapper">
            <img src="{{ asset('imagens/logoifc.png') }}" alt="Logo Instituto Federal" class="if-logo-img">
        </div>
        <div class="logo-text">
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li class="{{ ($activePage ?? '') === 'inicio' ? 'active' : '' }}"><a href="#"><i class="fa-solid fa-house"></i> Início</a></li>
            <li class="{{ ($activePage ?? '') === 'Cadastrar editais' ? 'active' : '' }}"><a href="#"><i class="fa-solid fa-user"></i> Meu perfil</a></li>
            <li class="{{ ($activePage ?? '') === '' ? 'Candidaturas.' : '' }}"><a href="#"><i class="fa-solid fa-id-card-clip"></i> Minhas Inscrições</a></li>
        </ul>
    </nav>
</aside>
