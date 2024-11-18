<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardsCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 여러 개의 데이터를 화면에 표시 (화면으로 이동하는 액션 메소드)
    public function index(Request $request)
    {
        // 게시글 타입 획득
        $bcType = '0';
        // has = 우리가 작성해주는 키가 존재하는지 존재하지 않는지 체크
        if($request->has('bc_type')) {
            $bcType = $request->bc_type;
        }



        // 리스트 데이터 획득
        // $result = Board::select('select * from boards where deleted_at IS NULL ORDER BY created_at DESC, b_id DESC limit 100');
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                                ->where('bc_type', $bcType)
                                ->orderBy('created_at', 'DESC')
                                ->orderBy('b_id', 'DESC')
                                ->limit(100)
                                ->get();
        // 게시판 이름 획득
        $boardTitle = BoardsCategory::where('bc_type', $bcType)->first();

        
        return view('boardList')->with('data', $result)->with('boardName', $boardTitle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 작성 페이지로 이동 (새로운 글이나, 내용을 넣는 페이지로 이동)
    public function create(Request $request)
    {
        return view('insert')->with('bcType', $request->bc_type);
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

        // 무조건 요청이 요청이 온 직전 페이지로 넘어간다.
        // $request->validate([
        //         'b_title' => ['required', 'min:5', 'max:50', 'regex:/^[a-zA-Z0-9가-힣\s\-\_\.,!?@#%&]*$/'],
        //         'b_content' => ['required', 'min:5', 'max:200', 'regex:/^[a-zA-Z0-9가-힣\s\-\_\.,!?@#%&\n]*$/'],
        //         'b_img' => ['required', 'max:100']
        // ]);
        // 유효성 체크
        $validator = Validator::make(
            $request->only('b_title', 'b_content', 'file', 'bc_type')
            ,[
                'b_title' => ['required', 'min:5', 'max:50', 'regex:/^[a-zA-Z0-9가-힣\s\-\_\.,!?@#%&]*$/'],
                'b_content' => ['required', 'min:5', 'max:200', 'regex:/^[a-zA-Z0-9가-힣\s\-\_\.,!?@#%&\n]*$/'],
                'file' => ['required', 'max:100' /*image(검증받은 파일만 추가가 가능하다.), mines : 내가 원하는 파일만 추가할 수 있도록 설정 가능하다. */]
                ,'bc_type' => ['required', 'exists:boards_category,bc_type']
            ]
        );

        if($validator->fails()) {
            return redirect()
                        ->route('boards.create')
                        ->withErrors($validator /* ->errors()를 이용해 배열을 만들어줘도 되나, validator 객체는 자동으로 배열 형태로 보내준다. */);
        } 
        $filePath = '';
        try {
            // 파일 저장
            $filePath = $request->file('file')->store('img');
             
            DB::beginTransaction();
            // Board::create([
            //     'u_id' => Auth::id()
            //     ,'bc_type' => $request->bc_type
            //     ,'b_title' => $request->b_title
            //     ,'b_content' => $request->b_content
            //     ,'b_img' => '/'.$filePath
            // ]);

            // 글 작성 처리
            $insertData = $request->only('b_title', 'b_content', 'bc_type');
            $insertData['u_id'] = Auth::id();
            $insertData['b_img'] = '/'.$filePath;
            Board::create($insertData);

            DB::commit();
        }catch(Throwable $th) {
            DB::rollBack();
            // Storage : 파일을 다루기 위해서 라라벨에서 만들어둔 객체, 스토리지를 이용해서 파일 여부가 있는지 없는지 확인 및 삭제
            if(Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
        
        return redirect()->route('boards.index', ['bc_type' => $request->bc_type]);

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
        // Log::debug('********* boards/show Start ********* ');
        // Log::debug('request id : '.$id);

        $result = Board::find($id);

        $responseData = $result->toArray();
        $responseData['delete_flg'] = $result->u_id === Auth::id();

        // Log::debug('상세 데이터 획득', $result->toArray());
        return response()->json($responseData);
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
        $result = Board::destroy($id);

        $responseData = [
            'success' => $result === 1 ? true : false
        ];

        return response()->json($responseData);
    }
}
