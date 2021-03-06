@extends('layouts.main')
@section('head')
		

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{url('/')}}/section/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{url('/')}}/section/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{url('/')}}/section/css/style.css"/>
@endsection
@section('content')

<div class="hero-area section" >
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/blog-post-background.jpg); height: 300px;"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li>How to Get Started in Photography</li>
						</ul>

						
						<?php 
							$posts= DB::select('SELECT * FROM posts ');

						 ?>
						 @foreach ($posts as $object)
						 	<?php 
						 		$id = $_GET['id'];
								if ($object->post_id == $id ) { ?>
								<h1 class="white-text">{{$object->title}}</h1>
							<?php
							} ?>
						    
						@endforeach
						<ul class="blog-post-meta">
							<li class="blog-meta-author">By : <a href="#">John Doe</a></li>
							<li>18 Oct, 2017</li>
							<li class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">

						<!-- blog post -->
						<div class="blog-post">
							@foreach ($posts as $object)
								<?php 
							 		$id = $_GET['id'];
									if ($object->post_id == $id ) { ?>
										<div class="container-fluid" >
											<p style="text-align: justify; text-indent: 5%;">{{$object->content_post}} </p>
										</div>
								<?php
							} ?>
							@endforeach
						</div>
						<!-- /blog post -->

						<!-- blog share -->
						<div class="blog-share">
							<h4>Share This Post:</h4>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
						</div>
						<!-- /blog share -->

						<!-- blog comments -->
						<div class="blog-comments">
							<h3>5 Comments</h3>
							<!-- /single comment -->

							<!-- single comment -->

							<?php 
								$comment= DB::select('SELECT * FROM comment');
								$name_comment= DB::select('SELECT * FROM users');

						 	?>
       						@foreach($comment as $data )
       							@foreach($name_comment as $name_comment_data)
       							<?php 
							 		$id = $_GET['id'];
									if ($data->post_id == $id) {
										if ($name_comment_data->users_id == $data->user_id) {
									 ?>
										<div class="media">
											<div class="media-left">
												<img src="./img/avatar.png" alt="">
											</div>
											<div class="media-body">
										 		
													<h4 class="media-heading">{{$name_comment_data->username}}</h4>
													<p>{{$data->content_comment}}</p>
													<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#" class="reply">Reply</a></div>
												
											</div>
										</div>
							<!-- /single comment -->
								<?php } 

							}?>
								@endforeach
							@endforeach
							<!-- blog reply form -->

							
							<div class="blog-reply-form">
								<h3>Leave Comment</h3>
								<form>
									<input class="input name-input" type="text" name="name" placeholder="Name">
									<input class="input email-input" type="email" name="email" placeholder="Email">
									<textarea class="input" name="message" placeholder="Enter your Message"></textarea>
									<button class="main-button icon-button">Submit</button>
								</form>
							</div>
							<!-- /blog reply form -->

						</div>
						<!-- /blog comments -->
					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- search widget -->
						<div class="widget search-widget">
							<form>
								<input class="input" type="text" name="search">
								<button><i class="fa fa-search"></i></button>
							</form>
						</div>
						<!-- /search widget -->

						<!-- category widget -->
						<div class="widget category-widget">
							<h3>Categories</h3>
							<a class="category" href="#">Web <span>12</span></a>
							<a class="category" href="#">Css <span>5</span></a>
							<a class="category" href="#">Wordpress <span>24</span></a>
							<a class="category" href="#">Html <span>78</span></a>
							<a class="category" href="#">Business <span>36</span></a>
						</div>
						<!-- /category widget -->

						<!-- posts widget -->
						<div class="widget posts-widget">
							<h3>Recents Posts</h3>

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="./img/post01.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro eu error molestie deserunt.</a>
								<p><small>By : John Doe .18 Oct, 2017</small></p>
							</div>
							<!-- /single posts -->

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="./img/post02.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro eu error molestie deserunt.</a>
								<p><small>By : John Doe .18 Oct, 2017</small></p>
							</div>
							<!-- /single posts -->

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="./img/post03.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro eu error molestie deserunt.</a>
								<p><small>By : John Doe .18 Oct, 2017</small></p>
							</div>
							<!-- /single posts -->

						</div>
						<!-- /posts widget -->

						<!-- tags widget -->
						<div class="widget tags-widget">
							<h3>Tags</h3>
							<a class="tag" href="#">Web</a>
							<a class="tag" href="#">Photography</a>
							<a class="tag" href="#">Css</a>
							<a class="tag" href="#">Responsive</a>
							<a class="tag" href="#">Wordpress</a>
							<a class="tag" href="#">Html</a>
							<a class="tag" href="#">Website</a>
							<a class="tag" href="#">Business</a>
						</div>
						<!-- /tags widget -->

					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->

</div>
@endsection

@section('java')
	<script type="text/javascript" src="{{url('/')}}/section/js/main.js"></script>
@endsection