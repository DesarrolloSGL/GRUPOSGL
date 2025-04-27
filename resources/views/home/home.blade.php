@extends('layouts.app')

@section('content')
    <section class="w-full mx-auto">
        <livewire:home.tracking-search-input />

        <livewire:home.portrait/>

        <section class="my-10 flex lg:px-10">
            <div class="px-1 w-full sm:px-5">
                <livewire:quoter.nav-bar/>

                <livewire:quoter.national-full-form/>

                <livewire:quoter.miami-full-form/>

                <livewire:quoter.china-full-form/>
            </div>
            @guest
                <livewire:auth.login/>
            @endguest
        </section>

        <div class="mx-auto w-10/12">
            <h3 class="text-2xl font-bold">Tienda SGL</h3>
        </div>

        <section class="my-10">
            <livewire:store.product-slider :category="1">
        </section>

        <section class="my-10">
            <livewire:store.product-slider :category="2">
        </section>

        <section class="my-10">
            <livewire:store.product-slider :category="4">
        </section>

        <section class="my-10">
            <livewire:store.product-slider :category="7">
        </section>

        <section class="my-10">
            <livewire:store.product-slider :category="137">
        </section>

        <livewire:home.request-appointment/>
    </section>
@endsection

@push('child-scripts')
    <script>
        const rates = {{ Js::from($rates) }};
        const user = {{ Js::from($user) }};
        const zoning = {{ Js::from($zoning) }};
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="{{ asset('js/quoter.js?v='.filemtime(public_path('js/quoter.js'))) }}" ></script>
@endpush
