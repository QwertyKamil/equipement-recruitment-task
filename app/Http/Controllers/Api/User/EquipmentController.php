<?php

namespace App\Http\Controllers\Api\User;

use App\Exceptions\CantBuyException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Chest as ChestResource;
use App\Http\Resources\Prize as PrizeResource;
use App\Http\Resources\Rune as RuneResource;
use App\Models\Chest;
use App\Models\Interfaces\ToBuy;
use App\Models\Prize;
use App\Models\Rune;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipmentController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * EquipmentController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getUsersEquipment(Request $request)
    {
        return response()->json($this->userRepository->getEquipment($request->user()), Response::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function getAvailableEquipment()
    {
        return response()->json([
            'chests' => ChestResource::collection(Chest::all()),
            'prizes' => PrizeResource::collection(Prize::all()),
            'runes' => RuneResource::collection(Rune::all()),
        ], Response::HTTP_OK);
    }

    /**
     * @param Chest $chest
     * @return JsonResponse
     */
    public function buyChest(Chest $chest)
    {
        return $this->buy($chest);
    }

    /**
     * @param Prize $prize
     * @return JsonResponse
     */
    public function buyPrize(Prize $prize)
    {
        return $this->buy($prize);
    }

    /**
     * @param Rune $rune
     * @return JsonResponse
     */
    public function buyRune(Rune $rune)
    {
        return $this->buy($rune);
    }

    private function buy(ToBuy $toBuy)
    {
        try {
            $this->userRepository->buyEquipment(request()->user(), $toBuy);
            return response()->json([
                'message'=>'Kupiłeś nagrodę'
            ],Response::HTTP_CREATED);
        } catch (CantBuyException $e) {
            return response()->json([
                'message'=>$e->getMessage()
            ],$e->getCode());
        }
    }


}
