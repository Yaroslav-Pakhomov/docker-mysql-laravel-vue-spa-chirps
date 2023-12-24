<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\MessageBoard;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class MessageBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|ResponseFactory
    {
        $messages = MessageBoard::AllMessages();
        return inertia('MessageBoard/Index', [
            'props_int' => 5,
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|ResponseFactory
    {
        return inertia('MessageBoard/Create', [
            'props_int' => 4,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageBoard $messageBoard): Response|ResponseFactory
    {
        return inertia('MessageBoard/Show', [
            'message' => $messageBoard,
        ]);
    }

    /**
     * Show the form for editing the specified resource.       MessageBoard $messageBoard
     */
    public function edit(): Response|ResponseFactory
    {
        return inertia('MessageBoard/Edit', [
            'props_int' => 2,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MessageBoard $messageBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(MessageBoard $messageBoard)
    {
        //
    }
}
