    <!-- Comment Section -->
    <section class="comment-area">
        <div class="box-comments">
            <div id="respond" class="comment-respond">
                <h3 class="comment-reply-title">Write Comment</h3>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                    <p class="comment-notes">
                        <span id="email-notes">
                            Your email address will not be published. 
                            <span class="required-field-message">Required fields are marked *</span>
                        </span>
                    </p>
                    <p class="comment-form-comment">
                        <textarea name="comment" id="comment" placeholder="Comment" cols="45" rows="8" aria-required="true"></textarea>
                    </p>
                    <p class="comment-form-author">
                        <input type="text" name="name" id="author" placeholder="Name" value="" aria-required="true">
                    </p>
                    <p class="comment-form-email">
                        <input type="email" name="email" id="email" placeholder="Email" value="" aria-required="true">
                    </p>
                    <p class="comment-form-url">
                        <input id="url" name="url" type="text" placeholder="Website" value="" size="30">
                    </p>
                    <p class="comment-form-cookies">
                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                        <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                    </p>
                    <p class="form-submit">
                        <input name="submit" type="submit" id="submit" class="btn btn-theme text-regular text-uppercase" value="Post Comment">
                    </p>
                    @if(session('success'))
                        <p class="success-message">{{ session('success') }}</p>
                    @endif

                    @if($errors->any())
                        <ul class="error-messages">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Sidebar -->
<div class="sidebar blog-right col-lg-4 col-md-5 hidden-sm hidden-xs">
    <aside id="secondary" class="sidebar">
        <form action="{{ route('blog.search') }}" method="GET" class="search-form">
            <fieldset class="search-form-group">
                <input type="text" class="search-form-text" placeholder="New Search" name="query" id="query">
                <button type="submit" class="search-form-button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </fieldset>
        </form>
    </aside>
    
    <!-- Recent Posts -->
    <aside id="recent-post-2">
        <h3 class="widget-title">Post Terkini</h3>
        <ul>
            @foreach ($posts as $recentPost)
                <li>
                    <a href="{{ route('berita.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
    
    <!-- Categories -->
    <aside id="categories-2">
        <h3 class="widget-title">Kategori</h3>
        <ul>
        </ul>
    </aside>
</div>
