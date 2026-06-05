/* Data laporan — inline agar bekerja via file:// maupun HTTP */
const LAPORAN_DATA = [
  { id:1, kategori:"Jalan Raya",       provinsi:"JAWA TIMUR",    alamat:"Jl. Mojokerto Selatan No. 14",  tanggal:"19 Mar 2022", vote:5, status:"Diproses" },
  { id:2, kategori:"Penerangan Jalan", provinsi:"JAWA TIMUR",    alamat:"Jl. Pahlawan, Pusat Kota",      tanggal:"5 Apr 2022",  vote:3, status:"Baru"      },
  { id:3, kategori:"Trotoar",          provinsi:"JAWA BARAT",    alamat:"Jl. Pajajaran, Bogor Kota",     tanggal:"2 Mei 2022",  vote:8, status:"Selesai"   },
  { id:4, kategori:"Gorong-gorong",    provinsi:"DKI JAKARTA",   alamat:"Jl. Kebon Jeruk Raya",          tanggal:"10 Apr 2022", vote:6, status:"Diproses" },
  { id:5, kategori:"Jalan Raya",       provinsi:"JAWA TENGAH",   alamat:"Jl. Solo–Semarang KM 42",       tanggal:"15 Mar 2022", vote:4, status:"Baru"      },
  { id:6, kategori:"Trotoar",          provinsi:"DI YOGYAKARTA", alamat:"Jl. Malioboro, Gamping",        tanggal:"20 Apr 2022", vote:7, status:"Selesai"   },
  { id:7, kategori:"Penerangan Jalan", provinsi:"BANTEN",        alamat:"Jl. Raya Serpong, BSD City",    tanggal:"8 Mei 2022",  vote:2, status:"Baru"      },
  { id:8, kategori:"Gorong-gorong",    provinsi:"SUMATERA UTARA",alamat:"Jl. Gatot Subroto, Medan",      tanggal:"1 Jun 2022",  vote:9, status:"Diproses" }
];

/* ===========================
   CATEGORY CONFIG
=========================== */
const CAT_CONFIG = {
  'Jalan Raya':        { cls: 'cat-jalan',  icon: 'fa-road' },
  'Trotoar':           { cls: 'cat-trotoar', icon: 'fa-person-walking' },
  'Penerangan Jalan':  { cls: 'cat-lampu',   icon: 'fa-lightbulb' },
  'Gorong-gorong':     { cls: 'cat-gorong',  icon: 'fa-water' },
};

/* ===========================
   STATUS BADGE
=========================== */
function badgeClass(status) {
  const s = (status || '').toLowerCase();
  if (s.includes('selesai')) return 'badge-selesai';
  if (s.includes('proses'))  return 'badge-proses';
  if (s.includes('tolak'))   return 'badge-ditolak';
  return 'badge-baru';
}

/* ===========================
   RENDER LAPORAN
=========================== */
function renderLaporan() {
  const container = document.getElementById('laporan-container');
  const countEl   = document.getElementById('laporan-count');

  if (countEl) countEl.textContent = `Menampilkan ${LAPORAN_DATA.length} laporan`;

  container.innerHTML = LAPORAN_DATA.map(lap => {
    const cat  = CAT_CONFIG[lap.kategori] || { cls: 'cat-gorong', icon: 'fa-circle-exclamation' };
    const stat = lap.status || 'Baru';
    const alamatShort = lap.alamat.length > 30 ? lap.alamat.slice(0, 30) + '…' : lap.alamat;

    return `
      <div class="card-laporan">
        <div class="card-img-placeholder ${cat.cls}">
          <i class="fa-solid ${cat.icon} card-img-icon"></i>
          <span class="card-img-label">${lap.kategori}</span>
        </div>
        <div class="card-body">
          <div class="card-kategori">${lap.kategori}</div>
          <div class="card-meta">
            <i class="fa-solid fa-map-marker-alt"></i>
            ${lap.provinsi} &mdash; ${alamatShort}
          </div>
          <div class="card-meta">
            <i class="fa-regular fa-calendar-alt"></i>
            ${lap.tanggal}
          </div>
          <div class="card-footer">
            <span class="badge-status ${badgeClass(stat)}">${stat}</span>
            <div class="vote-chip">
              <a href="#" title="Upvote"><i class="fa-solid fa-caret-up"></i></a>
              <span class="vote-num">${lap.vote}</span>
              <a href="#" title="Downvote"><i class="fa-solid fa-caret-down"></i></a>
            </div>
          </div>
          <a href="#" class="btn-detail">Lihat Detail</a>
        </div>
      </div>`;
  }).join('');
}

/* ===========================
   MOBILE NAV TOGGLE
=========================== */
function initNavToggle() {
  const toggle = document.getElementById('navToggle');
  const menu   = document.getElementById('navMenu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', () => menu.classList.toggle('open'));
}

/* ===========================
   INIT
=========================== */
renderLaporan();
initNavToggle();
