<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenumpangAuthController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        $redirect = $request->input('redirect', url()->previous());

        Auth::guard('penumpang')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // keamanan sederhana: hanya izinkan redirect internal
        if (! str_starts_with($redirect, url('/'))) {
            // kalau yang dikirim full URL, ubah jadi path
            $redirect = parse_url($redirect, PHP_URL_PATH) ?: '/';
        }

        return redirect($redirect);
    }
}
