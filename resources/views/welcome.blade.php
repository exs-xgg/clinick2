@extends('includes.template')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Recently Visited</div>
        <div class="card-body">
            @foreach ($recent ?? '' as $r)

                <a href="#">{{ $r->lname . ' ' . $r->fname . ( $r->mname ? ' ' . $mname : '')  }}</a>(<span>12-21-2021 9:43 AM, 12 hours ago</span>)

            @endforeach
        </div>
    </div>
</div>


@stop
