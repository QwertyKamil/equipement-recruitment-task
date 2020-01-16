<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
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

    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        return response()->json($this->userRepository->getEquipment($user),Response::HTTP_OK);
    }
}
