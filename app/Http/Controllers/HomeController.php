<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    public function showValidateForm()
    {
        return view('validate-cdc');
    }
    public function validateCdc(Request $request)
    {
        $cdcno = $request->input('cdcno');
    
        $response = Http::get("http://api.ishsmumbai.in/validate-cdcno/?cdcno={$cdcno}");
    
        if ($response->successful()) {
            $responseData = $response->json();
            
            if ($responseData['status'] == 1) {
                // User already exists
                return redirect()->route('showLoginForm')->with('msg', 'User already exists. Proceed to login.');
            } else {
                // User does not exist, proceed to registration form
                return redirect()->route('showRegisterForm')->with('cdcno', $cdcno);
            }
        } else {
            return redirect()->back()->with('error', 'Failed to validate CDC number. Please try again.');
        }
    }
    
    
    public function showChangePinForm()
    {
        return view('changepin');
    }

    public function changePin(Request $request)
    {
        // Validate the input
        $request->validate([
            'cdcno' => 'required|string',
            'new_spin' => 'required|string|size:4',
        ]);

        $cdcno = $request->input('cdcno');
        $new_spin = $request->input('new_spin');
        
        $validateUrl = "http://api.ishsmumbai.in/validate-cdcno/?cdcno={$cdcno}";
        $changePinUrl = "http://api.ishsmumbai.in/change-pin/?cdcno={$cdcno}&spin={$new_spin}";

        // Create a Guzzle HTTP client instance
        $client = new Client();

        try {
            // Validate the CDC number
            $validateResponse = $client->get($validateUrl);
            $validateData = json_decode($validateResponse->getBody()->getContents(), true);

            if (isset($validateData['status']) && $validateData['status'] == 1) {
                // CDC number is valid, proceed to change the PIN
                $changePinResponse = $client->get($changePinUrl);
                $changePinData = json_decode($changePinResponse->getBody()->getContents(), true);

                if (isset($changePinData['status']) && $changePinData['status'] == 1) {
                    return redirect()->back()->with('success', 'PIN changed successfully');
                } else {
                    $message = isset($changePinData['message']) ? $changePinData['message'] : 'Failed to change PIN';
                    return redirect()->back()->with('error', $message);
                }
            } else {
                $message = isset($validateData['message']) ? $validateData['message'] : 'Invalid CDC number';
                return redirect()->back()->with('error', $message);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function showRegisterForm()
    {
        $client = new Client();

        // Fetch master-rank data
        $rankResponse = $client->get('http://api.ishsmumbai.in/master-rank/');
        $ranks = json_decode($rankResponse->getBody(), true);

        // Fetch master-department data
        $departmentResponse = $client->get('http://api.ishsmumbai.in/master-department/');
        $departments = json_decode($departmentResponse->getBody(), true);

        // Fetch master-state data
        $stateResponse = $client->get('http://api.ishsmumbai.in/master-state/');
        $states = json_decode($stateResponse->getBody(), true);

        // Pass data to the view
        return view('register', [
            'ranks' => $ranks['data'] ?? [],
            'departments' => $departments['data'] ?? [],
            'states' => $states['data'] ?? []
        ]);
    }
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $cdcno = $request->input('cdcno');
        $spin = $request->input('spin');

        $response = Http::get("http://api.ishsmumbai.in/login/?cdcno={$cdcno}&spin={$spin}");

        if ($response->successful()) {
            $responseData = $response->json();
            
            if ($responseData['status'] == 1) {
                $sailorData = $responseData['sailor_data'];
                return redirect()->route('userdetails')->with('sailorData', $sailorData);
            } else {
                return redirect()->back()->with('error', $responseData['message']);
            }
        } else {
            return redirect()->back()->with('error', 'Failed to login. Please try again.');
        }
    }


    public function registerDone(Request $request)
    {
        $data = $request->all();
        
        $response = Http::post('http://api.ishsmumbai.in/register-step1/', [
            'cdcno' => $data['cdcno'],
            'ishs_no' => $data['ishs_no'],
            // 'regn_no' => $data['regn_no'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'department_id' => $data['department_id'],
            'rank_id' => $data['rank_id'],
            'permanent_add_1' => $data['permanent_add_1'],
            'permanent_add_2' => $data['permanent_add_2'],
            'permanent_add_3' => $data['permanent_add_3'],
            'permanent_state_id' => $data['permanent_state_id'],
            'permanent_city' => $data['permanent_city'],
            'permanent_pincode' => $data['permanent_pincode'],
            'permanent_phone' => $data['permanent_phone'],
            'permanent_mobile' => $data['permanent_mobile'],
            'permanent_email' => $data['permanent_email'],
            // 'photo' => $data['photo'],
            // 'signature' => $data['signature'],
            // 'photo' => $data['photo']->store('photos'),
            // 'signature' => $data['signature']->store('signatures'),
            'step' => $data['step'],
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Registration successful');
            // return redirect()->route('showUserDetails', ['error' => $response]);
        } else {
            return redirect()->back()->with('error', 'Registration failed: ' . $response->body());
        }
    }
    
    public function showUserDetails()
    {
        $sailorData = session('sailorData');
        if (!$sailorData) {
            return redirect()->route('login')->with('error', 'No sailor data found.');
        }

        return view('userdetails', compact('sailorData'));
    }


    public function userDetails()
    {
        $data = session('data');
        return view('userdetails', ['data' => $data]);
    }
    private function fetchData($url)
    {
        $response = Http::get($url);
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
}
