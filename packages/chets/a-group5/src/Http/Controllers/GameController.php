<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class GameController extends Controller
{
    public function index()
    {
        // Fetch the current score from the database
        $score = Score::first()->score ?? 0;
        return view('game', compact('score'));
    }

    public function play(Request $request)
    {
        $userChoice = $request->input('choice');
        $choices = ['rock', 'paper', 'scissors'];
        $computerChoice = $choices[array_rand($choices)];

        $result = $this->determineWinner($userChoice, $computerChoice);

        // Fetch the current score
        $score = Score::firstOrCreate([]);

        // Update the score if the user wins
        if ($result === 'You win!') {
            $score->increment('score');
            $score->save();
        }

        return view('game', [
            'userChoice' => $userChoice,
            'computerChoice' => $computerChoice,
            'result' => $result,
            'score' => $score->score,
        ]);
    }

    private function determineWinner($userChoice, $computerChoice)
    {
        if ($userChoice === $computerChoice) {
            return 'It\'s a tie!';
        }

        if (($userChoice === 'rock' && $computerChoice === 'scissors') ||
            ($userChoice === 'paper' && $computerChoice === 'rock') ||
            ($userChoice === 'scissors' && $computerChoice === 'paper')) {
            return 'You win!';
        }

        return 'You lose!';
    }
}
