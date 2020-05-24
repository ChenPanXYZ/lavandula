@extends('layouts.app')

@section('head')
    @yield('head', View::make('homepage-components/head', ["languageCode" => $languageCode, "languageUrls" => $languageUrls]))

@section('header')
    @yield('header', View::make('shared-components/header', ["domain" => $domain, "languageUrls" => $languageUrls]))
@endsection


@section('sections')
    @yield('iampan', View::make('homepage-components/iampan'))
    @yield('projects', View::make('homepage-components/projects', ["resume" => $resume]))
    @yield('myStory', View::make('homepage-components/myStory'))
    @yield('map', View::make('homepage-components/map'))
    @yield('guestbook', View::make('shared-components/guestbook', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "comments" => $comments, "commentsNumber" => $commentsNumber]))
@endsection


@section('footer')
    @yield('footer', View::make('shared-components/footer', ["visitorNumber" => $visitorNumber]))
@endsection