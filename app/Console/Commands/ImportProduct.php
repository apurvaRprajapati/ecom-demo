<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ImportProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \DB::table('products')->truncate();
        \DB::table('cart')->truncate();
        \DB::table('orders')->truncate();
        for ($i=1; $i <11 ; $i++) { 
            $apiURL = 'https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products';
            $parameters = ['page' => $i];
            $response = Http::get($apiURL, $parameters);
            $statusCode = $response->status();
            $responseBody = json_decode($response->getBody(), true);
            $products = [];
            foreach ($responseBody as $key => $value) {
                $category = (count($value['categories']) > 0) ? $value['categories'][0]['name'] : '';
                $image = '';
                if(isset($value['images'])) {
                    $image = ($value['images'][0]['src_small'] == '') ? $value['images'][0]['src'] : $value['images'][0]['src_small'];
                } 

                $price = ($value['regular_price'] == '' || $value['regular_price'] == ' ') ? 0 : $value['regular_price']; 
                array_push($products,['name' => $value['name'],
                                     'price' => $price, 
                                     'category' => $category,
                                     'image' => $image, 
                                     'description' => $value['description']
                                 ]);   
            }
            if(count($products) > 0) {
                \DB::table('products')->insert($products);
            }
            
        }
    }
}