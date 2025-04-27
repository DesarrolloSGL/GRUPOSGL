@extends('layouts.app')

@section('content')
    <section>
        <livewire:store.product-detail :sku="$sku"/>
    </section>
@endsection



