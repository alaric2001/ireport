@extends('layouts.master')
@section('konten')

{{-- Search + Filter Bar --}}
<div class="search-bar-wrapper">
  <form class="d-flex flex-grow-1 gap-2" method="GET" action="/laporan" style="flex:1 1 auto">
    <input value="{{ request('search') }}" name="search"
      class="form-control" type="search"
      placeholder="Cari laporan...">
    <button class="btn btn-primary btn-sm px-3" type="submit">
      <i class="fas fa-search"></i>
    </button>
  </form>

  <div class="dropdown">
    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
      id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-filter me-1"></i> Filter Provinsi
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown"
        style="max-height:280px;overflow-y:auto">
      @foreach ($data as $item)
        <li>
          <a class="dropdown-item {{ request()->is('laporan_/'.$item['name']) ? 'active' : '' }}"
            href="/laporan_/{{ $item['name'] }}">
            {{ $item['name'] }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

{{-- Active search tag --}}
@if (request('search'))
<div>
  <a href="/laporan" class="search-tag">
    <i class="fas fa-times-circle"></i>
    {{ request('search') }}
  </a>
</div>
@endif

{{-- Laporan Grid --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-3" style="padding-bottom:100px">
  @forelse ($tampil as $laporan)
    <div class="col">
      <div class="card-laporan">
        <img class="lap-img" src="{{ asset('image/'.$laporan->foto) }}" alt="{{ $laporan->kategori }}">
        <div class="card-body">
          <div class="lap-kategori">{{ $laporan->kategori }}</div>

          <div class="lap-meta">
            <i class="fas fa-map-marker-alt"></i>
            {{ Str::limit($laporan->provinsi.', '.$laporan->alamat, 28) }}
          </div>
          <div class="lap-meta">
            <i class="far fa-clock"></i>
            {{ $laporan->tanggal }}
          </div>

          <div class="lap-footer">
            @php
              $status = strtolower($laporan->status ?? 'baru');
              $badgeClass = match(true) {
                str_contains($status, 'selesai') => 'badge-selesai',
                str_contains($status, 'proses')  => 'badge-proses',
                str_contains($status, 'tolak')   => 'badge-ditolak',
                default => 'badge-baru',
              };
            @endphp
            <span class="badge-status {{ $badgeClass }}">{{ $laporan->status ?? 'Baru' }}</span>

            <div class="vote-chip">
              <a href="/laporanupvote/{{ $laporan->id }}" title="Upvote">
                <i class="fas fa-caret-up"></i>
              </a>
              <span class="vote-num">{{ $laporan->vote }}</span>
              <a href="/laporandownvote/{{ $laporan->id }}" title="Downvote">
                <i class="fas fa-caret-down"></i>
              </a>
            </div>
          </div>

          <a href="/laporan/{{ $laporan->id }}" class="btn btn-primary btn-sm w-100 mt-2"
            style="border-radius:7px;font-size:.78rem;font-family:'Poppins',sans-serif">
            Lihat Detail
          </a>
        </div>
      </div>
    </div>
  @empty
    <div class="col-12">
      <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <p>Belum ada laporan ditemukan.</p>
      </div>
    </div>
  @endforelse
</div>

@endsection
