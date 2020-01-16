<?php


namespace App\Repository;


use App\Exceptions\CantBuyException;
use App\Http\Resources\UserChest as ChestResource;
use App\Http\Resources\UserPrize as PrizeResource;
use App\Http\Resources\UserRune as RuneResource;
use App\Models\Interfaces\ToBuy;
use App\User;
use Symfony\Component\HttpFoundation\Response;

class UserRepository
{
    public function getEquipment(User $user)
    {
        return [
          'chests'=>ChestResource::collection($user->chests),
          'prizes'=>PrizeResource::collection($user->prizes),
          'runes'=>RuneResource::collection($user->runes),
        ];
    }

    public function buyEquipment(User $user, ToBuy $toBuy)
    {
        if($toBuy->canBuy(0)){
            $toBuy->assignToUser($user);
        }
        else{
            throw new CantBuyException("Masz za mało punktów",Response::HTTP_FORBIDDEN);
        }
    }
}
