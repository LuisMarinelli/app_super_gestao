<h5>Index Fornecedores</h5>

{{-- Comentário Blade --}}

{{-- Interpretador de Array do Blade --}}
{{-- @dd($fornecedores);

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existe alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif --}}

{{-- @unless executa caso seja False 
Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>
@unless($fornecedores[0]['status'] == 'S')
    <p>Fornecedor Inativo</p>
@endunless --}}

@isset($fornecedores)
    {{-- Estrutura FOR --}}
    {{-- @for ($i = 0; isset($fornecedores[$i]); $i++) --}}
    {{-- @php $i = 0; @endphp --}}

    {{-- Estrutura WHILE --}}
    {{-- @while (isset($fornecedores[$i])) --}}

    {{-- Estrutura FOREACH --}}
    {{-- @foreach ($fornecedores as $index => $fornecedor) --}}

    {{-- Estrutura FORELSE BLADE --}}
    @forelse ($fornecedores as $index => $fornecedor)
        {{-- Objeto Loop só em Foreach/Forelse --}}
        Indice Atual: {{ $loop->iteration }}
        <br>
        {{-- Fornecedor:: {{ $fornecedores[$i]['nome'] }} --}}
        Fornecedor:: {{ $fornecedor['nome'] }}
        <br>
        {{-- Status: {{ $fornecedores[$i]['status'] }} --}}
        Status: {{ $fornecedor['status'] }}
        <br>
        <!-- Se a variavel não estiver definida (isset) ou null (empty), será usado o default-->
        {{-- CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '-- Vázio' }} --}}
        CNPJ: {{ $fornecedor['cnpj'] ?? '-- Vázio' }}
        <br>
        {{-- Telefone: ({{ $fornecedores[$i]['ddd'] ?? '-- Vázio' }}) {{ $fornecedores[$i]['telefone'] ?? '-- Vázio' }} --}}
        Telefone: ({{ $fornecedor['ddd'] ?? '-- Vázio' }}) {{ $fornecedor['telefone'] ?? '-- Vázio' }}
        <br>
        @if ($loop->first)
            Primeira iteração.
        @endif
        @if ($loop->last)
            Ultima iteração.
            <br>
            Total de Registros {{ $loop->count}}
        @endif
        {{-- @isset($fornecedores[0]['cnpj'])

            CNPJ: {{ $fornecedores[0]['cnpj'] }}
            @empty($fornecedores[0]['cnpj'])
                -- Vázio
            @endempty'
        @endisset --}}

        {{-- @switch($fornecedores[2]['ddd'])
            @case('11')
                São Paulo - SP
            @break

            @case('32')
                Juiz de Fora - MG
            @break

            @case('85')
                Fortaleza - CE
            @break

            @default
                Estado não Identificado
        @endswitch --}}
        <hr>

        {{-- Desvio condicional do FORELSE --}}
    @empty
        Não existem fornecedores cadastrados.
        {{-- fim Estrutura FORELSE --}}
    @endforelse

    {{-- fim Estrutura FOREACH --}}
    {{-- @endforeach --}}

    {{-- fim Estrutura while --}}
    {{-- @php $i++; @endphp --}}
    {{-- @endwhile --}}

    {{-- fim Estrutura FOR --}}
    {{-- @endfor --}}
@endisset
