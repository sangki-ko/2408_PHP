<?php

namespace App\Http\Controllers;

use App\Models\Board;
use MyToken;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boardList = Board::orderBy('created_at', 'DESC')->paginate(8);

        $responseData = [
            'success' => true,
            'msg' => '게시글 획득 성공',
            'boardList' => $boardList->toArray()
        ];
        
        return response()->json($responseData, 200);
    }

    public function show($id) {
        // $board = Board::join('users', 'boards.user_id', '=', 'users.user_id')
        //                 ->select('boards.*', 'users.name')
        //                 // ->where('boards.board_id', '=', $id)
        //                 // ->first();
        //                 ->find($id);
        $board = Board::with('user')->find($id);

        $responseData = [
            'success' => true,
            'msg' => '상세 정보 획득 성공',
            'board' => $board->toArray()
        ];

        return response()->json($responseData, 200);
    }

    public function store(Request $request) {
        // TODO 유효성 체크 넣자

        // insert 할 데이터
        $insertData = $request->only('content');
        $insertData['user_id'] = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        $insertData['like'] = 0;
        $insertData['img'] = '/'.$request->file('file')->store('img');

        // insert 처리
        $board = Board::create($insertData);

        $responseData = [
            'success' => true,
            'msg' => '게시글 작성 성공',
            'board' => $board->toArray()
        ];

        return response()->json($responseData, 200);
    }   
}
