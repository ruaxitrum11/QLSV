<?php

namespace App\Services\Admin;



use App\Repositories\Eloquents\Admin\UpdateUserRepository;

class UpdateUserServices{
    protected $user_repository;

    public function __construct(UpdateUserRepository $user_repository)
    {
        $this->userRepository = $user_repository;
    }

    public function edit(int $id, array $request)
    {
//        dd($request);
        if (isset($request['avatar'])) {
            $avatar = $request['avatar'];
//            dd($avatar);

            $getAvatar = time().'_'.$avatar->getClientOriginalName();
            $destinationPath = public_path('image/user');
//                dd($destinationPath, $getAvatar);
            $avatar->move($destinationPath, $getAvatar);

//            Storage::disk('public')->put($destinationPath,$avatar,$getAvatar);

//            dd($destinationPath);

            $user_update = [
                'email' => $request['email'],
                'address' => $request['address'],
                'phone_number' => $request['phone_number'],
                'birthday' => $request['birthday'],
                'gender' => $request['gender'],
                'avatar' => $getAvatar,
            ];
        } else {
            $user_update = [
                'email' => $request['email'],
                'address' => $request['address'],
                'phone_number' => $request['phone_number'],
                'birthday' => $request['birthday'],
                'gender' => $request['gender'],
            ];
        }



        $result = $this->userRepository->update($id, $user_update);

        return $result;
    }
}