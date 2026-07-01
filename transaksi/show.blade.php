<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                {{-- Breadcrumb --}}
                <div class="col-12 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">transaksi</a></li>
                            <li class="breadcrumb-item active">{{ $transaksi->kode_transaksi }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            {{-- Reminder Terlambat --}}
            @if ($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
                <div class="alert alert-danger mb-4">
                    <h5 class="mb-2">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        Peringatan Keterlambatan
                    </h5>
                    <p class="mb-1">
                        Buku ini telah melewati batas waktu pengembalian.
                    </p>
                    <strong>
                        Terlambat {{ (int) $transaksi->terlambat }} hari.
                    </strong>

                    <hr>

                    <small>
                        Segera lakukan proses pengembalian agar denda tidak terus bertambah.
                    </small>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle"></i>
                        Informasi Transaksi
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Kode Transaksi</th>
                            <td>{{ $transaksi->kode_transaksi }}</td>
                        </tr>

                        <tr>
                            <th>Nama Anggota</th>
                            <td>{{ $transaksi->anggota->nama }}</td>
                        </tr>

                        <tr>
                            <th>Kode Anggota</th>
                            <td>{{ $transaksi->anggota->kode_anggota }}</td>
                        </tr>

                        <tr>
                            <th>Judul Buku</th>
                            <td>{{ $transaksi->buku->judul }}</td>
                        </tr>

                        <tr>
                            <th>Kode Buku</th>
                            <td>{{ $transaksi->buku->kode_buku }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Pinjam</th>
                            <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Dikembalikan</th>
                            <td>
                                @if ($transaksi->tanggal_dikembalikan)
                                    {{ $transaksi->tanggal_dikembalikan->format('d M Y') }}
                                @else
                                    <span class="text-muted">Belum dikembalikan</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($transaksi->status == 'Dipinjam')
                                    <span class="badge bg-warning text-dark">
                                        Dipinjam
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Denda</th>
                            <td>
                                <strong class="text-danger">
                                    Rp {{ number_format($transaksi->denda_berjalan, 0, ',', '.') }}
                                </strong>
                            </td>
                        </tr>

                        <tr>
                            <th>Keterangan</th>
                            <td>
                                {{ $transaksi->keterangan ?? '-' }}
                            </td>
                        </tr>
                    </table>

                    <hr class="mb-3">

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        @if ($transaksi->status == 'Dipinjam')
                            <form action="{{ route('transaksi.kembalikan', $transaksi->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Yakin buku akan dikembalikan?')">
                                    <i class="bi bi-check-circle"></i>
                                    Kembalikan Buku
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
