<?php

namespace App\Http\Controllers\Api\User;

use App\Exceptions\CantBuyException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Chest as ChestResource;
use App\Http\Resources\Prize as PrizeResource;
use App\Http\Resources\Rune as RuneResource;
use App\Models\Chest;
use App\Models\Prize;
use App\Models\Rune;
use App\Repository\UserRepository;
use App\User;
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
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersEquipment()
    {
        /** @var User $user */
        $user = auth()->user();
        return response()->json($this->userRepository->getEquipment($user), Response::HTTP_OK);
    }

    public function getAvailableEquipment()
    {
        return response()->json([
            'chests' => ChestResource::collection(Chest::all()),
            'prizes' => PrizeResource::collection(Prize::all()),
            'runes' => RuneResource::collection(Rune::all()),
        ], Response::HTTP_OK);
    }

    public function buyChest(Request $request, Chest $chest)
    {
        /** @var User $user */
        $user = auth()->user();
        try {
            $this->userRepository->buyEquipment($user, $chest);
            return response()->json([
                'message'=>'Kupiłeś skrzynkę'
            ],Response::HTTP_CREATED);
        } catch (CantBuyException $e) {
            return response()->json([
                'message'=>$e->getMessage()
            ],$e->getCode());
        }
    }

    public function buyPrize(Request $request, Prize $prize)
    {
        /** @var User $user */
        $user = auth()->user();
        try {
            $this->userRepository->buyEquipment($user, $prize);
            return response()->json([
                'message'=>'Kupiłeś nagrodę'
            ],Response::HTTP_CREATED);
        } catch (CantBuyException $e) {
            return response()->json([
                'message'=>$e->getMessage()
            ],$e->getCode());
        }
    }

    public function buyRune(Request $request, Rune $rune)
    {
        /** @var User $user */
        $user = auth()->user();
        try {
            $this->userRepository->buyEquipment($user, $rune);
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
