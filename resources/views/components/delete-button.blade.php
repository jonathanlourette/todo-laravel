
<a class="btn btn-danger badge" 
    href="javascript:{}" 
    onclick="if(confirm('Você deseja continuar?')){document.getElementById('form_delete_{{ $itemId }}').submit()}"
    {{ $attributes->merge() }}
>Deletar</a>
<form class="d-none"
    method="POST"
    id="form_delete_{{ $itemId }}"
    action="{{ $route }}"
>
    @csrf @method('DELETE')
</form>