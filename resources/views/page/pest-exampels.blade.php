<x:miniHelper::layouts.package>
    <div>
        <div class="container px-3 mx-auto ">
            <div class="grid grid-cols-1 gap-7">


                <div class="p-5 bg-[#282a36] border-2 rounded-md text-teal-500">
                    <p class="mb-3 font-bold">Job Testing</p>
                    <pre data-enlighter-language="php">
                    
beforeEach(function () {
    // Any setup required before each test
    Queue::fake(); // Make sure the queue is faked before dispatching jobs
    Bus::fake();
});

//...

it('dispatches an import products from comWORK', function () {
    ImportFromComworkStocksInStorageLocationJob::dispatch();
    // Queue::assertPushed(ImportFromComworkStocksInStorageLocationJob::class);
    Bus::assertDispatched(ImportFromComworkStocksInStorageLocationJob::class);
});

                    
                    </pre>
                </div>


                <div class="p-5 bg-[#282a36] border-2 rounded-md text-teal-500">
                    <p class="mb-3 font-bold">Route Testing</p>
                    <pre data-enlighter-language="php">
                  
beforeEach(function () {
        $this->user = User::where('email', 'reinhold.jesse@componist.de')->where('isAdmin', 1)->first();
});


//...


it('can get a list of articles from storage locations from the API', function () {

    $url = $this->url.'data/intermediatestoragelocations?includeStockItems=true';

    $response = Http::withHeaders([
        'Api-Key' => env('COMWORK_API_KEY'),
        'accept' => 'application/json',
    ])->get($url);

    expect($response->status())->toEqual(200);
});

                 

it('call API get Project Inventories Stocke Items from comWORK', function () {
    $response = $this->actingAs($this->user)
        ->get('/admin/comwork/getProjectInventories');

    $response->assertStatus(200);
});

                  

it('test show login form', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('authenticated user routing test dashboard/storage', function () {
    $this->actingAs($this->user)
        ->get('/dashboard/storage')
        ->assertSeeLivewire('prio-storage.index');
});

                
                  </pre>
                </div>



            </div>


        </div>
    </div>
</x:miniHelper::layouts.package>
