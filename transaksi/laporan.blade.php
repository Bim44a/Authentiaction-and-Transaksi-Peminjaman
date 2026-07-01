<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="bi bi-file-earmark-text"></i> Laporan Transaksi
            </h2>

            <a href="{{ route('transaksi.exportPdf', request()->query()) }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf"></i>
                Export PDF
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistik --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Total Transaksi</h6>
                                    <h2>{{ $totalTransaksi }}</h2>
                                </div>
                                <i class="bi bi-arrow-left-right text-primary" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-danger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Total Denda</h6>
                                    <h1 class="text-danger">
                                        Rp {{ number_format($totalDenda, 0, ',', '.') }}
                                    </h1>
                                </div>
                                <i class="bi bi-cash-stack text-danger" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <form action="{{ route('transaksi.laporan') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            Tanggal Dari
                        </label>
                        <input type="date" name="tanggal_dari" class="form-control"
                            value="{{ request('tanggal_dari') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            Tanggal Sampai
                        </label>
                        <input type="date" name="tanggal_sampai" class="form-control"
                            value="{{ request('tanggal_sampai') }}">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Status
                        </label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>
                                Dipinjam
                            </option>
                            <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>
                                Dikembalikan
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Anggota
                        </label>
                        <select name="anggota_id" class="form-select">
                            <option value="">Semua Anggota</option>

                            @foreach ($anggotas as $anggota)
                                <option value="{{ $anggota->id }}"
                                    {{ request('anggota_id') == $anggota->id ? 'selected' : '' }}>
                                    {{ $anggota->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Cari
                            </button>

                            <a href="{{ route('transaksi.laporan') }}" class="btn btn-secondary">
                                <i class="bi bi-x"></i> Reset
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Tabel --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <code>{{ $transaksi->kode_transaksi }}</code>
                                        </td>

                                        <td>
                                            <strong>{{ $transaksi->anggota->nama }}</strong>
                                        </td>

                                        <td>{{ $transaksi->buku->judul }}</td>

                                        <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>

                                        <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>

                                        <td>
                                            @if ($transaksi->status == 'Dipinjam')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-book"></i> Dipinjam
                                                </span>
                                            @else
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle"></i> Dikembalikan
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <span
                                                class="{{ $transaksi->denda > 0 ? 'text-danger fw-bold' : 'text-success' }}">
                                                Rp {{ number_format($transaksi->denda, 0, ',', '.') }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            <i class="bi bi-inbox"></i>
                                            Tidak ada data transaksi
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-3">
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
