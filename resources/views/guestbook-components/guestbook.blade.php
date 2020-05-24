@extends('layouts.app')

@section('head')
    @yield('head', View::make('guestbook-components/head', ["languageCode" => $languageCode, "languageUrls" => $languageUrls]))

@section('header')
    @yield('header', View::make('shared-components/header', ["domain" => $domain, "languageUrls" => $languageUrls]))
@endsection


@section('sections')
    @yield('guestbook', View::make('shared-components/guestbook', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "comments" => $comments, "commentsNumber" => $commentsNumber]))
@endsection


@section('footer')
    @yield('footer', View::make('shared-components/footer', ["visitorNumber" => $visitorNumber]))
@endsection