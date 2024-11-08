{{-- 상속 --}}
@extends('layout.layout')

{{-- @section : 부모 템플릿에 해당하는 yield에 삽입 --}}
@section('title', 'Extends')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 범위를 지정해서 삽입 --}}
@section('main')
    <h2>자신의 메인 영역</h2>
@endsection

{{-- 자식 쪽에 show가 없다면 부모에 있는 show를 출력시키는 문법 --}}
@section('show', '자식자식 show')

<hr>
{{-- 블레이드 템플릿에선 세션 부분은 해당 파일에 코드를 실행한 뒤 마지막에 실행된다. --}}
{{-- @if : 조건문 --}}
@if($data[0]['gender'] === 'F')
    <span>여자</span>
@elseif($data[0]['gender'] === 'M')
    <span>남자</span>
    {{-- 데이터를 출력할 때 --}}
    {{-- {{ $data[0]['id'] }} --}}
@else
    <span>알 수 없음</span>
@endif
<hr>

{{-- 반복분 --}}
{{-- @for ~ @endfor : for 반복문 --}}
@for($i = 0; $i < 5; $i++)
    <span>{{ $i }}</span><br>
@endfor 

{{-- @for($i = 2; $i <= 9; $i++)
    <h3>*** {{$i}}단 ***</h3><br>
    @for($a = 1; $a <= 9; $a++)
        <span>{{ $i." X ".$a."=".$i * $a }}</span><br>
    @endfor
@endfor --}}

{{-- @foreach ~ @endforeach : foreach 반복문 --}}
@foreach ($data as $item)
    @if($loop->odd)
    <div style="color: red;">
        <h3>{{$item['name']}}</h3>
        <span>{{$item['gender']}}</span>
        <span>남은 루프 횟수 : {{ $loop->remaining }}</span>
    </div>
    @else
    <div>
        <h3>{{$item['name']}}</h3>
        <span>{{$item['gender']}}</span>
        <span>남은 루프 횟수 : {{ $loop->remaining }}</span>
    </div>
    @endif
    {{-- 좀 더 간결한 방법 --}}
    {{-- <div style="{{ $loop->odd ? 'color: blue;' : ''}}">
        <h3>{{$item['name']}}</h3>
        <span>{{$item['gender']}}</span>
        <span>남은 루프 횟수 : {{ $loop->remaining }}</span>
    </div> --}}
@endforeach

{{-- @forelse ~ @empty ~ @endforelse :
      루프를 할 데이터가 길이가 1 이상이면 @forelse의 처리,
      배열의 길이가 0이면 @empty의 처리를 말한다 --}}
@forelse ($data2 as $item)
    <div>
        {{ $item['name'] }}
    </div>
@empty
    <span>데이터 없음</span>
@endforelse