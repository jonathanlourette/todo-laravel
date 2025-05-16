
<a class="btn btn-secondary badge" 
    style="margin-right: 0.5rem"
    href="javascript:{}" 
    onclick="document.getElementById('form_toggle_{{ $itemId }}').submit()"
    {{ $attributes->merge() }}
>   
    @if($check ?? false)
        <i class="bi-check-circle"></i>
    @else
        <i class="bi-circle"></i>
    @endif
    
</a>
<form class="d-none"
    method="POST"
    id="form_toggle_{{ $itemId }}"
    action="{{ $route }}"
>
    @csrf @method('PATCH')
</form>