<?php
/**
 * Created by PhpStorm.
 * User: João Marcus
 * Date: 26/04/2017
 * Time: 11:42
 */

namespace Mentor\Services;


use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\DemandRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mockery\Exception;


class MentorService
{
    /**
     * @var UserRepositoryEloquent
     */
    private $userRepositoryEloquent;

    /**
     * MentorService constructor.
     * @param UserRepositoryEloquent $userRepositoryEloquent
     */
    public function __construct(UserRepositoryEloquent
                                $userRepositoryEloquent)
    {
        $this->userRepositoryEloquent = $userRepositoryEloquent;
    }

    public function getAllMentors()
    {
        try {
            $mentors = $this->_filterRoleMentor();
            if($mentors):
                return $mentors;
            endif;
        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function createMentor(array $data)
    {
        try {
            $mentor = $this->userRepositoryEloquent->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'roles' => 2,
                'remember_token' => str_random(10),
            ]);
            if($mentor):
                // Criar um evento e jogar numa queue, se não vai dar lag
                Mail::send('email.welcome', ['mentor' => $mentor], function ($message) use ($mentor) {
                    $message->from('joaomarcusjesus@gmail.com', 'Your Application');
                    $message->to($mentor->email)->subject('Cadastro feito com sucesso!');
                });
                return $mentor;
            endif;
        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    protected function _filterRoleMentor()
    {
        return DB::table('users')
            ->select('*')
            ->where('roles', '=', 2)
            ->groupBy('id')
            ->get();
    }
}