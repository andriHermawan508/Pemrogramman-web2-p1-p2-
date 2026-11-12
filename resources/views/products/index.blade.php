<html>
    <head>
        <title> Table Item</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="container mx-auto p-5">
        <h1 class="text-2xl font-bold mb-5">Table Item Toko Andri</h1>
        <button onclick="toggle_modal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Tambah Item </button>

        <table class="table-auto border-collapse border border-slate-400 mt-5">
            <thead>
                <tr class="bg-gray-300">
                    <th class="border border-slate-400 px-4 py-2">Nama Item</th>
                    <th class="border border-slate-400 px-4 py-2">Harga</th>
                    <th class="border border-slate-400 px-4 py-2">Stok</th>
                    <th class="border border-slate-400 px-4 py-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                <tr>
                    <td class="border p-2">{{ $p->nama_barang }}</td>
                    <td class="border p-2">RP {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="border p-2">{{ $p->stok }}</td>
                    <td class="border p-2">{{ $p->deskripsi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="modal-tambah-item" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-6 rounded-2xl shadow-lg w-96 ">
                <h2 class="text-lg font-bold mb-4">Tambah Item Baru</h2>
                <form action="{{ route('products.store')}}" method="post">
                    @csrf 
                    <label for="nama_barang" class="block mb-2">Nama Barang</label>
                    <input type="text" name="nama_barang" class="w-full border p-2 mb-3 rounded" required>
                    <label for="harga" class="block mb-2">Harga</label>
                    <input type="number" name="harga" class="w-full border p-2 mb-3 rounded" required>
                    <label for="stok" class="block mb-2">Stok</label>
                    <input type="number" name="stok" class="w-full border p-2 mb-3 rounded" required>
                    <label for="deskripsi" class="block mb-2">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border p-2 mb-3 rounded" required></textarea>

                    <div class="flex justify-end gap-3 mt-2">
                        <button type="button" onclick="toggle_modal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>

                    </div>
                </form>

            </div>

        </div>
        <script>
            function toggle_modal() {
                const modal = document.getElementById('modal-tambah-item');
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            }
        </script>
    </body>
</html>