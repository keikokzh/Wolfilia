import { useState } from 'react';
import { Users, Plus, MapPin, Fish, Search, X, Calendar, ShoppingBag } from 'lucide-react';
import { partners as initialPartners } from '../data/mockData';

const fishColors = {
  Nila: 'bg-emerald-100 text-emerald-700',
  Lele: 'bg-amber-100 text-amber-700',
  Koi: 'bg-rose-100 text-rose-700',
  Gurame: 'bg-blue-100 text-blue-700',
  'Multi Spesies': 'bg-purple-100 text-purple-700',
};

export default function Partners() {
  const [data, setData] = useState(initialPartners);
  const [search, setSearch] = useState('');
  const [showModal, setShowModal] = useState(false);
  const [form, setForm] = useState({ name: '', location: '', fishType: 'Nila' });

  const filtered = data.filter((p) =>
    p.name.toLowerCase().includes(search.toLowerCase()) ||
    p.location.toLowerCase().includes(search.toLowerCase()) ||
    p.fishType.toLowerCase().includes(search.toLowerCase())
  );

  const handleAdd = (e) => {
    e.preventDefault();
    if (!form.name || !form.location) return;
    const initials = form.name.split(' ').map((w) => w[0]).join('').slice(0, 2).toUpperCase();
    const newPartner = {
      id: data.length + 1,
      name: form.name,
      location: form.location,
      fishType: form.fishType,
      totalOrders: 0,
      lastOrder: '—',
      status: 'Menunggu',
      avatar: initials,
    };
    setData([newPartner, ...data]);
    setForm({ name: '', location: '', fishType: 'Nila' });
    setShowModal(false);
  };

  return (
    <div className="p-6 lg:p-10 max-w-screen-2xl mx-auto">
      {/* Header */}
      <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8 animate-slide-up">
        <div>
          <h1 className="text-2xl lg:text-3xl font-bold text-slate-900 flex items-center gap-3">
            <Users className="w-8 h-8 text-emerald-500" />
            Jaringan Distribusi
          </h1>
          <p className="text-slate-500 mt-1">Database mitra pembudidaya dan riwayat pesanan.</p>
        </div>
        <button id="add-partner-btn" onClick={() => setShowModal(true)} className="inline-flex items-center gap-2 px-5 py-3 gradient-emerald text-white rounded-xl font-semibold text-sm hover:shadow-lg hover:shadow-emerald-200 hover:scale-105 transition-all duration-300">
          <Plus className="w-4 h-4" /> Tambah Mitra
        </button>
      </div>

      {/* Search + Stats */}
      <div className="flex flex-col sm:flex-row gap-5 mb-8 animate-slide-up stagger-1">
        <div className="relative flex-1">
          <Search className="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
          <input id="partner-search" type="text" placeholder="Cari mitra berdasarkan nama, lokasi, atau jenis ikan..." value={search} onChange={(e) => setSearch(e.target.value)} className="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all" />
        </div>
        <div className="flex gap-4">
          <div className="px-5 py-4 rounded-xl bg-emerald-50 border border-emerald-100 text-center min-w-[110px]">
            <p className="text-lg font-bold text-emerald-700">{data.filter((p) => p.status === 'Aktif').length}</p>
            <p className="text-[10px] font-medium text-emerald-600 uppercase">Aktif</p>
          </div>
          <div className="px-5 py-4 rounded-xl bg-amber-50 border border-amber-100 text-center min-w-[110px]">
            <p className="text-lg font-bold text-amber-700">{data.filter((p) => p.status === 'Menunggu').length}</p>
            <p className="text-[10px] font-medium text-amber-600 uppercase">Menunggu</p>
          </div>
        </div>
      </div>

      {/* Partner Cards */}
      <div className="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">
        {filtered.map((p, i) => (
          <div key={p.id} className={`bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-xl hover:shadow-emerald-50 hover:-translate-y-1 transition-all duration-300 animate-slide-up stagger-${(i % 4) + 1}`}>
            <div className="flex items-start gap-4 mb-6">
              <div className="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white font-bold text-sm shrink-0">
                {p.avatar}
              </div>
              <div className="flex-1 min-w-0">
                <p className="font-bold text-slate-900 truncate">{p.name}</p>
                <p className="text-sm text-slate-400 flex items-center gap-1 mt-0.5">
                  <MapPin className="w-3 h-3" /> {p.location}
                </p>
              </div>
              <span className={`text-[10px] font-bold px-2.5 py-1 rounded-full ${p.status === 'Aktif' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}`}>
                {p.status}
              </span>
            </div>

            <div className="space-y-4">
              <div className="flex items-center justify-between">
                <span className="flex items-center gap-2 text-sm text-slate-500">
                  <Fish className="w-4 h-4 text-emerald-400" /> Jenis Ikan
                </span>
                <span className={`text-xs font-semibold px-2.5 py-1 rounded-full ${fishColors[p.fishType] || 'bg-slate-100 text-slate-600'}`}>
                  {p.fishType}
                </span>
              </div>
              <div className="flex items-center justify-between">
                <span className="flex items-center gap-2 text-sm text-slate-500">
                  <ShoppingBag className="w-4 h-4 text-blue-400" /> Total Pesanan
                </span>
                <span className="text-sm font-semibold text-slate-800">{p.totalOrders}</span>
              </div>
              <div className="flex items-center justify-between">
                <span className="flex items-center gap-2 text-sm text-slate-500">
                  <Calendar className="w-4 h-4 text-slate-400" /> Pesanan Terakhir
                </span>
                <span className="text-sm font-semibold text-slate-800">{p.lastOrder}</span>
              </div>
            </div>
          </div>
        ))}
      </div>

      {filtered.length === 0 && (
        <div className="text-center py-16">
          <Users className="w-16 h-16 text-slate-200 mx-auto mb-4" />
          <p className="text-slate-400 text-lg">Mitra tidak ditemukan.</p>
        </div>
      )}

      {/* Modal */}
      {showModal && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 animate-fade-in">
          <div className="absolute inset-0 bg-black/50" onClick={() => setShowModal(false)} />
          <div className="relative bg-white rounded-2xl p-10 w-full max-w-md shadow-2xl animate-slide-up">
            <div className="flex items-center justify-between mb-6">
              <h3 className="text-xl font-bold text-slate-900">Tambah Mitra</h3>
              <button onClick={() => setShowModal(false)} className="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                <X className="w-5 h-5 text-slate-400" />
              </button>
            </div>
            <form onSubmit={handleAdd} className="space-y-5">
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-2">Nama Mitra</label>
                <input type="text" placeholder="mis. Pak Joko Widodo" value={form.name} onChange={(e) => setForm({ ...form, name: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" required />
              </div>
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-2">Lokasi</label>
                <input type="text" placeholder="mis. Bandung, Jawa Barat" value={form.location} onChange={(e) => setForm({ ...form, location: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" required />
              </div>
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-2">Jenis Ikan</label>
                <select value={form.fishType} onChange={(e) => setForm({ ...form, fishType: e.target.value })} className="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                  <option>Nila</option>
                  <option>Lele</option>
                  <option>Koi</option>
                  <option>Gurame</option>
                  <option>Multi Spesies</option>
                </select>
              </div>
              <button id="submit-partner" type="submit" className="w-full py-3 gradient-emerald text-white rounded-xl font-semibold text-sm hover:shadow-lg hover:shadow-emerald-200 transition-all duration-300 mt-2">
                Tambah Mitra
              </button>
            </form>
          </div>
        </div>
      )}
    </div>
  );
}
