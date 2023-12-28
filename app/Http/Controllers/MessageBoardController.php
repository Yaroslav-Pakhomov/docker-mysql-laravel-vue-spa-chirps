<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MessageBoard\StoreMessageBoardRequest;
use App\Http\Requests\MessageBoard\UpdateMessageBoardRequest;
use App\Http\Resources\MessageBoard\MessageBoardResource;
use App\Models\MessageBoard;
use Illuminate\Http\RedirectResponse;
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
        // ->resolve() - избавляемся от слова 'data'
        $messages = MessageBoardResource::collection($messages)->resolve();

        return inertia('MessageBoard/Index', [
            'props_int' => 5,
            'messages'  => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|ResponseFactory
    {
        return inertia('MessageBoard/Create', [
            'props_int' => 444,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageBoardRequest $request): RedirectResponse
    {
        $message = $request->validated();
        MessageBoard::query()->create($message);
        sleep(1);

        return redirect()->route('message-board.index')->with([
            'flash_message' => "Сообщение успешно создано",
            'class'         => 'alert alert-success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageBoard $messageBoard): Response|ResponseFactory
    {
        $message = MessageBoardResource::make($messageBoard)->resolve();

        return inertia('MessageBoard/Show', [
            'message' => $message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MessageBoard $messageBoard): Response|ResponseFactory
    {
        $message = MessageBoardResource::make($messageBoard)->resolve();

        return inertia('MessageBoard/Edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageBoardRequest $request, MessageBoard $messageBoard): RedirectResponse
    {
        $message = $request->validated();
        $messageBoard->update($message);

        return redirect()->route('message-board.show', [$messageBoard->slug])->with([
            'flash_message' => "Сообщение успешно обновлено",
            'class'         => 'alert alert-success',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(MessageBoard $messageBoard)
    {
        //
    }
}
