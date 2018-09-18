<?php

namespace App\Http\Controllers\Api;

use App\Model\user\invitation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcceptController extends Controller
{
    public function accept($invitation_id, $action)
    {
        $invitation = Invitation::findOrFail($invitation_id);
        if (!in_array($action, ['accept', 'reject'])) {
            abort(404);
        }

        if ($action == 'accept') {
            $invitation->update(['accepted_at' => Carbon::now()->toDateTimeString()]);
        }
        if ($action == 'reject') {
            $invitation->update(['rejected_at' => Carbon::now()->toDateTimeString()]);
        }

        return 'Your invitation was successfully ' . $action . 'ed';

    }
}
