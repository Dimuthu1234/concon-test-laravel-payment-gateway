<?php

namespace App\Http\Controllers\Web\User;

use App\History;
use App\Repositories\HistoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    protected $historyRepository;

    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = $this->historyRepository->getAllHistoriesByUser();
        $historyCarts = $this->historyRepository->getHistoryCartByUser();
        $products = [];
        $itemsArray = [];
        $items = [];
        $productTitles = [];
        for ($x = 0; $x <= sizeof($historyCarts) - 1; $x++) {
            $itemsArray[] = array_merge(['cart' => $historyCarts[$x]['carts']], ['eachHistoryId' => $historyCarts[$x]['history']->id]);
            for ($y = 0; $y <= sizeof($itemsArray) - 1; $y++) {
                $items[] = $itemsArray[$y]['cart']->items;
                for ($z = 1; $z <= sizeof($items[0]); $z++) {
                    $products[] = $items[0][$z]['item'];
                    for ($p = 0; $p <= sizeof($products) - 1; $p++) {
                        $productTitles[] = $products[$p]->title;
                    }
                }
            }
        }
//     dd($products);
        return view('history.index')
            ->withHistoryCarts($historyCarts)
            ->withHistories($histories)
            ->withProducts($products)
            ->withProductTitle(array_unique($productTitles))
            ->withItemArray($itemsArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\History $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\History $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\History $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\History $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
