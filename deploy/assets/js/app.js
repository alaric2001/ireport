async function loadJSON(path) {
  const res = await fetch(path);
  return res.json();
}

async function renderStats() {
  const data = await loadJSON('assets/data/stats.json');
  document.getElementById('stats-container').innerHTML = data
    .map(s => `<div class="stat-item"><span class="num">${s.num}</span><span class="label">${s.label}</span></div>`)
    .join('');
}

async function renderFeatures() {
  const data = await loadJSON('assets/data/features.json');
  document.getElementById('features-container').innerHTML = data
    .map(f => `
      <div class="feature-card">
        <div class="feature-icon fi-${f.color}"><i class="fa-solid ${f.icon}"></i></div>
        <h3>${f.title}</h3>
        <p>${f.desc}</p>
        ${f.table ? `<span class="feature-table-badge"><i class="fa-solid fa-table" style="font-size:.6rem;margin-right:4px"></i>${f.table}</span>` : ''}
      </div>`)
    .join('');
}

async function renderRoles() {
  const colorMap  = { gray: 'ra-gray', blue: 'ra-blue', amber: 'ra-amber' };
  const numMap    = { gray: 'rn-gray', blue: 'rn-blue', amber: 'rn-amber' };
  const data = await loadJSON('assets/data/roles.json');
  document.getElementById('roles-container').innerHTML = data
    .map(r => `
      <div class="role-card ${r.key}">
        <div class="role-header">
          <div class="role-avatar ${colorMap[r.color] || 'ra-gray'}">
            <i class="fa-solid ${r.icon}"></i>
          </div>
          <div>
            <h3>${r.title}</h3>
            <p>${r.subtitle}</p>
          </div>
        </div>
        <ul class="role-list">
          ${r.permissions.map(p => `<li><i class="fa-solid fa-check"></i> ${p}</li>`).join('')}
        </ul>
      </div>`)
    .join('');
}

async function renderTech() {
  const data = await loadJSON('assets/data/tech.json');
  document.getElementById('tech-container').innerHTML = data
    .map(t => `
      <div class="tech-badge">
        <i class="${t.icon}" style="color:${t.color}"></i>
        <div class="tech-badge-info">
          <span class="tech-badge-name">${t.name}</span>
          <span class="tech-badge-ver">${t.version}</span>
          <span class="tech-badge-desc">${t.desc}</span>
        </div>
      </div>`)
    .join('');
}

async function renderTeam() {
  const data = await loadJSON('assets/data/team.json');
  document.getElementById('team-container').innerHTML = data
    .map(m => `
      <div class="team-card">
        <div class="team-avatar" style="background:linear-gradient(${m.gradient})">${m.initial}</div>
        <h4>${m.name}</h4>
        <p>"${m.quote}"</p>
      </div>`)
    .join('');
}

Promise.all([
  renderStats(),
  renderFeatures(),
  renderRoles(),
  renderTech(),
  renderTeam(),
]);
