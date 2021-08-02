@extends('layouts.admin')
@section('content')
    <ul>
        @foreach($categories as $category)
            <li>{{ $category['id'] }}. {{ $category['title'] }} - {{ $category['count'] }}</li>
        @endforeach
    </ul>
@endsection
