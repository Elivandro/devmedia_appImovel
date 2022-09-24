<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\{
    Phone,
    User
};

class AccountController extends Controller
{
    protected $users;
    protected $phones;

    public function __construct(User $users, Phone $phones)
    {
        $this->users = $users;
        $this->phones = $phones;
    }

    public function index()
    {
        $user = $this->users->find(Auth::user()->id);
        $phones = $user->Phones()->get();

        return view('users.index', compact('user', 'phones'));
    }
}
