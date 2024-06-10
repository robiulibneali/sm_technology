@extends('front.master')

@section('title', 'Blogs')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Blogs</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            @if($blogCategory)
                                <li><span class="current">{{ $blogCategory->name }}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start testing Blog Section -->
    <section class="blog-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-6 col-md-6">
                            <div class="blog-single-item">
                                <div class="blog-image">
                                    <a href="{{ route('front.blog-details', ['blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title)]) }}">
                                        <img src="{{ asset(!empty($blog->main_image) ? $blog->main_image : 'front/assets/img/blog/blog-1.jpg') }}" alt="image" style="height: 288px">
                                    </a>
                                </div>
                                <div class="blog-description">
                                    <ul class="blog-info">
                                        <li>
                                            <a href="#"><i class="bi bi-person-circle"></i>{{ $blog->authorName->name }}</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="bi bi-calendar-check"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h3>
                                            <a href="{{ route('front.blog-details', ['blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title)]) }}">
                                                {{ $blog->title ?? '' }}
                                            </a>
                                        </h3>
                                        <p>{!! substr($blog->short_description, 0, 200) !!}...</p>
                                        <div class="blog-btn">
                                            <a href="{{ route('front.blog-details', ['blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title)]) }}" class="read-more"><i class="bi bi-arrow-right-short"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <a href="#" class="prev page-numbers"><i class="fas fa-angle-left"></i></a>
                                <a href="#" class="page-numbers">1</a>
                                <span class="page-numbers current" aria-current="page">2</span>
                                <a href="#" class="page-numbers">3</a>
                                <a href="#" class="page-numbers">4</a>
                                <a href="#" class="next page-numbers"><i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget_search">
                            <form class="search-form search-top">
                                <label>
                                    <input type="search" class="search-field" placeholder="Search...">
                                </label>
                                <button type="submit"> <i class="fas fa-search"></i></button>
                            </form>
                        </section>
                        <section class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                @foreach($blogCategories as $blogCategory)
                                    @if($blogCategory->blogs_count > 0)
                                        <li><a href="{{ route('front.blogs', ['blog_category_id' => $blogCategory->id]) }}">{{ $blogCategory->name ?? '' }} <span class="categories-link-count"> ({{ $blogCategory->blogs_count }})</span></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </section>
                        <section class="widget widget_tag_cloud">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <a href="#">Web Design</a>
                                <a href="#">Responsive</a>
                                <a href="#">Applications</a>
                                <a href="#">Solutions</a>
                                <a href="#">Industry</a>
                                <a href="#">Marketing</a>
                                <a href="#">Development</a>
                                <a href="#">Startup</a>
                                <a href="#">Graphic Design</a>
                                <a href="#">SEO</a>
                                <a href="#">Data Security</a>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>

        </div>
    </section>
    <!-- End Blog Section -->
@endsection
