<?php


namespace App\Models\Interfaces;


use App\User;

interface ToBuy
{
    public function assignToUser(User $user);

    public function canBuy(float $balance): bool;
}
