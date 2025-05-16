
<a class="btn btn-danger badge" 
    href="javascript:{}" 
    onclick="if(confirm('Você deseja continuar?')){document.getElementById('{{ $prefix ?? 'form_delete'}}_{{ $itemId }}').submit()}"
    {{ $attributes->merge() }}
>Deletar</a>
<form class="d-none"
    method="POST"
    id="{{ $prefix ?? 'form_delete'}}_{{ $itemId }}"
    action="{{ $route }}"
>
    @csrf @method('DELETE')
</form>