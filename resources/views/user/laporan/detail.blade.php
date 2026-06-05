@extends('layouts.master')
@section('konten')

<div class="row justify-content-center">
  <div class="col-lg-8 col-md-10">

    {{-- Kartu Detail Laporan --}}
    <div class="detail-card">
      <img class="detail-img" src="{{ asset('image/'.$detail->foto) }}" alt="{{ $detail->kategori }}">

      <div class="detail-body">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-3">
          <h4 class="detail-title mb-0">{{ $detail->kategori }}</h4>
          @php
            $status = strtolower($detail->status ?? 'baru');
            $badgeClass = match(true) {
              str_contains($status, 'selesai') => 'badge-selesai',
              str_contains($status, 'proses')  => 'badge-proses',
              str_contains($status, 'tolak')   => 'badge-ditolak',
              default => 'badge-baru',
            };
          @endphp
          <span class="badge-status {{ $badgeClass }}">{{ $detail->status ?? 'Baru' }}</span>
        </div>

        <div class="detail-meta"><i class="fas fa-map-marker-alt"></i> {{ $detail->alamat }}</div>
        <div class="detail-meta"><i class="fas fa-map"></i> {{ $detail->provinsi }}</div>
        <div class="detail-meta"><i class="far fa-calendar-alt"></i> {{ $detail->tanggal }}</div>

        <p class="detail-desc">{{ $detail->keterangan }}</p>

        {{-- Vote + Aksi --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3">
          <div class="vote-chip">
            <a href="/laporanupvote/{{ $detail->id }}" title="Upvote">
              <i class="fas fa-caret-up"></i>
            </a>
            <span class="vote-num">{{ $detail->vote }}</span>
            <a href="/laporandownvote/{{ $detail->id }}" title="Downvote">
              <i class="fas fa-caret-down"></i>
            </a>
          </div>

          @auth
          <div class="d-flex gap-2">
            <a href="/laporan/{{ $detail->id }}/edit" class="btn btn-warning btn-sm"
              style="border-radius:7px;font-size:.78rem">
              <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="/laporan/{{ $detail->id }}" method="POST" class="d-inline"
              onsubmit="return confirm('Yakin hapus laporan ini?')">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm"
                style="border-radius:7px;font-size:.78rem">
                <i class="fas fa-trash me-1"></i> Hapus
              </button>
            </form>
          </div>
          @endauth
        </div>
      </div>
    </div>

    {{-- Komentar --}}
    <div class="komentar-box">
      <h6><i class="fas fa-comments me-2" style="color:var(--ir-blue)"></i>Komentar</h6>

      {{-- Form komentar --}}
      <div class="komentar-form">
        <form action="/laporan/{{ $detail->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          <textarea name="isi" rows="3" class="form-control mb-2"
            placeholder="Tulis komentar..."></textarea>
          @error('isi')
            <div class="alert alert-danger py-1 mb-2" style="font-size:.8rem">{{ $message }}</div>
          @enderror
          <button type="submit" class="btn btn-secondary btn-sm"
            style="border-radius:7px;font-size:.78rem">
            <i class="fas fa-paper-plane me-1"></i> Kirim
          </button>
        </form>
      </div>

      {{-- Daftar komentar --}}
      <div class="komentar-list">
        @forelse ($komen as $k)
          <div class="komentar-item">
            <img class="komentar-avatar"
              src="{{ asset('image/'.$k->foto) }}" alt="{{ $k->nama }}">
            <div class="flex-grow-1">
              <div class="komentar-nama">{{ $k->nama }}</div>
              <div class="komentar-time">{{ $k->created_at }}</div>
              <div class="komentar-isi">{{ $k->isi }}</div>
            </div>
            @auth
            <form action="/laporan/{{ $k->id }}" method="POST" class="ms-2 align-self-start"
              onsubmit="return confirm('Hapus komentar?')">
              @csrf
              @method('delete')
              <button type="submit" class="btn-komentar-delete" title="Hapus">
                <i class="fas fa-times"></i>
              </button>
            </form>
            @endauth
          </div>
        @empty
          <p style="font-size:.8rem;color:#9ca3af;text-align:center;padding:.75rem 0">
            Belum ada komentar. Jadilah yang pertama!
          </p>
        @endforelse
      </div>
    </div>

  </div>
</div>

@endsection
