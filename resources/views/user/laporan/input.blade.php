@extends('layouts.master')
@section('konten')

<div class="row justify-content-center">
  <div class="col-lg-7 col-md-9">
    <div class="form-ireport">
      <div class="form-section-title">
        <i class="fas fa-plus-circle me-2" style="color:var(--ir-blue)"></i>Buat Laporan Baru
      </div>

      <form action="/laporan" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label>Kategori</label>
          <select class="form-control" name="kategori">
            <option value="" selected disabled>Pilih kategori kerusakan</option>
            <option value="Jalan Raya">Jalan Raya</option>
            <option value="Trotoar">Trotoar</option>
            <option value="Penerangan jalan">Penerangan Jalan</option>
            <option value="Gorong-gorong">Gorong-gorong</option>
          </select>
          @error('kategori')
            <div class="invalid-feedback d-block" style="font-size:.78rem">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label>Tanggal Laporan</label>
          <input type="date" class="form-control" name="tanggal">
          @error('tanggal')
            <div class="invalid-feedback d-block" style="font-size:.78rem">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label>Provinsi</label>
          <select class="form-control" name="provinsi">
            <option value="" selected disabled>Pilih provinsi</option>
            @foreach ($data as $item)
              <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
            @endforeach
          </select>
          @error('provinsi')
            <div class="invalid-feedback d-block" style="font-size:.78rem">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label>Detail Lokasi</label>
          <textarea name="lokasi" rows="2" class="form-control"
            placeholder="Alamat lengkap / patokan lokasi"></textarea>
          @error('lokasi')
            <div class="invalid-feedback d-block" style="font-size:.78rem">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label>Foto Kerusakan</label>
          <input type="file" class="form-control" name="fotoLokasi" accept="image/*">
          @error('fotoLokasi')
            <div class="invalid-feedback d-block" style="font-size:.78rem">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label>Keterangan</label>
          <textarea name="keterangan" rows="4" class="form-control"
            placeholder="Jelaskan kondisi kerusakan secara detail"></textarea>
          @error('keterangan')
            <div class="invalid-feedback d-block" style="font-size:.78rem">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn btn-primary px-4"
            style="border-radius:8px;font-family:'Poppins',sans-serif;font-size:.85rem">
            <i class="fas fa-paper-plane me-1"></i> Kirim Laporan
          </button>
          <a href="/laporan" class="btn btn-outline-secondary px-4"
            style="border-radius:8px;font-family:'Poppins',sans-serif;font-size:.85rem">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
