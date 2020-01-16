<?php


namespace App\Repository;


use App\Http\Resources\UserChest as ChestResource;
use App\Http\Resources\UserPrize as PrizeResource;
use App\Http\Resources\UserRune as RuneResource;
use App\User;

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
}
