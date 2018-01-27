{{-- Home and About Us --}}
@if (isset($pages) && is_object($pages))
    @foreach ($pages as $index => $page)
        @if ($index % 2 == 0) {{-- even sections --}}

            <section id="home" class="top_cont_outer">
                <div class="hero_wrapper">
                    <div class="container">
                        <div class="hero_section">
                            <div class="row">
                                <div class="col-lg-5 col-sm-7">
                                    <div class="top_left_cont zoomIn wow animated">
                                        {{-- We use html tags from database here --}}
                                        {!! $page->content !!}
                                        <a href="{{ route('page', array('alias'=>$page->alias)) }}" class="read_more2">Read more</a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-5">
                                    {!! Html::image('assets/img/'.$page->images, $page->name, array('class'=>'zoomIn wow animated')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @else {{-- odd sections --}}

            <section id="aboutUs">
                <div class="inner_wrapper">
                    <div class="container">
                        <h2>{{ $page->name }}</h2>
                        <div class="inner_section">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                                    {!! Html::image('assets/img/'.$page->images, $page->name, array('class'=>'img-circle delay-03s animated wow zoomIn')) !!}
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                    <div class="delay-01s animated fadeInDown wow animated">
                                        {!! $page->content !!}
                                    </div>
                                    <div class="work_bottom">
                                        <span>Want to know more..</span>
                                        <a href="{{ route('page', array('alias'=>$page->alias)) }}" class="contact_btn">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endif

{{-- Services --}}
@if(isset($services) && is_object($services))
<section id="service">
    <div class="container">
        <h2>Services</h2>
        <div class="service_wrapper">

            @foreach($services as $index => $service)

                @if($index == 0 || $index % 3 == 0)
                    <div class="row {{ ($index != 0) ? 'borderTop' : '' }}">
                @endif
                        <div class="col-lg-4 {{ ($index % 3 > 0) ? 'borderLeft' : '' }} {{ ($index > 2) ? 'mrgTop' : '' }}">
                            <div class="service_block">
                                <div class="service_icon delay-03s animated wow zoomIn">
                                    <span><i class="fa {{ $service->icon }}"></i></span>
                                </div>
                                <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
                                <p class="animated fadeInDown wow">{{ $service->content }}</p>
                            </div>
                        </div>
                @if(($index + 1) % 3 == 0)
                    </div>
                @endif

            @endforeach

        </div>
    </div>
</section>
@endif

{{-- Portfolio --}}
@if(isset($portfolio) && is_object($portfolio))
<section id="Portfolio" class="content">
    <div class="container portfolio_title">
        <div class="section-title">
            <h2>Portfolio</h2>
        </div>
    </div>
    <div class="portfolio-top"></div>
    <!-- Portfolio Filters -->
    <div class="portfolio">

        @if (isset($tags))
        <div id="filters" class="sixteen columns">
            <ul class="clearfix">
                {{-- Leaving this out from foreach loop in order to reset all filters --}}
                <li><a id="all" href="#" data-filter="*" class="active"><h5>All</h5></a></li>

            @foreach($tags as $tag)
                <li><a class="" href="#" data-filter=".{{ $tag }}"><h5>{{ $tag }}</h5></a></li>
            @endforeach

            </ul>
        </div>
        @endif

        <!-- Portfolio Wrapper -->
        <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">

        @foreach ($portfolio as $portfolio_item)
            <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four {{ $portfolio_item->filter }} isotope-item">
                <div class="portfolio_img">
                    {!! Html::image('assets/img/'.$portfolio_item->images, $portfolio_item->name) !!}
                </div>
                <div class="item_overlay">
                    <div class="item_info">
                        <h4 class="project_name">{{ $portfolio_item->name }}</h4>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
        <!--/Portfolio Wrapper -->
    </div>
    <!--/Portfolio Filters -->

    <div class="portfolio_btm"></div>

    <div id="project_container">
        <div class="clear"></div>
        <div id="project_data"></div>
    </div>
</section>
@endif

{{-- Clients --}}
<section class="page_section" id="clients">
    <h2>Clients</h2>
    <div class="client_logos">
        <div class="container">
            <ul class="fadeInRight animated wow">
                <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo1.png') }}" alt=""></a></li>
                <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo2.png') }}" alt=""></a></li>
                <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo3.png') }}" alt=""></a></li>
                <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo4.png') }}" alt=""></a></li>
            </ul>
        </div>
    </div>
</section>

{{-- Team --}}
@if(isset($team) && is_object($team))
<section class="page_section team" id="team">
    <div class="container">
        <h2>Team</h2>
        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
        <div class="team_section clearfix">

            @foreach($team as $index => $team_member)

                <div class="team_area">
                    <div class="team_box wow fadeInDown delay-0{{ ($index % 3) + 3 }}s"> {{-- delay will be 03s, 06s, 09s and so on --}}
                        <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                        {!! Html::image('assets/img/'.$team_member->images, $team_member->name) !!}
                        <ul>
                            <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                            <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                            <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                            <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                    <h3 class="wow fadeInDown delay-0{{ ($index % 3) + 3 }}s">{{ $team_member->name }}</h3>
                    <span class="wow fadeInDown delay-0{{ ($index % 3) + 3 }}s">{{ $team_member->position }}</span>
                    <p class="wow fadeInDown delay-0{{ ($index % 3) + 3 }}s">{{ $team_member->content }}</p>
                </div>

            @endforeach

        </div>
    </div>
</section>
@endif

{{-- Contact footer --}}
<footer class="footer_wrapper" id="contact">
    <div class="container">
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>Contact Us</h2>
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>UNIQUE Info</h4>
                            <p>104, Some street, London, UK</p>
                        </div>
                        <div class="detail">
                            <h4>call us</h4>
                            <p>+1 234 567890</p>
                        </div>
                        <div class="detail">
                            <h4>Email us</h4>
                            <p>support@sitename.com</p>
                        </div>
                    </div>

                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                        <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                        <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                        <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">
                        <input class="input-text" type="text" name="" value="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                        <input class="input-text" type="text" name="" value="Your E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                        <textarea class="input-text text-area" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">Your Message *</textarea>
                        <input class="input-btn" type="submit" value="send message">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="footer_bottom"><span>Copyright &copy; 2018, Built with Laravel by <a href="http://islamdudaev.ru" target="_blank">Islam Dudaev</a>. </span></div>
    </div>
</footer>