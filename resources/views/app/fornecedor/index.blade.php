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
    Fornecedor:: {{ $fornecedores[2]['nome'] }}
    <br>
    Status: {{ $fornecedores[2]['status'] }}
    <br>
    <!-- Se a variavel não estiver definida (isset) ou null (empty), será usado o default-->
    CNPJ: {{ $fornecedores[2]['cnpj'] ?? '-- Vázio' }}

    {{-- @isset($fornecedores[0]['cnpj'])

        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            -- Vázio
        @endempty
    @endisset --}}
    <br>

    Telefone: ({{ $fornecedores[1]['ddd'] ?? '-- Vázio' }}) {{ $fornecedores[2]['telefone'] ?? '-- Vázio' }}

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
@endisset
