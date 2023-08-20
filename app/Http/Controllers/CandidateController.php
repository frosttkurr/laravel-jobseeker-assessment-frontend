<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:3004/api/candidates";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        return view('candidates.index', compact('responseBody'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'pob' => 'required',
            'gender' => 'required|in:M,F|not_in:-',
            'year_exp' => 'required|not_in:-', 
        ]);
        
        $url = 'http://localhost:3004/api/candidates';
        $client = new Client();
    
        try {
            $response = $client->post($url, [
                'json' => $request->all(),
            ]);
    
            $responseData = json_decode($response->getBody(), true);
            if ($responseData["meta"]["status"] == 200) {
                return redirect()->route('candidates.index');
            } else {
                return redirect()->back();
            }
        } catch (ClientException $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $url = "http://localhost:3004/api/candidates/" . $id;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        $candidate = $responseBody->result;
        return view('candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'pob' => 'required',
            'gender' => 'required|in:M,F|not_in:-',
            'year_exp' => 'required|not_in:-', 
        ]);
        
        $url = 'http://localhost:3004/api/candidates/' . $id;
        $client = new Client();
    
        try {
            $response = $client->put($url, [
                'json' => $request->all(),
            ]);
    
            $responseData = json_decode($response->getBody(), true);
            if ($responseData["meta"]["status"] == 200) {
                return redirect()->route('candidates.index');
            } else {
                return redirect()->back();
            }
        } catch (ClientException $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
