import { Box, Leaf, Thermometer, CheckCircle, TrendingUp, ArrowUpRight, ArrowDownRight, Package } from 'lucide-react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer, Area, AreaChart } from 'recharts';
import { summaryCards, growthData, distributionLog } from '../data/mockData';

const iconMap = { box: Box, leaf: Leaf, thermometer: Thermometer, 'check-circle': CheckCircle };

const statusColor = (status) => {
  if (status === 'Terkirim') return 'status-delivered';
  if (status === 'Dalam Perjalanan') return 'status-transit';
  return 'status-processing';
};

function SummaryCard({ card, index }) {
  const Icon = iconMap[card.icon];
  return (
    <div className={`gradient-card rounded-2xl p-7 border border-emerald-100/50 hover:shadow-xl hover:shadow-emerald-100/30 hover:-translate-y-1 transition-all duration-300 animate-slide-up stagger-${index + 1}`}>
      <div className="flex items-start justify-between mb-5">
        <div className="w-12 h-12 rounded-xl gradient-emerald flex items-center justify-center">
          <Icon className="w-6 h-6 text-white" />
        </div>
        <span className={`inline-flex items-center gap-1 text-xs font-semibold px-3 py-2 rounded-full ${card.changeType === 'positive' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600'}`}>
          {card.changeType === 'positive' ? <ArrowUpRight className="w-3 h-3" /> : <ArrowDownRight className="w-3 h-3" />}
          {card.change}
        </span>
      </div>
      <p className="text-sm text-slate-500 font-medium">{card.title}</p>
      <p className="text-3xl font-bold text-slate-900 mt-2">{card.value}</p>
      <p className="text-xs text-slate-400 mt-3 leading-relaxed">{card.description}</p>
    </div>
  );
}

const CustomTooltip = ({ active, payload, label }) => {
  if (active && payload && payload.length) {
    return (
      <div className="glass rounded-xl p-4 shadow-lg border border-emerald-100">
        <p className="text-sm font-semibold text-slate-700">{label}</p>
        {payload.map((p) => (
          <p key={p.dataKey} className="text-sm mt-1" style={{ color: p.color }}>
            {p.dataKey === 'biomass' ? 'Biomassa' : 'Target'}: {p.value} kg
          </p>
        ))}
      </div>
    );
  }
  return null;
};

export default function Dashboard() {
  const now = new Date();
  const greeting = now.getHours() < 12 ? 'Selamat pagi' : now.getHours() < 18 ? 'Selamat siang' : 'Selamat malam';

  return (
    <div className="p-6 lg:p-10 max-w-screen-2xl mx-auto">
      {/* Header */}
      <div className="mb-8 animate-slide-up">
        <h1 className="text-2xl lg:text-3xl font-bold text-slate-900">
          {greeting}, <span className="text-emerald-600">Admin</span> 🌿
        </h1>
        <p className="text-slate-500 mt-1">Berikut ringkasan operasional Wolfilium untuk hari ini.</p>
      </div>

      {/* Summary Cards */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        {summaryCards.map((card, i) => (
          <SummaryCard key={card.id} card={card} index={i} />
        ))}
      </div>

      <div className="grid lg:grid-cols-3 gap-8">
        {/* Growth Chart */}
        <div className="lg:col-span-2 bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg transition-shadow duration-300 animate-slide-up stagger-2">
          <div className="flex items-center justify-between mb-7">
            <div>
              <h2 className="text-lg font-bold text-slate-900 flex items-center gap-2">
                <TrendingUp className="w-5 h-5 text-emerald-500" />
                Perkembangan Pertumbuhan (7 Hari)
              </h2>
              <p className="text-sm text-slate-400 mt-1">Kurva pertumbuhan biomassa Wolffia</p>
            </div>
            <span className="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold">+715% per minggu</span>
          </div>
          <div className="h-72">
            <ResponsiveContainer width="100%" height="100%">
              <AreaChart data={growthData}>
                <defs>
                  <linearGradient id="biomassGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="5%" stopColor="#10b981" stopOpacity={0.3} />
                    <stop offset="95%" stopColor="#10b981" stopOpacity={0} />
                  </linearGradient>
                </defs>
                <CartesianGrid strokeDasharray="3 3" stroke="#e2e8f0" />
                <XAxis dataKey="day" tick={{ fill: '#94a3b8', fontSize: 12 }} axisLine={false} tickLine={false} />
                <YAxis tick={{ fill: '#94a3b8', fontSize: 12 }} axisLine={false} tickLine={false} unit=" kg" />
                <Tooltip content={<CustomTooltip />} />
                <Line type="monotone" dataKey="target" stroke="#cbd5e1" strokeWidth={2} strokeDasharray="5 5" dot={false} />
                <Area type="monotone" dataKey="biomass" stroke="#10b981" strokeWidth={3} fill="url(#biomassGrad)" dot={{ r: 5, fill: '#10b981', stroke: '#fff', strokeWidth: 2 }} activeDot={{ r: 7 }} />
              </AreaChart>
            </ResponsiveContainer>
          </div>
        </div>

        {/* Distribution Log */}
        <div className="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg transition-shadow duration-300 animate-slide-up stagger-3">
          <div className="flex items-center justify-between mb-7">
            <h2 className="text-lg font-bold text-slate-900 flex items-center gap-2">
              <Package className="w-5 h-5 text-emerald-500" />
              Log Distribusi
            </h2>
            <span className="text-xs text-slate-400">Terbaru</span>
          </div>
          <div className="space-y-5">
            {distributionLog.map((item) => (
              <div key={item.id} className="flex items-start gap-4 p-4 rounded-xl hover:bg-slate-50 transition-colors group">
                <div className="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition-colors">
                  <Package className="w-4 h-4 text-emerald-600" />
                </div>
                <div className="flex-1 min-w-0">
                  <p className="text-sm font-semibold text-slate-700 truncate">{item.partner}</p>
                  <p className="text-xs text-slate-400">{item.quantity} · {item.date}</p>
                </div>
                <span className={`text-[10px] font-semibold px-2.5 py-2 rounded-full whitespace-nowrap ${statusColor(item.status)}`}>
                  {item.status}
                </span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}
