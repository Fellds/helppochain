<?php

namespace App\Http\Controllers;

use App\Block;
use App\Blockchain;

use App\Services\BlockchainService;
use App\Services\BlockService;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blockchain $blockchain)
    {
        $blocks = $blockchain->blocks;

        return view('block.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blockchain $blockchain)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blockchain $blockchain, Request $request)
    {

        $request->validate([
            'data' => 'required|json',
        ]);

        $args = [
            'blockchain_id' => $blockchain->id,
            'data'          => $request->data,
        ];

        $createBlock = $blockchain->newBlock($args);

        dump($createBlock);
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        return view('block.show', compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Block $block)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        //
    }
}