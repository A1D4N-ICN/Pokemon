<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pokemon;

use Storage;

class fetchPokemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:pokemon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Original Pokemon';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // For loop only the original pokemon from 1 to 151
        for ($count = 1; $count < 152; $count++)
        {
            $curl = curl_init();
            $url = "https://pokeapi.co/api/v2/pokemon/" . $count;
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPGET, true);
            // curl_setopt($curl, CURLOPT_HTTPHEADER, $httpHeader);
            $response = curl_exec($curl);
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);

            if (isset($error_msg)) {
                Log::error('Pokemon Worker Id: '.$count);
                Log::error('Pokemon Worker Error: '.$error_msg);
            } else {
                $response = json_decode($response);

                $url = $response->sprites->front_default;
                $contents = file_get_contents($url);
                $fileName = substr($url, strrpos($url, '/') + 1);
                Storage::disk('public')->put($fileName, $contents);

                $pokemon = Pokemon::firstOrNew(['id' => $response->id]);
                $pokemon->name = $response->name;
                $pokemon->base_experience = $response->base_experience;
                $pokemon->height = $response->height;
                $pokemon->is_default = $response->is_default;
                $pokemon->order = $response->order;
                $pokemon->weight = $response->weight;
                $pokemon->sprite = $fileName;
                $pokemon->save();

                if($response->id == 25) {

                }
            }
        }
        
        return 0;
    }
}
