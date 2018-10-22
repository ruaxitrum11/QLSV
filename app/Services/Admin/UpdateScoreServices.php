<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/22/18
 * Time: 8:13 AM
 */

namespace App\Services\Admin;


use App\Entities\Client;
use App\Repositories\Eloquents\Admin\UpdateScoreRepository;

class UpdateScoreServices
{
    protected $score_repository;

    public function __construct(UpdateScoreRepository $score_repository)
    {
        $this->score_repository = $score_repository;
    }

    public function update(array $request , int $id)
    {
//        dd($request);
        $score_input = [];
//        $client = Client::find($id);
        $subject = $request['subject'];
        $scores = $request['score'];

        foreach ($subject as $key => $items) {
            $score_input[$items] = ['score' => $scores[$key]];
        }

        $total = 0 ;
        foreach ($scores as $data) {
            $total += $data;
        }

        $gpa = round($total/count($scores),2);

        if ($gpa < 5) {
            $user_update = [
                'rank' => 'Trung Bình'
            ];
        }else if ($gpa < 8){
            $user_update = [
                'rank' => 'Khá'
            ];
        }else {
            $user_update = [
                'rank' => 'Giỏi'
            ];
        }
//        dd($user_update);
        $result = $this->score_repository->update($score_input,$user_update,$id);

        return $result;
    }
}