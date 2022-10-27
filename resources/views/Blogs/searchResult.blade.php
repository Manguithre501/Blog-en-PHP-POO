@extends('guest')
@section('content')

<section id="page-title" class="bg-color py-6 page-title-center text-center">
    <div class="container">
        <h2 class="h1 mb-3">Search Results For '<strong><u>Navigation</u></strong>'</h2>
        <div class="clear"></div>
        <div class="input-group input-group-lg mt-2 mb-4 mw-sm mx-auto my-4">
            <input class="form-control rounded-start border-0 fw-semibold" type="search"
                placeholder="Search Your Topics.." aria-label="Search" value="Navigation">
            <button class="btn border-0 bg-white rounded-end h-bg-alt" type="submit"><i
                    class="icon-line-search"></i></button>
        </div>
        <div>
            <a href="demo-forum-single.html"
                class="button button-large bg-alt py-2 rounded-1 fw-medium nott ls0 ms-0">Browse All Topics</a>
            <a href="#" class="button button-large bg-alt py-2 rounded-1 fw-medium nott ls0 ms-0 ms-sm-1">Create A New
                Topic</a>
        </div>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container mw-md">

            <div class="mw-md mx-auto">
                <ul class="list-unstyled mb-4">
                    <li>
                        <ul
                            class="topic list-unstyled row mx-0 justify-content-between align-items-center border-top-0">
                            <li class="entry mb-0 col-12">
                                <h3 class="mb-0"><a href="#">Package Generator – Approx time for a file</a></h3>
                                <div class="entry-meta mt-1">
                                    <ul>
                                        <li><a href="#">40 mins ago</a></li>
                                        <li><a href="#">4 Replies</a></li>
                                        <li><a href="#" class="badge bg-success text-white">Solved</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <ul class="topic odd list-unstyled row mx-0 justify-content-between align-items-center">
                            <li class="entry mb-0 col-12">
                                <h3 class="mb-0"><a href="#">Open sub-menu touching menu-item name, instead of
                                        sub-menu-trigger only (mobile)</a></h3>
                                <div class="entry-meta mt-1">
                                    <ul>
                                        <li><a href="#">3 days ago</a></li>
                                        <li><a href="#">1 Replies</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <ul class="topic list-unstyled row mx-0 justify-content-between align-items-center">
                            <li class="entry mb-0 col-12">
                                <h3 class="mb-0"><a href="#">Portfolio Overlay Slide fadein fadeout</a></h3>
                                <div class="entry-meta mt-1">
                                    <ul>
                                        <li><a href="#">7 days ago</a></li>
                                        <li><a href="#">21 Replies</a></li>
                                        <li><a href="#" class="badge bg-success text-white">Solved</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="pagination justify-content-end">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <span class="op-05" aria-hidden="true">&laquo;</span></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
            </div>

        </div>

    </div>
</section>

@endsection