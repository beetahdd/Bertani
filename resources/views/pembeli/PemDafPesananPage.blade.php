<x-layout>
    <x-slot:title>Daftar Pesanan-Bertani.com</x-slot:title>
    <div
        class="font-libre-franklin font-bold mx-auto max-w-7xl px-4 mt-5 mb-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-xl md:text-3xl font-bold tracking-tight text-gray-900">Daftar Pesanan</h1>
    </div>

    <div id="cardContainer"
        class="mx-auto m2ax-w-7xl px-4 py-2 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
        @forelse($orders as $order)
        {{-- kotak produk --}}
        <a href="{{route('DetailPembelianPage', $order->receipt_number) }}" class="block">
            <div id="kotak" class="hover:scale-105 transition-transform duration-300 ease-in-out cursor-pointer shadown-lg border rounded-lg p-4 sm:px-6 md:px-7 lg:px-8 grid grid-cols-10 lg:grid-cols-9 gap-2 md:gap-6 lg:gap-6">
                {{-- gambar produk --}}
                <div class="col-start-1 row-start-1 col-span-10 md:col-span-3 md:row-span-3 lg:col-span-3 lg:row-span-3 rounded-lg">
                    <img src="{{$order->product->img_link ?? './img/logo3.jpg'}}" alt="{{$order->product->type->name}}"
                        id="gambar" class="thumbnail md:w-full md:h-full lg:w-full lg:h-full w-full h-full object-cover rounded-md">
                </div>
                {{-- nama produk --}}
                <div
                    class=" col-span-5 md:col-span-4 md:row-start-1 md:col-start-4 lg:col-span-4 lg:row-start-1 lg:col-start-4 ">
                    <h1 id="namaproduk" class="capitalize font-libre-franklin text-sm md:text-base lg:text-lg font-semibold">{{$order->product->type->name}}</h1>
                </div>
                {{-- tanggal pesanan --}}
                <div
                    class=" col-span-5 col-start-6 md:col-start-8 md:row-start-1 md:col-span-3 flex justify-end ">
                    <h1 id="tglpesan" class="flex justify-end font-libre-franklin text-xs md:text-sm lg:text-base font-light">{{$order->order_time->format('d F Y, H:i')}}</h1>
                    <!-- <h1>{{$order->order_time->format('H:i')}}</h1> -->
                </div>
                {{-- Jumlah beli --}}
                <div
                    class="col-span-6 md:col-start-4 md:row-start-2 md:col-span-4 lg:col-start-4 lg:row-start-2 lg:col-span-4  ">
                    <h1 id="jumbel" class="font-libre-franklin text-sm md:text-base lg:text-lg font-semibold ">Jumlah Beli : {{$order->quantity_kg}} kg</h1>
                </div>
                {{-- nama petani --}}
                <div
                    class="col-span-6 md:col-start-4 md:row-start-3 md:col-span-4 lg:col-start-4 lg:row-start-3 lg:col-span-4 ">
                    <h1 id="namapetani" class="capitalize font-libre-franklin text-sm md:text-base lg:text-lg font-semibold ">Nama Petani : {{$order->product->farmer->name}}</h1>
                </div>
                {{-- Total harga --}}
                <div
                    class="col-span-6  md:col-start-8 md:row-start-2 md:col-span-3 lg:col-start-8 lg:row-start-2 lg:col-span-3">
                    <h1 id="total" class="font-libre-franklin text-sm md:text-base lg:text-lg font-semibold md:flex md:justify-end">Rp {{number_format($order->historyPrice->price * $order->quantity_kg, 0, ',', '.')}}</h1>
                </div>
                {{-- status pesanan --}}
                <div
                    class="font-libre-franklin font-normal row-start-6 col-span-6 col-start-6 md:row-start-3 md:col-start-8 lg:col-start-8 md:col-span-3 md:row-span-1 ">
                    @if ($order->order_status == 'menunggu konfirmasi')
                        <h4 id="status1" class="bg-yellow-200 text-sm rounded-md p-1 mb-1 flex justify-center relative">
                            Menunggu Konfirmasi
                            <span
                                class="absolute top-1 right-0 transform translate-x-1/2 -translate-y-1/2 flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                        </h4>
                    @elseif ($order->order_status == 'pesanan diterima')
                        <h4 id="status2" class="bg-[#4379F2] text-sm rounded-md p-1 mb-1 flex justify-center relative animate-bounce transition-all duration-300">Lakukan Pembayaran </h4>
                        <!-- <span
                                class="absolute top-1 right-0 transform translate-x-1/2 -translate-y-1/2 flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                         -->
                    @elseif ($order->order_status == 'selesai')
                        <h4 id="status3" class="bg-[#00D115] text-sm rounded-md p-1 mb-1 flex justify-center">Pesanan Selesai</h4>
                    @elseif ($order->order_status == 'ditolak')
                        <h4 id="status4" class="bg-[#f44747] text-sm rounded-md p-1 mb-1 flex justify-center">Pesanan Ditolak</h4>
                    @else
                        <h4 id="status5" class="bg-[#FF0000] text-sm rounded-md p-1 mb-1 flex justify-center">Pesanan Dibatalkan</h4>
                        {{-- <button class="rounded-md px-2 py-1 flex justify-center bg-[#f44747]">Lihat Alasan</button> --}}
                    @endif
                </div>
            </div>
        </a>
        @empty
        <div class="text-center text-gray-500" id="informasi">
            Tidak ada pesanan saat ini.
        </div>
        @endforelse
    </div>
</x-layout>
