<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Army;

class EnrolementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();

        if (!$user->army) {
            return redirect()->route('enrolement.chooseArmy');
        }

        return redirect()->route('enrolement.createSoldiers');
    }

    public function chooseArmy()
    {
        $armies = Army::all();

        return view('logged.enrolement.chooseArmy', [
            'armies' => $armies,
        ]);
    }

    public function chooseArmyPost($armyId)
    {
        $user = \Auth::user();
        if ($user->army) {
            return redirect()->route('enrolement.index');
        }

        $army = Army::find($armyId);
        if (!$army) {
            return redirect()->route('enrolement.index');
        }

        $user->army()->associate($army);
        $user->save();

        return redirect()->route('enrolement.createSoldiers');
    }

    public function createSoldiers()
    {
        return view('logged.enrolement.createSoldiers');
    }

    public function createSoldiersPost(Request $request)
    {
        # code...
    }
}
