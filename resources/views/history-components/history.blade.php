@extends('layouts.app')

@section('head')
    @yield('head', View::make('history-components/head', ["languageCode" => $languageCode, "languageUrls" => $languageUrls]))

@section('header')
    @yield('header', View::make('shared-components/header', ["domain" => $domain, "languageUrls" => $languageUrls]))
@endsection


@section('sections')
    @yield('info', View::make('history-components/info', ["languageCode" => $languageCode]))
@endsection


@section('footer')
    @yield('footer', View::make('shared-components/footer', ["visitorNumber" => $visitorNumber]))
@endsection