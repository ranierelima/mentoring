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
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\DemandRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;


class DemandService
{

    /**
     * @var DemandRepository
     */
    private $demandRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var PerfomanceRepositoryEloquent
     */
    private $perfomanceRepositoryEloquent;
    /**
     * @var ActRepositoryEloquent
     */
    private $actRepositoryEloquent;

    public function __construct(DemandRepositoryEloquent $demandRepository,
                                UserRepositoryEloquent $userRepository, ActRepositoryEloquent $actRepositoryEloquent)
    {

        $this->demandRepository = $demandRepository;
        $this->userRepository = $userRepository;
        $this->actRepositoryEloquent = $actRepositoryEloquent;
    }

    public function myDemands()
    {
        //Quem tá logado?
        if ($this->getMyAuth()):
            $Who = Auth::user();
            try {
                //Pego as demandas usando o _id do cara logado
                $demand = $this->demandRepository->findByField('user_id', $Who->id);
                return $demand;
            } catch (QueryException $q) {
                $q->getMessage();
            }
        endif;

    }

    public function myDemandsCreate(array $data)
    {

        try {

            $d = $this->demandRepository->create([
                'title' => $data['title'],
                'subject' => $data['subject'],
                'doubt' => $data['doubt'],
                'student' => $data['student'],
                'email' => $data['email'],
                'user_id' => $this->getMyUserById()
            ]);

            $this->actRepositoryEloquent->create([
                'area' => $data['area'],
                'demand_id' => $d->id
            ]);



        } catch (QueryException $exception) {
            $exception->getMessage();
        }

    }

    private function getMyAuth()
    {
        return Auth::check();
    }

    private function getMyUserById()
    {
        if ($this->getMyAuth()):
            return Auth::user()->id;
        endif;
    }

}