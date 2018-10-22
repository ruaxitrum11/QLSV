<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Admin;
use App\Entities\Client;
use App\Entities\Subject;
use App\Services\Admin\UpdateScoreServices;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ScoreController extends Controller
{
    private $client_model;


    public function __construct(Client $client_model , UpdateScoreServices $score_service)
    {
        $this->client_model = $client_model;
        $this-> score_services = $score_service;
    }

    public function info(Request $request)
    {
//        dd($request);
        $query = Client::query();
        $data = $request->all();

        if(isset($data['search']) && $data['search']){
            $query->where('name','=',$data['search'])
                ->orWhere('number_id','=',$data['search'])
                ->orWhere('email','=', $data['search']);
            $user = $query->orderBy('created_at', 'DECS')->paginate(10);
        }else if (isset($data['rank'])){
            $query->where('rank','=',$data['rank']);
            $user = $query->orderBy('created_at','decs')->paginate(10);
        } else {
            $user = Client::orderBy('created_at', 'DECS')->paginate(10);
//            dd($client);
        }

        $subjects = Subject::all();
//        dd($subject);
//
        return view('admin.score.info', compact('user','subjects'));
    }

    public function showUpdate($id)
    {
//        dd($id);
        $user = Client::find($id);
//        dd($user->subjects);
        $subject = $user->subjects;
//        dd($subject);
        $subjects = Subject::all();
//        dd($user);
        return view('admin.score.update', compact('user','subject' ,'subjects'));
    }

    public function update(Request $request , int $id)
    {
        $scores_input = $request->only(['subject', 'score']);
        $result = $this->score_services->update($scores_input, $id);
        $store_input = [];
//        $client = Client::find($id);
//        $subject = $scores_input['subject'];
//        $scores = $scores_input['score'];
//
//        foreach ($subject as $key => $items) {
//            $store_input[$items] = ['score' => $scores[$key]];
//        }
//
//        $client->subjects()->sync($store_input);

//        dd($client->id);
        if($result) {
            Session::flash('success', 'Cập nhật điểm thành công');
            return redirect()->route('admin.score.update', $id);
        }else {
            Session::flash('error', 'Cập nhật điểm thất bại');
            return redirect()->route('admin.score.update', $id);
        }
    }
}
