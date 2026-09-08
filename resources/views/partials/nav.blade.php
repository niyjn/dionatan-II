<nav class="bg-blue-600 text-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold tracking-wide">
            🏫 Portal Acadêmico
        </a>
        <div class="space-x-4">
            <a href="{{ route('home') }}" class="hover:text-blue-200 font-medium">Início</a>
            <a href="{{ route('alunos.index') }}" class="hover:text-blue-200 font-medium">Alunos</a>
            <a href="{{ url('/sobre') }}" class="hover:text-blue-200 font-medium">Sobre</a>
            <a href="{{ url('/contato') }}" class="hover:text-blue-200 font-medium">Contato</a>
        </div>
    </div>
</nav>