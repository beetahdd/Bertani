<x-navbar>
    <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
    <x-nav-link href="{{ route('MelihatHargaPasar') }}" :active="request()->is('')">Harga Pasar</x-nav-link>
    <x-nav-link href="/produk" :active="request()->is('produk')">Produk</x-nav-link>
    <x-nav-link href="{{ route('DafPesananPembeli') }}" :active="request()->is('pembeli/DafPesananPembeli')">Pesanan</x-nav-link>
    <x-nav-dropdown>
        <x-slot:title>Lainnya</x-slot:title>
        <x-dropdown-list href="/chat" :active="request()->is('chat')">Chat</x-dropdown-list>
        <x-dropdown-list href="/laporan/sistem" :active="request()->is('laporan-sistem')">Laporan</x-dropdown-list>
    </x-nav-dropdown>
</x-navbar>
