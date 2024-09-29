<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function App\Helpers\apiResponse;

class InviteController extends Controller
{
    private $tripRepo;
    public function __construct(TripRepositoryInterface $tripRepo)
    {
        $this->tripRepo = $tripRepo;
    }

    public function getAllInvites()
    {
        try{
            $invites = $this->tripRepo->getAllInvites();
            if($invites){
                return apiResponse($invites, 'Invites Sent.', true, 200);
            }

            return apiResponse(null, 'No invites available.', false, 404);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    public function inviteToTrip(Request $request, $tripId)
    {
        $validate = $request->validate([
            'invited_to' => ['required','array', 'exists:users,id']
        ]);

        try{
            $tripInvite = $this->tripRepo->inviteToTrip($validate['invited_to'], $tripId);
            if($tripInvite){
                return apiResponse($tripInvite, 'Invite Sent.', true, 200);
            }

            return apiResponse(null, 'No instance found.', false, 404);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    public function inviteAcceptReject($action, $tripId)
    {
        try{
            $inviteAction = $this->tripRepo->inviteAction($action, $tripId);
            return apiResponse($inviteAction, 'Accepted Invite and Enrolled into Trip,', true, 200);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }
}
