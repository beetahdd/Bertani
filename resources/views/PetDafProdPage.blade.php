<x-layout>
    <x-slot:title>Daftar Produk-Bertani.com</x-slot:title>
    <div dir="ltr">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Daftar Produk</h1>

            <div dir="rtl">
                <button
                    class="items-center justify-center text-white bg-green-300 px-4 py-1 rounded-lg hover:bg-green-600"
                    type="button" id="addProduct-button" onclick="toggleAllInputs()">
                    <span><ion-icon name="add-circle-outline" class="ml-2 text"></ion-icon></span>
                    Tambah Produk
                </button>
            </div>
        </div>
    </div>

    <!-- bawah ini adalah component untuk produk -->
    <div id="cardContainer"
        class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
        {{-- @foreach ($products as $product) --}}
        <div class="border rounded-lg p-4 grid sm:grid-cols-2 sm:grid-flow-row md:grid-cols-8 md:grid-flow-row lg:grid-cols-8 lg:grid-flow-row gap-4 items-start">
            <!-- Gambar Produk -->
            <div class="sm:col-span-1 sm:row-span-2 md:col-span-3 md:row-span-5 lg:col-span-2 lg:row-span-5 flex justify-center items-center border rounded-lg h-32 md:h-40">
                gambar
            </div>
            <!-- Nama Produk -->
            <div class="sm:col-span-1 md:col-span-3 lg:col-span-4 sm:text-sm md:text-base lg:text-lg font-semibold">
                {{-- {{ $product->name }} --}} "Nama Produk"
            </div>
            <!-- Jenis Produk -->
            <div class="sm:col-span-1 md:row-start-3 md:col-start-4 md:col-span-3 lg:row-start-3 lg:col-start-3 lg:col-span-4 sm:text-sm md:text-base lg:text-lg text-gray-600">
                {{-- {{ $product->product_type }} --}} Jenis Produk:
            </div>
            <!-- Harga Produk -->
            <div class="sm:col-span-1 md:col-start-7 md:col-span-2 lg:row-start-1 lg:col-start-7 lg:col-span-2 sm:text-sm md:text-base lg:text-lg md:flex md:justify-end  text-gray-600">
                {{-- {{ $product->price }} --}} Rp xx.xxx
            </div>
            <!-- Jumlah Stok -->
            <div class="sm:col-span-1 md:row-start-5 md:col-start-4 md:col-span-3 lg:row-start-5 lg:col-start-3 lg:col-span-4 sm:text-sm md:text-base lg:text-lg text-gray-600">
                {{-- {{ $product->stock }} --}} Jumlah Stok:
            </div>
            <!-- Tombol Aksi -->
            <div class="sm:col-span-2 md:row-start-5 md:col-start-7 md:col-span-2 lg:col-start-7 lg:col-span-2 lg:row-start-5 md:flex md:justify-end space-x-2 sm:text-sm md:text-base lg:text-lg  ">
                <button><ion-icon name="create-outline" class="transition ease-in duration-300"></ion-icon></button>
                <button onclick="toggleComponent()"><ion-icon name="trash-outline"
                        class="transition ease-in duration-300"></ion-icon></button>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>

    <div id="componentContainer" class="hidden mt-4">
        @include('components.delete_confirm')
    </div>

    <script>
        function toggleComponent() {
            const container = document.getElementById('componentContainer');
            container.classList.toggle('hidden');
        }
    </script>

</x-layout>
