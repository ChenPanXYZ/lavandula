@extends('layouts.app')

@section('head')
    @yield('head', View::make('guestbook-components/head', ["languageCode" => $languageCode, "languageUrls" => $languageUrls]))

@section('header')
    @yield('header', View::make('header', ["domain" => $domain, "languageUrls" => $languageUrls]))
@endsection


@section('sections')
    @yield('guestbook', View::make('guestbook-components/guestbook', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber]))
@endsection


@section('footer')
    @yield('footer', View::make('footer', ["visitorNumber" => $visitorNumber]))
@endsection

<script src="//instant.page/3.0.0" type="module" defer integrity="sha384-OeDn4XE77tdHo8pGtE1apMPmAipjoxUQ++eeJa6EtJCfHlvijigWiJpD7VDPWXV1"></script>