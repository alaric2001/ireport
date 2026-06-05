@extends('layouts.master')
@section('konten')

<div class="row justify-content-center">
  <div class="col-lg-10">
    <div style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,.1)">

      {{-- Logo --}}
      <div class="text-center py-4" style="border-bottom:1px solid #f1f5f9">
        <img src="{{ URL::to('logoIREPORT_full.png') }}" alt="iReport" class="img-fluid" style="width:240px">
      </div>

      {{-- Konten --}}
      <div class="row g-0">
        <div class="col-md-6">
          <img src="{{ URL::to('CONSTRUCTION.jpg') }}" alt="Construction" class="img-fluid w-100 h-100" style="object-fit:cover;min-height:260px">
        </div>
        <div class="col-md-6 d-flex align-items-center p-4">
          <p style="font-family:'Poppins',sans-serif;font-size:.9rem;color:#374151;line-height:1.75;margin:0">
            Website iReport memfasilitasi masyarakat Indonesia dalam memberikan informasi kerusakan fasilitas publik seperti jalan raya, trotoar, penerangan jalan, maupun saluran air. Ketika masyarakat menemukan fasilitas publik yang perlu diperbaiki, cukup foto kondisinya dan kirimkan melalui halaman laporan di website iReport.
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
