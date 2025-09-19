@extends('frontend::layout.home', ['class' => 'homepage-9 hp-6 homepage-1 mh'])

@section('content')

        @include('frontend::home.hero')
        

        @include('frontend::home.featured', ['featuredProperties' => $featuredProperties])

        @include('frontend::home.choose-us')

        @include('frontend::home.agents', ['agents' => $agents])

@endsection
