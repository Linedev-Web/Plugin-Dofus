<?php

namespace Azuriom\Plugin\Dofus\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Dofus\Models\Account;
use Azuriom\Plugin\Dofus\Models\AccountLink;
use Azuriom\Plugin\Dofus\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $validatedData = $request->validated();
        $user = $request->user();

        $validatedData['password'] = dofus_hash_password($validatedData['password']);

        $account = Account::create([
            'Login' => $validatedData['account'],
            'PasswordHash' => $validatedData['password'],
            'NickName' => $user->name,
            'SecretQuestion' => $validatedData['question'],
            'SecretAnswer' => $validatedData['answer'],
            'Lang' => 'fr',
            'IsJailed' => 0,
            'IsBanned' => 0
        ]);

        AccountLink::create([
            'azuriom_user_id' => $user->id,
            'dofus_game_id' => $account->Id
        ]);

        return  redirect()->route('dofus.accounts.index')->with('success', 'Account created');
    }

    public function index() {
        $account_links = AccountLink::where('azuriom_user_id', $user->id)->get();
        $accounts = [];

        foreach ($account_links as $account_link) {
            $accounts[] = Account::where('Id', $account_link->dofus_game_id)->first();
        }
        return view('dofus::accounts.index', ['accounts' => $accounts]);
    }
}
