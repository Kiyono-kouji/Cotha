<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\EventTeam;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Midtrans\Snap;

class EventRegistrationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        // Validate the request
        $validated = $request->validate([
            'guardian_name' => 'required|string|max:255',
            'guardian_email' => 'required|email|max:255',
            'guardian_phone' => ['required', 'regex:/^\+?\d{9,15}$/'],
            'teams' => 'required|array|min:1',
            'teams.*.team_name' => 'required|string|max:255',
            'teams.*.participants' => 'required|array|min:1',
            'teams.*.participants.*.name' => 'required|string|max:255',
            'teams.*.participants.*.email' => 'required|email|max:255',
            'teams.*.participants.*.school' => 'required|string|max:255',
        ]);

        // Validate team size
        if ($event->isTeamBased()) {
            foreach ($validated['teams'] as $team) {
                if (count($team['participants']) > $event->max_team_members) {
                    return back()->withErrors([
                        'teams' => "Each team can have a maximum of {$event->max_team_members} members."
                    ])->withInput();
                }
            }
        } else {
            // For individual events, each "team" should have exactly 1 participant
            foreach ($validated['teams'] as $team) {
                if (count($team['participants']) > 1) {
                    return back()->withErrors([
                        'teams' => "Individual events can only have 1 participant per registration."
                    ])->withInput();
                }
            }
        }

        DB::beginTransaction();
        try {
            // Calculate total price
            $totalParticipants = 0;
            foreach ($validated['teams'] as $team) {
                $totalParticipants += count($team['participants']);
            }
            $totalPrice = $totalParticipants * $event->price_per_participant;

            // Create the registration
            $registration = EventRegistration::create([
                'event_id' => $event->id,
                'guardian_name' => $validated['guardian_name'],
                'guardian_email' => $validated['guardian_email'],
                'guardian_phone' => $validated['guardian_phone'],
                'total_teams' => count($validated['teams']),
                'total_price' => $totalPrice,
                'payment_status' => 'pending',
            ]);

            $registration->invoice_number = 'EVREG-' . now()->format('Ymd') . '-' . str_pad($registration->id, 4, '0', STR_PAD_LEFT);
            $registration->save();

            // Create teams and participants
            foreach ($validated['teams'] as $teamData) {
                $team = EventTeam::create([
                    'event_registration_id' => $registration->id,
                    'team_name' => $teamData['team_name'],
                ]);

                foreach ($teamData['participants'] as $participantData) {
                    EventParticipant::create([
                        'event_team_id' => $team->id,
                        'name' => $participantData['name'],
                        'email' => $participantData['email'],
                        'school' => $participantData['school'],
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('payment.show', $registration->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'There was an error registering. Please input valid data and try again, or contact us if the problem persists.'
            ])->withInput();
        }
    }
}