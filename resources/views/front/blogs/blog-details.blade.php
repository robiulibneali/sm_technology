@extends('front.master')

@section('title', 'Blog Details')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area item-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Blog Details</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a>
                            </li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Blog Details Section -->
    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{ asset(!empty($blog->main_image) ? $blog->main_image : 'front/assets/img/blog-details/1.jpg') }}" alt="image" style="height: 450px">
                        </div>
                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li> <span>Posted On:</span>  <a href="#">{{ $blog->created_at->format('M d - Y') }}</a></li>
                                    <li> <span>Posted By:</span>  <a href="#">{{ $blog->authorName->name ?? '' }}</a></li>
                                </ul>
                            </div>
                            <h3>{{ $blog->title ?? '' }}</h3>
                            <p>{!! $blog->long_description !!}</p>
                            <p>{!! $blog->short_description !!}</p>
                        </div>
                        <div class="article-footer">
                            <div class="article-tags"> <span>Tag:</span>
                                <a href="#">Solutions</a>
                                <a href="#">Guide</a>
                            </div>
                            <div class="article-share">
                                <ul class="social">
                                    <li><span>Share:</span></li>
                                    <li><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"> <i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"> <i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-navigation">
                            <div class="navigation-links">
                                <div class="nav-previous">
                                    <a href="#"><i class="fa fa-arrow-left"></i> Prev Post</a>
                                </div>
                                <div class="nav-next">
                                    <a href="#">Next Post <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <h3 class="comments-title">3 Comments:</h3>
                            <ol class="comment-list">
                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="{{ asset('/') }}front/assets/img/client/1.jpg" class="avatar" alt="image"> <b class="fn">Wilson Swanson</b>
                                                <span class="says">says:</span>
                                            </div>
                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <span>June 15 - 2023 12:30 PM</span>
                                                </a>
                                            </div>
                                        </footer>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
                                        </div>
                                        <div class="reply"> <a href="#" class="comment-reply-link">Reply</a>
                                        </div>
                                    </article>
                                    <ol class="children">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <footer class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <img src="{{ asset('/') }}front/assets/img/client/2.jpg" class="avatar" alt="image"> <b class="fn">Ella Hodges</b>
                                                        <span class="says">says:</span>
                                                    </div>
                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <span>June 15 - 2023 12:30 PM</span>
                                                        </a>
                                                    </div>
                                                </footer>
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                                <div class="reply"> <a href="#" class="comment-reply-link">Reply</a>
                                                </div>
                                            </article>
                                        </li>
                                    </ol>
                                </li>
                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="{{ asset('/') }}front/assets/img/client/4.jpg" class="avatar" alt="image"> <b class="fn">Melissa Bryant</b>
                                                <span class="says">says:</span>
                                            </div>
                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <span>June 15 - 2023 12:30 PM</span>
                                                </a>
                                            </div>
                                        </footer>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
                                        </div>
                                        <div class="reply"><a href="#" class="comment-reply-link">Reply</a></div>
                                    </article>
                                </li>
                            </ol>
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Leave a Reply</h3>
                                <form class="comment-form">
                                    <p class="comment-notes"> <span id="email-notes">Your email address will not be published.</span>
                                        Required fields are marked <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <label>Comment</label>
                                        <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                    </p>
                                    <p class="comment-form-author">
                                        <label>Name <span class="required">*</span>
                                        </label>
                                        <input type="text" id="author" name="author" required="required">
                                    </p>
                                    <p class="comment-form-email">
                                        <label>Email <span class="required">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" required="required">
                                    </p>
                                    <p class="comment-form-url">
                                        <label>Website</label>
                                        <input type="url" id="url" name="url">
                                    </p>
                                    <p class="comment-form-cookies-consent">
                                        <input type="checkbox" value="yes" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent">
                                        <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="submit" value="Post Comment">
                                    </p>
                                </form>
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
                        @if($relatedBlogs->isNotEmpty())
                            <section class="widget widget_techvio_posts_thumb">
                                <h3 class="widget-title">Popular Posts</h3>
                                @foreach($relatedBlogs as $relatedBlog)
                                    <article class="item">
                                        <a href="#" class="thumb">
                                            <img src="{{ asset(!empty($relatedBlog->main_image) ? $relatedBlog->main_image : 'front/assets/img/blog/blog-1.jpg') }}" alt="image">
                                        </a>
                                        <div class="info">
                                            <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                            <h4 class="title usmall">
                                                <a href="#">{{ $relatedBlog->title ?? '' }}</a>
                                            </h4>
                                        </div>
                                    </article>
                                @endforeach
                            </section>
                        @endif
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
    <!-- End Blog Details Section -->
@endsection
