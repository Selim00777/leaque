<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;  // Замените на ваш класс запроса на валидацию
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Сохранение нового комментария.
     *
     * @param StoreCommentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $validatedData = $request->validated();

        $comment = new Comment;
        $comment->game_id = $validatedData['game_id']; // Предполагая, что поле 'game_id' существует в модели Comment
        $comment->user_id = Auth::id();  // Аутентификация пользователя
        $comment->text = $validatedData['text'];
        $comment->save();

        // Необязательно: Отобразить сообщение об успехе
        return redirect()->route('game.show', $comment->game_id)->with('success', 'Комментарий успешно опубликован!');
    }
}
