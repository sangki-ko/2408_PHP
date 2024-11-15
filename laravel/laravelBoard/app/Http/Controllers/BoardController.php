<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 여러 개의 데이터를 화면에 표시 (화면으로 이동하는 액션 메소드)
    public function index()
    {
        // 리스트 데이터 획득
        // $result = Board::select('select * from boards where deleted_at IS NULL ORDER BY created_at DESC, b_id DESC limit 100');
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                                ->orderBy('created_at', 'DESC')
                                ->orderBy('b_id', 'DESC')
                                ->limit(100)
                                ->get();
        
        return view('boardList')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 작성 페이지로 이동 (새로운 글이나, 내용을 넣는 페이지로 이동)
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 실제로 작성 처리하는 건 store
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->only('b_title', 'b_content', 'b_img', 'bc_type')
            ,[
                'b_title' => ['required', 'min:5', 'max:50', 'regex:/^[a-zA-Z0-9가-힣\s\-\_\.,!?@#%&]*$/'],
                'b_content' => ['required', 'min:5', 'max:200', 'regex:/^[a-zA-Z0-9가-힣\s\-\_\.,!?@#%&\n]*$/'],
                'b_img' => ['required', 'max:100']
            ]
        );

        if($validator->fails()) {
            return redirect()
                        ->route('boards.create')
                        ->withErrors($validator->errors());
        }
        
        $filePath = $request->file('b_img')->store('img');
        
        Board::create([
            'u_id' => Auth::id()
            ,'bc_type' => 0
            ,'b_title' => $request->b_title
            ,'b_content' => $request->b_content
            ,'b_img' => $filePath
        ]);

        return redirect()->route('boards.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 디테일 페이지로 이동 (해당 데이터에 pK번호를 보통 보낸다.)
    // 상세 데이터를 만들어줘서 보내주는게 show
    // delete와 url의 세그먼트 파라미터 값이 같은데 show로 처리할 수 있는 이유가 뭔가?
    // show는 get 방식으로 받게 되서 실행이 되는 것이고, delete는 http 메소드가 delete로 와야 한다.
    // route::resouce 자체가 get만 인식하는게 아니라,  http 메소드를 어떻게 보내느냐에 따라 다르다.
    public function show($id)
    {
        Log::debug('********* boards/show Start ********* ');
        Log::debug('request id : '.$id);

        $result = Board::find($id);

        // 간단한 엘로퀀트 예
        // public function save(Request $request)
        // {
        //     // 사용자의 입력으로부터 새로운 연락처 데이터를 생성하고 저장
        //     $contact = new Contact();
        //     $contact->first_name = $request->input('first_name');
        //     $contact->last_name = $request->input('last_name');
        //     $contact->email = $request->input('email');
        //     $contact->save(); // 저장

        //     return redirect('contacts');
        // }

        Log::debug('상세 데이터 획득', $result->toArray());
        return response()->json($result->toArray());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 수정 페이지로 이동 (해당 게시글에 수정 페이지로 이동)
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 실제로 수정 처리를 함 (수정 완료 버튼을 눌렀을 때 기존에 있던 데이터를 새로운 데이터로 변경하는 처리)
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 데이터 삭제
    public function destroy($id)
    {
        //
    }
}
