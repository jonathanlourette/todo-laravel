@if (session('success'))
    <x-alert type="success">
        {{ session('success') === true ? __('general.message_success') : session('success') }}
    </x-alert>
@endif

@if(session('error'))
    <x-alert type="danger">
        {{ session('error') === true ? __('general.message_error') : session('error') }}
    </x-alert>
@endif

@if(session('warning'))
    <x-alert type="warning">
        {{ session('warning') === true ? __('general.message_warning') : session('warning') }}
    </x-alert>
@endif

@if($errors->any())
    <x-modal-alert type="warning" title="Atenção" show="true">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-modal-alert>
@endif
