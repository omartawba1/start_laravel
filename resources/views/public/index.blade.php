@extends('layouts.public')

@section('content')
    <section id="latest">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Latest Articles</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                @foreach($articles as $single)
                    <div class="col-sm-4 latest-item">
                        <a href="{{ route('public.show', $single) }}" class="portfolio-link">
                            {{ $single->title }}
                        </a>
                        <p>{{ substr($single->text, 0, 200). '...' }}</p>
                        <a href="{{ route('public.show', $single) }}" class="btn btn-success">Read more...</a>
                    </div>
                @endforeach
            </div>
            <div class="pull-right">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
@endsection
