<?php


namespace App\Repository\Interfaces;


use App\Models\Interfaces\ToBuy;
use App\User;

interface UserRepositoryInterface
{
    public function getEquipment(User $user);

    public function buyEquipment(User $user, ToBuy $toBuy);
}
