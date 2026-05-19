import { NavLink, useNavigate } from 'react-router-dom';
import { LayoutDashboard, FlaskConical, Users, Home, X, Leaf, Settings, HelpCircle, LogOut } from 'lucide-react';

const navItems = [
  { to: '/dashboard', label: 'Dashboard AgriData', icon: LayoutDashboard },
  { to: '/inventory', label: 'Operasional Vitalitas', icon: FlaskConical },
  { to: '/partners', label: 'Jaringan Distribusi', icon: Users },
];

export default function Sidebar({ isOpen, onClose }) {
  const navigate = useNavigate();

  return (
    <aside className={`fixed lg:static inset-y-0 left-0 z-40 w-72 lg:w-64 xl:w-72 bg-slate-900 text-white flex flex-col transform transition-transform duration-300 ease-in-out ${isOpen ? 'translate-x-0' : '-translate-x-full'} lg:translate-x-0`}>
      {/* Logo */}
      <div className="p-6 border-b border-slate-700/50">
        <div className="flex items-center justify-between">
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 rounded-xl gradient-emerald flex items-center justify-center animate-pulse-glow">
              <Leaf className="w-6 h-6 text-white" />
            </div>
            <div>
              <h1 className="text-lg font-bold tracking-tight">Wolfilium</h1>
              <p className="text-xs text-emerald-400 font-medium">Sistem Manajemen</p>
            </div>
          </div>
          <button id="sidebar-close-btn" onClick={onClose} className="lg:hidden p-1.5 rounded-lg hover:bg-slate-700 transition-colors">
            <X className="w-5 h-5" />
          </button>
        </div>
      </div>

      {/* Nav */}
      <nav className="flex-1 p-5 overflow-y-auto">
        <div className="space-y-4">
          <p className="text-[10px] font-semibold uppercase tracking-widest text-slate-500 px-4 pb-2">Menu Utama</p>
          <div className="space-y-4">
            <button id="nav-landing" onClick={() => { navigate('/'); onClose(); }} className="w-full flex items-center gap-4 px-4 py-4 rounded-xl text-sm font-medium leading-6 text-slate-400 hover:text-white hover:bg-slate-800 transition-all duration-200 group">
              <Home className="w-5 h-5 shrink-0 group-hover:text-emerald-400 transition-colors" />
              <span>Beranda</span>
            </button>
            {navItems.map((item) => (
              <NavLink key={item.to} to={item.to} onClick={onClose} className={({ isActive }) => `flex items-center gap-4 px-4 py-4 rounded-xl text-sm font-medium leading-6 transition-all duration-200 group ${isActive ? 'bg-emerald-600/20 text-emerald-400 shadow-lg shadow-emerald-900/20' : 'text-slate-400 hover:text-white hover:bg-slate-800'}`}>
                <item.icon className="w-5 h-5 shrink-0 group-hover:text-emerald-400 transition-colors" />
                <span>{item.label}</span>
              </NavLink>
            ))}
          </div>
        </div>
        <div className="pt-8 space-y-4">
          <p className="text-[10px] font-semibold uppercase tracking-widest text-slate-500 px-4 pb-2">Bantuan</p>
          <div className="space-y-4">
            <button className="w-full flex items-center gap-4 px-4 py-4 rounded-xl text-sm font-medium leading-6 text-slate-400 hover:text-white hover:bg-slate-800 transition-all duration-200 group">
              <Settings className="w-5 h-5 shrink-0 group-hover:text-emerald-400 transition-colors" />
              <span>Pengaturan</span>
            </button>
            <button onClick={() => { navigate('/help'); onClose(); }} className="w-full flex items-center gap-4 px-4 py-4 rounded-xl text-sm font-medium leading-6 text-slate-400 hover:text-white hover:bg-slate-800 transition-all duration-200 group">
              <HelpCircle className="w-5 h-5 shrink-0 group-hover:text-emerald-400 transition-colors" />
              <span>Pusat Bantuan</span>
            </button>
          </div>
        </div>
      </nav>

      {/* User */}
      <div className="p-4 border-t border-slate-700/50">
        <div className="flex items-center gap-4 p-4 rounded-xl bg-slate-800/50 hover:bg-slate-800 transition-colors cursor-pointer group">
          <div className="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-sm font-bold text-white">WF</div>
          <div className="flex-1 min-w-0">
            <p className="text-sm font-semibold text-slate-200 truncate">Wolfilium Admin</p>
            <p className="text-xs text-slate-500 truncate">admin@wolfilium.id</p>
          </div>
          <LogOut className="w-4 h-4 text-slate-500 group-hover:text-emerald-400 transition-colors" />
        </div>
      </div>
    </aside>
  );
}
