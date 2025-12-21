<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        // Force refresh user dari database
        $user = User::find(Auth::id());
        Log::info('Showing profile for user ' . $user->id . ' with photo: ' . ($user->profile_photo_path ?? 'NULL'));
        return view('fitur.profile_detail', compact('user'));
    }

    public function updateProfilePhoto(Request $request)
    {
        Log::info('=== START UPDATE PROFILE PHOTO ===');
        
        try {
            // Validasi
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            Log::info('Validation passed');

            $userId = Auth::id();
            Log::info('User ID: ' . $userId);

            // Dapatkan user dari database
            $user = User::findOrFail($userId);
            Log::info('User found: ' . $user->email);
            Log::info('Old profile photo: ' . ($user->profile_photo_path ?? 'NULL'));

            // Hapus foto lama jika ada
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
                Log::info('Old photo deleted');
            }

            // Simpan foto baru
            if ($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                Log::info('File received: ' . $file->getClientOriginalName());
                
                $path = $file->store('profile-photos', 'public');
                Log::info('File stored at: ' . $path);
                
                // Update database dengan 3 metode untuk memastikan
                
                // Metode 1: Direct update
                $user->profile_photo_path = $path;
                $saved = $user->save();
                Log::info('Method 1 (Model save) result: ' . ($saved ? 'SUCCESS' : 'FAILED'));
                
                // Metode 2: Force update dengan query builder
                $affected = DB::table('users')
                    ->where('id', $userId)
                    ->update([
                        'profile_photo_path' => $path,
                        'updated_at' => now()
                    ]);
                Log::info('Method 2 (DB update) affected rows: ' . $affected);
                
                // Verifikasi data tersimpan
                $verify = DB::table('users')
                    ->where('id', $userId)
                    ->value('profile_photo_path');
                Log::info('Verification - Profile photo in DB: ' . ($verify ?? 'NULL'));
                
                // Refresh user di session
                $freshUser = User::find($userId);
                Auth::setUser($freshUser);
                Log::info('Session refreshed with new photo: ' . ($freshUser->profile_photo_path ?? 'NULL'));

                Log::info('=== END UPDATE PROFILE PHOTO - SUCCESS ===');
                return redirect()->route('profile.detail')->with('success', 'Foto profil berhasil diperbarui!');
            }

            Log::info('No file uploaded');
            return redirect()->back()->with('error', 'Tidak ada file yang diupload.');

        } catch (\Exception $e) {
            Log::error('=== ERROR UPDATE PROFILE PHOTO ===');
            Log::error('Error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Gagal mengupload foto profil: ' . $e->getMessage());
        }
    }
}