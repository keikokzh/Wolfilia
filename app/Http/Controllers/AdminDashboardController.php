<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\HarvestLog;
use App\Models\HarvestPrediction;
use App\Models\SeedRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Admin monitoring dashboard
     */
    public function index()
    {
        // Stats
        $stats = [
            'total_users' => User::count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'total_seed_requests' => SeedRequest::count(),
            'pending_requests' => SeedRequest::where('status', 'pending')->count(),
            'total_farmers' => Farmer::count(),
            'total_harvest_kg' => HarvestLog::sum('berat_kg'),
            'active_predictions' => HarvestPrediction::whereIn('status', ['menunggu', 'siap_panen'])->count(),
            'ada_bibit' => Farmer::where('status_ketersediaan', 'ada_sisa_bibit')->count(),
        ];

        // Recent seed requests
        $recentRequests = SeedRequest::with('user')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Recent users
        $recentUsers = User::where('role', 'customer')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Harvest chart data (last 30 days)
        $chartData = HarvestLog::selectRaw("tanggal_panen, SUM(berat_kg) as total_kg")
            ->where('tanggal_panen', '>=', Carbon::now()->subDays(30))
            ->groupBy('tanggal_panen')
            ->orderBy('tanggal_panen')
            ->get();

        return view('admin.dashboard', compact('stats', 'recentRequests', 'recentUsers', 'chartData'));
    }

    /**
     * Manage seed requests (update status)
     */
    public function updateSeedRequest(SeedRequest $seedRequest, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,tersedia,selesai,ditolak',
            'catatan_admin' => 'nullable|string|max:500',
        ]);

        $seedRequest->update($request->only('status', 'catatan_admin'));

        return redirect()->route('admin.dashboard')
            ->with('success', 'Status permintaan bibit berhasil diperbarui.');
    }

    /**
     * Settings page
     */
    public function settings()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.settings', compact('users'));
    }

    /**
     * Update user role
     */
    public function updateUserRole(User $user, Request $request)
    {
        $request->validate([
            'role' => 'required|in:admin,customer',
        ]);

        // Prevent admin from changing their own role
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.settings')
                ->withErrors(['role' => 'Anda tidak bisa mengubah role diri sendiri.']);
        }

        $user->update(['role' => $request->role]);

        return redirect()->route('admin.settings')
            ->with('success', "Role {$user->name} berhasil diubah menjadi {$request->role}.");
    }

    /**
     * Delete user
     */
    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.settings')
                ->withErrors(['user' => 'Anda tidak bisa menghapus akun diri sendiri.']);
        }

        $user->delete();

        return redirect()->route('admin.settings')
            ->with('success', 'User berhasil dihapus.');
    }
}
