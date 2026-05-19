import { useMemo, useState } from 'react';
import { HelpCircle, MessageCircle, ChevronDown } from 'lucide-react';

const WHATSAPP_LINK =
  'https://wa.me/6282218410603?text=Halo%20Wolfilium,%20saya%20butuh%20bantuan%20terkait%20Wolfilium.';

export default function HelpCenter() {
  const [openIndex, setOpenIndex] = useState(0);

  const faqs = useMemo(
    () => [
      {
        q: 'Apa itu Wolfilium?',
        a: 'Wolfilium adalah sistem manajemen budidaya Wolffia berbasis data untuk membantu pemantauan, optimasi pertumbuhan, serta pengelolaan distribusi.',
      },
      {
        q: 'Bagaimana cara menambah kontainer/batch baru?',
        a: 'Buka menu Operasional Vitalitas, lalu klik Batch Baru. Isi data yang diperlukan dan simpan untuk menambahkan kontainer baru.',
      },
      {
        q: 'Bagaimana cara mencari mitra pembudidaya?',
        a: 'Buka menu Jaringan Distribusi, lalu gunakan kolom pencarian untuk mencari berdasarkan nama, lokasi, atau jenis ikan.',
      },
      {
        q: 'Ke mana saya bisa menghubungi tim Wolfilium?',
        a: 'Silakan hubungi kami via WhatsApp. Tim kami akan membantu kebutuhan Anda secepatnya.',
      },
    ],
    []
  );

  return (
    <div className="p-6 lg:p-10 max-w-screen-2xl mx-auto">
      <div className="mb-8 animate-slide-up">
        <h1 className="text-2xl lg:text-3xl font-bold text-slate-900 flex items-center gap-3">
          <HelpCircle className="w-8 h-8 text-emerald-500" />
          Pusat Bantuan
        </h1>
        <p className="text-slate-500 mt-1">Temukan jawaban cepat lewat FAQ atau hubungi kami via WhatsApp.</p>
      </div>

      <div className="grid lg:grid-cols-3 gap-10">
        <section className="lg:col-span-2 bg-white rounded-2xl border border-slate-100 p-7">
          <h2 className="text-lg font-bold text-slate-900 mb-4">FAQ</h2>
          <div className="space-y-4">
            {faqs.map((item, idx) => {
              const open = idx === openIndex;
              return (
                <div key={item.q} className="rounded-2xl border border-slate-100 overflow-hidden">
                  <button
                    type="button"
                    onClick={() => setOpenIndex(open ? -1 : idx)}
                    className="w-full flex items-center justify-between gap-5 px-6 py-5 text-left hover:bg-slate-50 transition-colors"
                  >
                    <span className="font-semibold text-slate-800">{item.q}</span>
                    <ChevronDown className={`w-5 h-5 text-slate-400 transition-transform ${open ? 'rotate-180' : ''}`} />
                  </button>
                  {open && <div className="px-6 pb-6 text-sm text-slate-600 leading-relaxed">{item.a}</div>}
                </div>
              );
            })}
          </div>
        </section>

        <aside className="bg-white rounded-2xl border border-slate-100 p-7">
          <h2 className="text-lg font-bold text-slate-900 mb-2">Kontak</h2>
          <p className="text-sm text-slate-500 mb-6">Butuh bantuan lebih lanjut? Chat kami langsung.</p>

          <a
            href={WHATSAPP_LINK}
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex w-full items-center justify-center gap-3 px-6 py-3 rounded-xl gradient-emerald text-white font-semibold text-sm hover:shadow-lg hover:shadow-emerald-200 hover:scale-[1.02] transition-all"
          >
            <MessageCircle className="w-4 h-4" />
            Hubungi via WhatsApp
          </a>

          <div className="mt-5 rounded-xl bg-emerald-50 border border-emerald-100 p-5">
            <p className="text-xs font-semibold text-emerald-700">Nomor WhatsApp</p>
            <p className="text-sm font-bold text-slate-900 mt-1">+62 822-1841-0603</p>
          </div>
        </aside>
      </div>
    </div>
  );
}
