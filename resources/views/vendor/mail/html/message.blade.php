@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => '#'])
           Universidad Tecnológica de Chetumal
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Dirección de vinculación - Sistema de seguimiento a egresados - {{ date('Y') }}
        @endcomponent
    @endslot
@endcomponent
