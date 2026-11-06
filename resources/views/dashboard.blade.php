<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApotikOnline - Layanan Resep & Obat Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col justify-between" x-data="{ activeTab: 'katalog', showModal: false, modalType: 'obat', subTab: 'obat' }">

    <div>
        <!-- Navbar -->
        <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-teal-600 flex items-center justify-center text-white font-bold text-xl shadow-md">+</div>
                    <div>
                        <span class="text-xl font-bold tracking-tight text-slate-900">Apotik<span class="text-teal-600">Online</span></span>
                        <p class="text-[10px] text-slate-400 font-mono">DB: DB_APOTEK_ONLINE</p>
                    </div>
                </div>

                <nav class="hidden md:flex items-center space-x-2 bg-slate-100 p-1.5 rounded-full border border-slate-200">
                    <button @click="activeTab = 'katalog'" :class="activeTab === 'katalog' ? 'bg-white text-teal-700 shadow-sm font-semibold' : 'text-slate-600 font-medium'" class="px-5 py-2 rounded-full text-xs transition-all flex items-center gap-2">
                        🛒 Katalog Pelanggan
                    </button>
                    <button @click="activeTab = 'db'" :class="activeTab === 'db' ? 'bg-white text-teal-700 shadow-sm font-semibold' : 'text-slate-600 font-medium'" class="px-5 py-2 rounded-full text-xs transition-all flex items-center gap-2">
                        🗄️ Dashboard Kelola DB
                    </button>
                    <button @click="activeTab = 'panduan'" :class="activeTab === 'panduan' ? 'bg-white text-teal-700 shadow-sm font-semibold' : 'text-slate-600 font-medium'" class="px-5 py-2 rounded-full text-xs transition-all flex items-center gap-2">
                        &lt;/&gt; Panduan Postman & GitHub
                    </button>
                </nav>

                <div class="flex items-center space-x-3">
                    <a href="https://github.com" target="_blank" class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 text-xs font-semibold hover:bg-slate-50 transition">
                        🐙 GitHub Repo
                    </a>
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-teal-700 border border-slate-200 relative">
                        🛒
                        <span class="absolute -top-1 -right-1 bg-teal-600 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">0</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            @if(session('success'))
                <div class="mb-6 bg-slate-900 text-white px-5 py-4 rounded-2xl shadow-lg flex items-center justify-between">
                    <span class="text-sm font-medium flex items-center gap-2">✅ {{ session('success') }}</span>
                    <button @click="$el.parentElement.remove()" class="text-slate-400 hover:text-white">✕</button>
                </div>
            @endif

            <!-- TAB 1: KATALOG PELANGGAN -->
            <div x-show="activeTab === 'katalog'" class="space-y-10">
                <!-- Hero Section -->
                <div class="bg-slate-900 text-white rounded-3xl p-8 sm:p-12 shadow-xl relative overflow-hidden flex flex-col md:flex-row justify-between items-center">
                    <div class="max-w-xl z-10 space-y-4">
                        <span class="bg-teal-500/20 text-teal-400 text-xs font-semibold px-3 py-1 rounded-full uppercase border border-teal-500/30">Apotik Online Terpercaya</span>
                        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Layanan Resep & Obat Digital Terlengkap</h1>
                        <p class="text-slate-300 text-sm">Cari dan pesan kebutuhan medis Anda dengan akurat. Terhubung secara terintegrasi dengan database pusat db_apotek_online.</p>
                        <div class="flex flex-wrap gap-3 pt-2">
                            <button @click="activeTab = 'db'" class="bg-teal-600 hover:bg-teal-500 text-white px-6 py-3 rounded-full text-xs font-semibold transition shadow-lg flex items-center gap-2">💊 Jelajahi Obat</button>
                            <button @click="activeTab = 'db'" class="bg-slate-800 hover:bg-slate-700 text-white px-6 py-3 rounded-full text-xs font-semibold transition border border-slate-700 flex items-center gap-2">👤 Login Staf Apotek</button>
                        </div>
                    </div>
                    <!-- Ilustrasi abstrak kapsul kanan -->
                    <div class="hidden md:flex opacity-20 gap-4 pr-10">
                        <div class="w-24 h-48 bg-teal-400 rounded-full"></div>
                        <div class="w-32 h-32 bg-teal-200 rounded-full self-center"></div>
                    </div>
                </div>

                <!-- Info Cards Banner -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 flex items-center justify-center text-teal-600 font-bold">🚚</div>
                        <div>
                            <h3 class="font-bold text-sm text-slate-900">Pengiriman Cepat</h3>
                            <p class="text-xs text-slate-500">Obat diantar langsung ke rumah Anda</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 flex items-center justify-center text-teal-600 font-bold">👨‍⚕️</div>
                        <div>
                            <h3 class="font-bold text-sm text-slate-900">Apoteker Siap Bantu</h3>
                            <p class="text-xs text-slate-500">Konsultasi obat dengan Staf Apotek</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 flex items-center justify-center text-teal-600 font-bold">🛡️</div>
                        <div>
                            <h3 class="font-bold text-sm text-slate-900">100% Original</h3>
                            <p class="text-xs text-slate-500">Kualitas obat terjamin terdaftar BPOM</p>
                        </div>
                    </div>
                </div>

                <!-- Katalog Obat List -->
                <div class="space-y-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Katalog Obat & Suplemen</h2>
                            <p class="text-xs text-slate-500">Pilih obat yang tersedia dari inventaris apotek kami.</p>
                        </div>
                        <input type="text" placeholder="Cari nama obat..." class="px-4 py-2 border border-slate-200 rounded-xl text-xs w-full sm:w-64 focus:outline-teal-600 bg-white">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($obat as $item)
                        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between space-y-6">
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="bg-slate-100 text-slate-600 font-mono text-[10px] px-2.5 py-1 rounded-lg">{{ $item->kode_obat }}</span>
                                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">Tersedia</span>
                                </div>
                                <h3 class="font-bold text-slate-900 text-base">{{ $item->nama_obat }}</h3>
                                <p class="text-[11px] text-slate-400">📅 Exp Date: {{ $item->tanggal_kadaluarsa }}</p>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <p class="text-[10px] text-slate-400 uppercase font-mono">Stok Obat</p>
                                    <p class="font-bold text-slate-900 text-xs">{{ $item->stock_obat }} pcs</p>
                                </div>
                                <button class="bg-teal-600 hover:bg-teal-500 text-white text-xs px-4 py-2 rounded-xl font-semibold shadow-sm transition">🛒 Pesan</button>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-4 text-center py-12 text-slate-400 bg-white rounded-3xl border border-slate-200">Belum ada data obat di database.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- TAB 2: DASHBOARD KELOLA DB -->
            <div x-show="activeTab === 'db'" class="space-y-6">
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">🗄️ Dashboard Pengelolaan Database</h2>
                        <p class="text-xs text-slate-500 mt-1">Kelola data master Obat, Pelanggan, dan Staf Apotek dengan fitur CRUD lengkap.</p>
                    </div>
                    <div class="flex space-x-2 bg-slate-100 p-1.5 rounded-2xl">
                        <button @click="subTab = 'obat'" :class="subTab === 'obat' ? 'bg-white text-teal-700 shadow-sm font-bold' : 'text-slate-600 font-medium'" class="px-4 py-2 rounded-xl text-xs transition">Data Obat</button>
                        <button @click="subTab = 'pelanggan'" :class="subTab === 'pelanggan' ? 'bg-white text-teal-700 shadow-sm font-bold' : 'text-slate-600 font-medium'" class="px-4 py-2 rounded-xl text-xs transition">Data Pelanggan</button>
                        <button @click="subTab = 'staf'" :class="subTab === 'staf' ? 'bg-white text-teal-700 shadow-sm font-bold' : 'text-slate-600 font-medium'" class="px-4 py-2 rounded-xl text-xs transition">Staf Apotek</button>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-6">
                    <div class="flex flex-col sm:flex-row justify-between gap-4">
                        <input type="text" placeholder="Cari data..." class="px-4 py-2 border border-slate-200 rounded-xl text-xs w-full sm:w-72 bg-slate-50 focus:outline-teal-600">
                        <button @click="showModal = true; modalType = subTab" class="bg-teal-600 hover:bg-teal-500 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-sm transition flex items-center gap-2 justify-center">
                            + Tambah Data <span x-text="subTab.toUpperCase()"></span>
                        </button>
                    </div>

                    <!-- TABEL OBAT -->
                    <div x-show="subTab === 'obat'" class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider font-mono border-b border-slate-200">
                                    <th class="py-4 px-6">Kode</th>
                                    <th class="py-4 px-6">Nama Obat</th>
                                    <th class="py-4 px-6">Stok</th>
                                    <th class="py-4 px-6">Exp Date</th>
                                    <th class="py-4 px-6 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">
                                @forelse($obat as $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-mono text-slate-600">{{ $item->kode_obat }}</td>
                                    <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama_obat }}</td>
                                    <td class="py-4 px-6">{{ $item->stock_obat }} pcs</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->tanggal_kadaluarsa }}</td>
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <button class="text-teal-600 bg-teal-50 px-3 py-1.5 rounded-lg font-semibold hover:bg-teal-100 transition">✏️ Edit</button>
                                        <form action="{{ route('obat.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-rose-600 bg-rose-50 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center py-8 text-slate-400">Belum ada data obat.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- TABEL PELANGGAN -->
                    <div x-show="subTab === 'pelanggan'" class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider font-mono border-b border-slate-200">
                                    <th class="py-4 px-6">ID Pelanggan</th>
                                    <th class="py-4 px-6">Nama Lengkap</th>
                                    <th class="py-4 px-6">Email</th>
                                    <th class="py-4 px-6">No. Telepon</th>
                                    <th class="py-4 px-6">Alamat</th>
                                    <th class="py-4 px-6 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">
                                @forelse($pelanggan as $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-mono text-slate-600">{{ $item->kode_pelanggan }}</td>
                                    <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->email }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->no_hp }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->alamat }}</td>
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <button class="text-teal-600 bg-teal-50 px-3 py-1.5 rounded-lg font-semibold hover:bg-teal-100 transition">✏️ Edit</button>
                                        <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-rose-600 bg-rose-50 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center py-8 text-slate-400">Belum ada data pelanggan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- TABEL STAF -->
                    <div x-show="subTab === 'staf'" class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider font-mono border-b border-slate-200">
                                    <th class="py-4 px-6">Nama Staf</th>
                                    <th class="py-4 px-6">Tempat, Tanggal Lahir</th>
                                    <th class="py-4 px-6">No. Telepon</th>
                                    <th class="py-4 px-6">Alamat</th>
                                    <th class="py-4 px-6 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">
                                @forelse($staf as $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->no_hp }}</td>
                                    <td class="py-4 px-6 text-slate-500">{{ $item->alamat }}</td>
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <button class="text-teal-600 bg-teal-50 px-3 py-1.5 rounded-lg font-semibold hover:bg-teal-100 transition">✏️ Edit</button>
                                        <form action="{{ route('staf.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-rose-600 bg-rose-50 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center py-8 text-slate-400">Belum ada data staf.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 3: PANDUAN POSTMAN & GITHUB -->
            <div x-show="activeTab === 'panduan'" class="space-y-6">
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">🚀 Panduan Pengujian REST API di Postman</h2>
                        <p class="text-xs text-slate-500 mt-1">Gunakan endpoint berikut untuk menguji fitur API Laravel 11 pada saat presentasi[cite: 6].</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="border border-slate-200 rounded-2xl p-5 space-y-3 bg-slate-50/50">
                            <span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2 py-0.5 rounded font-mono">GET</span>
                            <h3 class="font-mono text-xs font-bold text-slate-900">/api/obat</h3>
                            <p class="text-[11px] text-slate-500">Mengambil seluruh daftar obat dari database obats[cite: 6].</p>
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-5 space-y-3 bg-slate-50/50">
                            <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2 py-0.5 rounded font-mono">POST</span>
                            <h3 class="font-mono text-xs font-bold text-slate-900">/api/obat</h3>
                            <p class="text-[11px] text-slate-500">Menambahkan data obat baru menggunakan payload JSON[cite: 6].</p>
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-5 space-y-3 bg-slate-50/50">
                            <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded font-mono">PUT</span>
                            <h3 class="font-mono text-xs font-bold text-slate-900">/api/obat/{id}</h3>
                            <p class="text-[11px] text-slate-500">Memperbarui data obat spesifik berdasarkan ID[cite: 6].</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- MODAL POPUP TAMBAH DATA -->
    <div x-show="showModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-6 shadow-2xl relative">
            <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                <h3 class="text-lg font-bold text-slate-900 capitalize" x-text="'Tambah Data ' + modalType"></h3>
                <button @click="showModal = false" class="text-slate-400 hover:text-slate-600 font-bold">✕</button>
            </div>

            <!-- Form Obat -->
            <form x-show="modalType === 'obat'" action="{{ route('obat.store') }}" method="POST" class="space-y-4">
                @csrf
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Kode Obat</label><input type="text" name="kode_obat" required placeholder="OBT-001" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Nama Obat</label><input type="text" name="nama_obat" required placeholder="Paracetamol 500mg" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Stok</label><input type="number" name="stock_obat" required placeholder="100" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Exp Date</label><input type="date" name="tanggal_kadaluarsa" required class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-500 text-white py-3 rounded-xl font-semibold text-xs shadow-sm transition">Simpan Data Obat</button>
            </form>

            <!-- Form Pelanggan -->
            <form x-show="modalType === 'pelanggan'" action="{{ route('pelanggan.store') }}" method="POST" class="space-y-4">
                @csrf
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Kode Pelanggan</label><input type="text" name="kode_pelanggan" required placeholder="PLG-001" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Nama Lengkap</label><input type="text" name="nama" required placeholder="Budi Santoso" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Email</label><input type="email" name="email" required placeholder="budi@gmail.com" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">No. Telepon</label><input type="text" name="no_hp" required placeholder="081234567890" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Alamat</label><textarea name="alamat" required placeholder="Jl. Merdeka No. 45" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></textarea></div>
                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-500 text-white py-3 rounded-xl font-semibold text-xs shadow-sm transition">Simpan Data Pelanggan</button>
            </form>

            <!-- Form Staf -->
            <form x-show="modalType === 'staf'" action="{{ route('staf.store') }}" method="POST" class="space-y-4">
                @csrf
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Nama Staf</label><input type="text" name="nama" required placeholder="Apoteker Rina" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Tempat Lahir</label><input type="text" name="tempat_lahir" required placeholder="Surabaya" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Tanggal Lahir</label><input type="date" name="tanggal_lahir" required class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">No. Telepon</label><input type="text" name="no_hp" required placeholder="082112233445" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></div>
                <div><label class="text-[11px] font-bold uppercase text-slate-500">Alamat</label><textarea name="alamat" required placeholder="Jl. Diponegoro" class="w-full px-4 py-2 border rounded-xl text-xs mt-1 bg-slate-50"></textarea></div>
                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-500 text-white py-3 rounded-xl font-semibold text-xs shadow-sm transition">Simpan Data Staf</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-400 mt-12">
        © 2026 ApotikOnline Laravel 11 REST API Project. Dibuat untuk Presentasi Tugas Kuliah[cite: 5, 7].
    </footer>
</body>
</html>