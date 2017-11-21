<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Army;
use App\Models\Soldier;

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
        $army = \Auth::user()->army;
        return view('logged.enrolement.createSoldiers', [
            'army' => $army,
        ]);
    }

    public function createSoldiersPost(Request $request)
    {
        $user = \Auth::user();

        if ($user->soldiers()->count() > 0) {
            return redirect(env('APP_PLAY_URL'));
        }

        foreach ($request->gender as $index => $gender) {
            $soldier = new Soldier([
                'gender' => $gender,
                'firstName' => $request->firstName[$index],
                'lastName' => $request->lastName[$index],
                'healthPoints' => 100,
                'actionPoints' => 20,
                'sight' => 3,
                'lastTurn' => new \DateTime(),
                'nextTurn' => new \DateTime(),
            ]);
            $soldier->user()->associate($user);
            $soldier->army()->associate($user->army);
            $soldier->save();
        }

        return redirect(env('APP_PLAY_URL'));
    }
}
