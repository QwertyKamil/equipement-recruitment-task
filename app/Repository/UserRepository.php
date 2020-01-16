<?php


namespace App\Repository;


use App\Http\Resources\Chest as ChestResource;
use App\Http\Resources\Prize as PrizeResource;
use App\Http\Resources\Rune as RuneResource;
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
