<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Admin;
use App\Entities\Client;
use App\Entities\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScoreController extends Controller
{
    private $client_model;

    public function __construct(Client $client_model)
    {
        $this->client_model = $client_model;
    }

    public function info()
    {
//        $user = $this->client_model->newQuery()
//            ->with('sub')
//            ->get();
        $user = Client::all();
        $subject = Subject::all();
//        dd($user);

//        dd($subject);

        return view('admin.score.info', compact('user','subject'));
    }

    public function showUpdate($id)
    {
//        dd($id);
        $user = Client::find($id);
        $subject = $user->subjects;
//        dd($subject);

//        dd($user);
        return view('admin.score.update', compact('user','subject'));
    }

    public function update(Request $request , int $id)
    {
        $scores_input = $request->only(['subject', 'score']);
        $store_input = [];
        $client = Client::find($id);
        $subject = $scores_input['subject'];
        $scores = $scores_input['score'];

        foreach ($subject as $key => $items) {
            $store_input[$items] = ['score' => $scores[$key]];
        }

        $client->subjects()->sync($store_input);

        return redirect()->route('admin.score.update',$client->id);
    }
}
