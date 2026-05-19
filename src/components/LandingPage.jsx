import { useNavigate } from 'react-router-dom';
import { Leaf, ArrowRight, Droplets, Sun, BarChart3, Truck } from 'lucide-react';

const WhatsAppIcon = () => (
  <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
  </svg>
);

const InstagramIcon = () => (
  <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
  </svg>
);

const features = [
  { icon: Droplets, title: 'Monitoring Cerdas', desc: 'Pemantauan pH, suhu, dan hidrasi secara real-time untuk setiap kontainer.' },
  { icon: Sun, title: 'Optimasi Pertumbuhan', desc: 'Insight berbasis AI untuk memaksimalkan hasil biomassa Wolffia per siklus.' },
  { icon: BarChart3, title: 'Analitik Data', desc: 'Dashboard visual untuk memantau kurva pertumbuhan dan kesiapan panen.' },
  { icon: Truck, title: 'Jaringan Distribusi', desc: 'Manajemen mitra dan logistik pengiriman yang lebih ringkas.' },
];

export default function LandingPage() {
  const navigate = useNavigate();

  return (
    <div className="min-h-screen">
      {/* ── Hero Section ── */}
      <section className="relative gradient-hero min-h-screen flex items-center overflow-hidden">
        {/* Animated background elements */}
        <div className="absolute inset-0 overflow-hidden">
          <div className="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl animate-float" />
          <div className="absolute bottom-20 right-10 w-96 h-96 bg-emerald-400/5 rounded-full blur-3xl animate-float" style={{ animationDelay: '1.5s' }} />
          <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-emerald-600/5 rounded-full blur-3xl" />
          {/* Grid pattern */}
          <div className="absolute inset-0 opacity-[0.03]" style={{ backgroundImage: 'radial-gradient(circle, #10b981 1px, transparent 1px)', backgroundSize: '40px 40px' }} />
        </div>

        {/* Navbar */}
        <nav className="absolute top-0 left-0 right-0 z-20 p-6">
          <div className="max-w-screen-2xl mx-auto flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-10 h-10 rounded-xl gradient-emerald flex items-center justify-center">
                <Leaf className="w-6 h-6 text-white" />
              </div>
              <span className="text-xl font-bold text-white">Wolfilium</span>
            </div>
            <button id="hero-enter-dashboard" onClick={() => navigate('/dashboard')} className="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl text-sm font-medium backdrop-blur-sm border border-white/10 transition-all duration-300 hover:scale-105">
              Masuk Dashboard →
            </button>
          </div>
        </nav>

        {/* Hero Content */}
        <div className="relative z-10 max-w-screen-2xl mx-auto px-6 lg:px-10 pt-32 pb-16 lg:pt-40 lg:pb-24 w-full">
          <div className="grid lg:grid-cols-2 gap-20 xl:gap-24 items-center">
            <div className="animate-slide-up max-w-2xl">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm font-medium mb-8">
                <span className="w-2 h-2 rounded-full bg-emerald-400 animate-pulse" />
                Teknologi Akuakultur Berkelanjutan
              </div>
              <h1 className="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.1] mb-6">
                Digitalisasi <span className="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-lime-400">Protein Hijau</span> untuk Akuakultur Berkelanjutan
              </h1>
              <p className="text-lg text-slate-400 leading-9 max-w-xl mb-12">
                Wolfilium mengubah budidaya Wolffia (duckweed) menjadi proses berbasis data — menghadirkan pakan tinggi protein yang ramah lingkungan untuk pembudidaya ikan di seluruh Indonesia.
              </p>

              {/* CTA Buttons */}
              <div className="flex flex-col sm:flex-row sm:flex-wrap gap-6 sm:gap-8 mt-10">
                <a id="cta-whatsapp" href="https://wa.me/6282218410603?text=Halo%20Wolfilium,%20saya%20tertarik%20untuk%20bekerja%20sama%20dan%20mengetahui%20lebih%20lanjut%20mengenai%20produk%20Anda." target="_blank" rel="noopener noreferrer" className="group inline-flex w-full sm:w-auto items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-emerald-500/25">
                  <WhatsAppIcon />
                  Jadi Mitra / Pesan Pakan
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                </a>
                <a id="cta-instagram" href="https://www.instagram.com/wolfilium?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" className="group inline-flex w-full sm:w-auto items-center justify-center gap-3 px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-2xl font-semibold text-base border border-white/10 hover:border-white/20 transition-all duration-300 hover:scale-105 backdrop-blur-sm">
                  <InstagramIcon />
                  Kunjungi Instagram
                </a>
              </div>
            </div>

            {/* Hero Visual */}
            <div className="hidden lg:flex justify-center animate-slide-up stagger-2">
              <div className="relative w-80 h-80">
                <div className="absolute inset-0 rounded-full bg-gradient-to-br from-emerald-400/20 to-emerald-600/10 animate-pulse" />
                <div className="absolute inset-4 rounded-full bg-gradient-to-br from-emerald-400/30 to-lime-400/10 flex items-center justify-center">
                  <div className="text-center">
                    <Leaf className="w-24 h-24 text-emerald-400 mx-auto mb-4 animate-float" />
                    <p className="text-3xl font-black text-white">42.5 kg</p>
                    <p className="text-sm text-emerald-400 font-medium">Biomassa Saat Ini</p>
                  </div>
                </div>
                {/* Orbiting dots */}
                <div className="absolute top-0 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-emerald-400 animate-pulse" />
                <div className="absolute bottom-8 left-4 w-2 h-2 rounded-full bg-lime-400 animate-pulse" style={{ animationDelay: '0.5s' }} />
                <div className="absolute bottom-8 right-4 w-2 h-2 rounded-full bg-emerald-300 animate-pulse" style={{ animationDelay: '1s' }} />
              </div>
            </div>
          </div>

          {/* Stats Row */}
          <div className="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 lg:gap-10 mt-28 lg:mt-32 animate-slide-up stagger-3">
            {[
              { value: '1,248', label: 'Kontainer Aktif' },
              { value: '42.5 kg', label: 'Total Biomassa' },
              { value: '6', label: 'Mitra Pembudidaya' },
              { value: '98.2%', label: 'Tingkat Kelangsungan' },
            ].map((stat) => (
              <div key={stat.label} className="glass-dark rounded-2xl p-6 lg:p-7 text-center hover:bg-white/10 transition-all duration-300 min-h-[132px] flex flex-col items-center justify-center">
                <p className="text-3xl lg:text-4xl font-bold text-emerald-400">{stat.value}</p>
                <p className="text-sm text-slate-400 mt-3 leading-relaxed max-w-[14rem]">{stat.label}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* ── Features Section ── */}
      <section className="pt-16 pb-32 lg:pt-20 lg:pb-40 bg-white">
        <div className="max-w-screen-2xl mx-auto px-6 lg:px-10">
          <div className="text-center mb-20 lg:mb-24 max-w-3xl mx-auto">
            <h2 className="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">Kenapa Wolfilium?</h2>
            <p className="text-lg text-slate-500 leading-8">Infrastruktur digital menyeluruh untuk budidaya duckweed yang berkelanjutan.</p>
          </div>
          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 xl:gap-12">
            {features.map((f, i) => (
              <div key={f.title} className={`group p-8 xl:p-9 rounded-2xl border border-slate-100 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-300 hover:-translate-y-1 animate-slide-up stagger-${i + 1} h-full flex flex-col`}>
                <div className="w-14 h-14 rounded-2xl gradient-emerald flex items-center justify-center mb-7 group-hover:scale-110 transition-transform shrink-0">
                  <f.icon className="w-7 h-7 text-white" />
                </div>
                <h3 className="text-lg font-bold text-slate-900 mb-3 leading-8">{f.title}</h3>
                <p className="text-sm text-slate-500 leading-8">{f.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* ── Footer ── */}
      <footer className="bg-slate-900 text-slate-400 py-12">
        <div className="max-w-screen-2xl mx-auto px-6 lg:px-10 text-center">
          <div className="flex items-center justify-center gap-3 mb-4">
            <div className="w-8 h-8 rounded-lg gradient-emerald flex items-center justify-center">
              <Leaf className="w-5 h-5 text-white" />
            </div>
            <span className="text-lg font-bold text-white">Wolfilium</span>
          </div>
          <p className="text-sm mb-6">Digitalisasi protein hijau untuk akuakultur berkelanjutan di Indonesia.</p>
          <p className="text-xs text-slate-600">© 2026 Wolfilium. Hak cipta dilindungi.</p>
        </div>
      </footer>
    </div>
  );
}
