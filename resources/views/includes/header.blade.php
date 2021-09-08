<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Clinick Web</title>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body class="body">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Clinick Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            @auth

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="/create-patient">Create Patient</a>
                        </li>
                    </ul>
                <form class="form-inline my-2 my-lg-0" action="/search" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required minlength="3">
                    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
                </form>
                <a href="/logout" class="btn btn-danger my-2 my-sm-0 ml-3">Logout</a>
            @endauth
            </div>
          </nav>
          <div class="container-fluid">

