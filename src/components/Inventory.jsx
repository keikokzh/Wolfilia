import { useState } from 'react';
import { FlaskConical, Plus, Droplets, Thermometer, Eye, CloudRain, Activity, Search, X } from 'lucide-react';
import { containers } from '../data/mockData';

const statusStyle = (s) => {
  if (s === 'Optimal') return 'bg-emerald-100 text-emerald-700';
  if (s === 'Baik') return 'bg-blue-100 text-blue-700';
  if (s === 'Siap Panen') return 'bg-amber-100 text-amber-700';
  return 'bg-red-100 text-red-700';
};

const densityBar = (d) => {
  if (d === 'Sangat Tinggi') return 95;
  if (d === 'Tinggi') return 75;
  if (d === 'Sedang') return 50;
  return 25;
};

export default function Inventory() {
  const [data, setData] = useState(containers);
  const [search, setSearch] = useState('');
  const [showModal, setShowModal] = useState(false);
  const [form, setForm] = useState({ id: '', ph: '', temperature: '', density: 'Sedang', hydration: '' });

  const filtered = data.filter((c) => c.id.toLowerCase().includes(search.toLowerCase()));

  const handleAdd = (e) => {
    e.preventDefault();
    const newItem = {
      id: form.id || `WFC-${String(data.length + 1).padStart(3, '0')}`,
      ph: parseFloat(form.ph) || 7.0,
      temperature: parseFloat(form.temperature) || 24.0,
      density: form.density,
      hydration: parseInt(form.hydration) || 85,
      status: 'Baik',
      lastChecked: 'Baru saja',
    };
    setData([newItem, ...data]);
    setForm({ id: '', ph: '', temperature: '', density: 'Sedang', hydration: '' });
    setShowModal(false);
  };

  return (
    <div className="p-6 lg:p-10 max-w-screen-2xl mx-auto">
      {/* Header */}
      <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8 animate-slide-up">
        <div>
          <h1 className="text-2xl lg:text-3xl font-bold text-slate-900 flex items-center gap-3">
            <FlaskConical className="w-8 h-8 text-emerald-500" />
            Operasional Vitalitas
          </h1>
          <p className="text-slate-500 mt-1">Pantau dan kelola kondisi kontainer secara real-time.</p>
        </div>
        <button id="new-batch-btn" onClick={() => setShowModal(true)} className="inline-flex items-center gap-2 px-5 py-3 gradient-emerald text-white rounded-xl font-semibold text-sm hover:shadow-lg hover:shadow-emerald-200 hover:scale-105 transition-all duration-300">
          <Plus className="w-4 h-4" /> Batch Baru
        </button>
      </div>

      {/* Search */}
      <div className="relative mb-8 animate-slide-up stagger-1">
        <Search className="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
        <input id="container-search" type="text" placeholder="Cari kontainer..." value={search} onChange={(e) => setSearch(e.target.value)} className="w-full sm:w-80 pl-11 pr-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all" />
      </div>

      {/* Container Grid */}
      <div className="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">
        {filtered.map((c, i) => (
          <div key={c.id} className={`bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-xl hover:shadow-emerald-50 hover:-translate-y-1 transition-all duration-300 animate-slide-up stagger-${(i % 4) + 1}`}>
            {/* Header */}
            <div className="flex items-center justify-between mb-6">
              <div className="flex items-center gap-3">
                <div className="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                  <FlaskConical className="w-5 h-5 text-emerald-600" />
                </div>
                <div>
                  <p className="font-bold text-slate-900">{c.id}</p>
                  <p className="text-xs text-slate-400">{c.lastChecked}</p>
                </div>
              </div>
              <span className={`text-[10px] font-bold px-2.5 py-1 rounded-full ${statusStyle(c.status)}`}>{c.status}</span>
            </div>

            {/* Metrics */}
            <div className="space-y-5">
              <div className="flex items-center justify-between">
                <span className="flex items-center gap-2 text-sm text-slate-500"><Droplets className="w-4 h-4 text-blue-400" /> pH Air</span>
                <span className="text-sm font-semibold text-slate-800">{c.ph}</span>
              </div>
              <div className="flex items-center justify-between">
                <span className="flex items-center gap-2 text-sm text-slate-500"><Thermometer className="w-4 h-4 text-orange-400" /> Suhu</span>
                <span className="text-sm font-semibold text-slate-800">{c.temperature}°C</span>
              </div>
              <div>
                <div className="flex items-center justify-between mb-2.5">
                  <span className="flex items-center gap-2 text-sm text-slate-500"><Eye className="w-4 h-4 text-purple-400" /> Kepadatan Visual</span>
                  <span className="text-sm font-semibold text-slate-800">{c.density}</span>
                </div>
                <div className="w-full bg-slate-100 rounded-full h-3">
                  <div className="h-3 rounded-full gradient-emerald transition-all duration-700" style={{ width: `${densityBar(c.density)}%` }} />
                </div>
              </div>
              <div>
                <div className="flex items-center justify-between mb-2.5">
                  <span className="flex items-center gap-2 text-sm text-slate-500"><CloudRain className="w-4 h-4 text-cyan-400" /> Hidrasi</span>
                  <span className="text-sm font-semibold text-slate-800">{c.hydration}%</span>
                </div>
                <div className="w-full bg-slate-100 rounded-full h-3">
                  <div className="h-3 rounded-full bg-gradient-to-r from-cyan-400 to-emerald-400 transition-all duration-700" style={{ width: `${c.hydration}%` }} />
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>

      {/* Modal */}
      {showModal && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 animate-fade-in">
          <div className="absolute inset-0 bg-black/50" onClick={() => setShowModal(false)} />
          <div className="relative bg-white rounded-2xl p-10 w-full max-w-md shadow-2xl animate-slide-up">
            <div className="flex items-center justify-between mb-6">
              <h3 className="text-xl font-bold text-slate-900">Batch Baru</h3>
              <button onClick={() => setShowModal(false)} className="p-2 rounded-lg hover:bg-slate-100 transition-colors"><X className="w-5 h-5 text-slate-400" /></button>
            </div>
            <form onSubmit={handleAdd} className="space-y-5">
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-2">ID Kontainer</label>
                <input type="text" placeholder="mis. WFC-007" value={form.id} onChange={(e) => setForm({ ...form, id: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" />
              </div>
              <div className="grid grid-cols-2 gap-5">
                <div>
                  <label className="block text-sm font-medium text-slate-700 mb-2">pH Air</label>
                  <input type="number" step="0.1" placeholder="7.0" value={form.ph} onChange={(e) => setForm({ ...form, ph: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" />
                </div>
                <div>
                  <label className="block text-sm font-medium text-slate-700 mb-2">Suhu (°C)</label>
                  <input type="number" step="0.1" placeholder="24.0" value={form.temperature} onChange={(e) => setForm({ ...form, temperature: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" />
                </div>
              </div>
              <div className="grid grid-cols-2 gap-5">
                <div>
                  <label className="block text-sm font-medium text-slate-700 mb-2">Kepadatan</label>
                  <select value={form.density} onChange={(e) => setForm({ ...form, density: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option>Rendah</option><option>Sedang</option><option>Tinggi</option><option>Sangat Tinggi</option>
                  </select>
                </div>
                <div>
                  <label className="block text-sm font-medium text-slate-700 mb-2">Hidrasi %</label>
                  <input type="number" placeholder="85" value={form.hydration} onChange={(e) => setForm({ ...form, hydration: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" />
                </div>
              </div>
              <button id="submit-batch" type="submit" className="w-full py-3 gradient-emerald text-white rounded-xl font-semibold text-sm hover:shadow-lg hover:shadow-emerald-200 transition-all duration-300 mt-2">
                Tambah Kontainer
              </button>
            </form>
          </div>
        </div>
      )}
    </div>
  );
}
