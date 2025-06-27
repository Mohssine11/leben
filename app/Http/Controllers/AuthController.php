<?php
namespace App\Http\Controllers;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse; // Import nicht vergessen!

class AuthController extends Controller{
    public function showRegister(){
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'image' => 'nullable|image',
        'solde' => 'required|numeric|min:0',
        'account' => 'required',
    ]);

    $data = $request->only(['name', 'email', 'solde', 'account']);

    // Bild zu Cloudinary hochladen, falls vorhanden
    if ($request->hasFile('image')) {
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $data['image'] = $uploadedFileUrl;
    } else {
        // Optional: Standardbild-URL setzen, wenn kein Bild hochgeladen wurde
        $data['image'] = null;
    }

    $data['password'] = Hash::make($request->password);

    User::create($data);

    return redirect('/login')->with('success', 'تم إنشاء الحساب بنجاح!');
}
     public function showLogin(){
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ]);
    }
    public function showversment(){
        return view('auth.versment');
    }
    public function versment(Request $request){
    $data = $request->validate([
        'montant' => 'required|numeric|min:10',
        'account' => 'required|string|max:255',
    ]);

    // Prüfen, ob das Zielkonto das eigene Konto ist
    if ($data['account'] === auth()->user()->account) {
        return back()->withErrors(['account' => 'Du kannst kein Geld an dein eigenes Konto senden.']);
    }

    // Prüfen, ob User genug Guthaben hat
    if (auth()->user()->solde < $data['montant']) {
        return back()->withErrors(['montant' => 'رصيدك غير كافٍ لإجراء هذه العملية.']);
    }

    if(User::where('account', $data['account'])->exists()){
        User::where('account', $data['account'])->update(['solde' => \DB::raw('solde + '.$data['montant'])]);
        auth()->user()->solde -= $data['montant'];
        auth()->user()->save();
        return back()->with('success', 'تم التحويل بنجاح!');
    } else {
        return back()->withErrors(['account' => 'رقم الحساب غير صحيح.']);
    }
}
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}









