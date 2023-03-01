<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GuzzleCountryController extends Controller
{
    public function getAllCountries()
    {

        // Create a new Guzzle client instance
        $client = new Client(['verify' => false]);

        // Make a GET request to the API endpoint
        $response = $client->get('https://restcountries.com/v2/all');

        // Decode the response body
        $data['countryData'] = json_decode($response->getBody());


        // Pass the data to the view
        return view('guzzleCountry.index', $data);

    }
}
