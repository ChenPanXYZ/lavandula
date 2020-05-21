@extends('layouts.app')

@section('head')
    @yield('head', View::make('homepage-components/head', ["languageCode" => $languageCode, "languageUrls" => $languageUrls]))

@section('header')
    @yield('header', View::make('header', ["domain" => $domain, "languageUrls" => $languageUrls]))
@endsection


@section('sections')
    @yield('iampan', View::make('homepage-components/iampan'))
    @yield('projects', View::make('homepage-components/projects', ["resume" => $resume]))
    @yield('myStory', View::make('homepage-components/myStory'))
    @yield('map', View::make('homepage-components/map'))
    @yield('guestbook', View::make('homepage-components/guestbook', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber]))
@endsection


@section('footer')
    @yield('footer', View::make('footer', ["visitorNumber" => $visitorNumber]))
@endsection