
@include('header')
@section('content') 


        <section class="header">
            <div class="header_inner">
                <div class="box-content">
                    <h1 class="catamaran">Body, mind, and soul: explore your limits with martial arts training camps</h1>
                    <h2>
                        <a href="#start-discovering" class="js-scroll-to">
                        Find and compare martial arts training camps and holidays from 125 organizers worldwide!
                        </a>
                    </h2>


                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                      </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="middle py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <label class="title1">Styles</label>
                        <ul class=" filter-list checklist">
                              @foreach($styles as $style)
                            <li><a href="">{{$style->title}}</a></li>
                               @endforeach
                        </ul>
                     
                        <label class="title1">Destinations</label>

                        <ul class="filter-list">
                               @foreach($destination_parent as $destination_pr)
                            <li>
                                <a data-toggle="collapse" href="#collapseExample{{$destination_pr->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$destination_pr->id}}"  class="collapsed">
                                  {{$destination_pr->title}}
                                </a>
                                <ul class="collapse filter-list-inner" id="collapseExample{{$destination_pr->id}}">
                                    @php 
                                   $destination_child= App\Destination::select('title')->where('parent', $destination_pr->id)->get();
                                   @endphp
                                      @foreach($destination_child as $destination_ch)
                                    <li class="select"><a href="">{{$destination_ch->title}}</a></li>
                                   @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <label class="title1">Duration</label>
                          <ul class="filter-list checklist">  
                             <li><a href="">2 days ({{$count1}})</a></li>
                            <li><a href="">From 3 to 7 days ({{$count2}})</a></li> 
                            <li><a href="">From 1 to 2 weeks ({{$count3}})</a></li> 
                            <li><a href="">More than 2 weeks ({{$count4}})</a></li>
                       
                                 </ul>

                        <label class="title1">Arrival date</label>
                        <ul class="filter-list">
                            <li class="select"><a href="">July (4)</a></li>
                            <li class="select"><a href="">August (117)</a></li>
                            <li class="select"><a href="">September (159)</a></li>
                            <li class="select"><a href="">October (238)</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">

                        <div class="mb-2 tags">
                            <label class="title1">Why not give these a try...</label>

                            <a href="" class="btn btn-first rounded-25 mr-2">Kung Fu</a>
                            <a href="" class="btn btn-first rounded-25 mr-2">Kung Fu</a>
                            <a href="" class="btn btn-first rounded-25 mr-2">Kung Fu</a>
                            <a href="" class="btn btn-first rounded-25 mr-2">Kung Fu</a>
                            <a href="" class="btn btn-first rounded-25"><i class="fa fa-refresh"></i></a>
                        </div>



                        <div class="dropdown mb-2">
                            <a href="" class="title1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</a>

                         
                          <div class="dropdown-menu filter" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item" href="">Recommended</a>
                            <a class="dropdown-item" href="">Popularity</a>
                            <a class="dropdown-item" href="">Duration short to long</a>
                            <a class="dropdown-item" href="">Duration long to short</a>
                            <a class="dropdown-item" href="">Price low to high</a>
                            <a class="dropdown-item" href="">Price high to low</a>
                            <a class="dropdown-item" href="">Price per day low to high</a>
                            <span class="dropdown-item selected" data-id="price_per_day_desc">Price per day high to low</span>
                            <a class="dropdown-item" href="">Review score</a>

                          </div>
                        </div>

                        @foreach($trainings as $training)
                        <div class="card mb-4">
                            <div class="card-body pl-md-0 pt-md-0 pb-md-0">
                                <div class="row">
                                    <div class="col-md-5 img-wrapper">
                               <?php $training_image=App\Gallery::where('training_id',$training->id)->first(); ?>


                                        <img src="{{ url('images/gallery') }}/{{$training_image->title}}" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 py-3 pl-md-0 pr-md-0 position-relative">
                                        <a href="{{ url('/training_detail/'.$training->id)}}" class="title2">{{ $training->title}}</a><br>
                                        <div class="showcard-features">
                                         @foreach(App\Facility::skip(0)->take(3)->get() as $facility)
                                         @php
                                        $training_faci=App\Training::where('id',$training->id)->first();
                                        $string_facility = $training_faci->facilities;
                                        $str_arr_facility = explode(",",$string_facility);
                                        $checked=(in_array($facility->id, $str_arr_facility)?'checked ="checked"':'');
                                        @endphp
                                       
                                            @php 
                                            if(in_array($facility->id, $str_arr_facility)){ @endphp
                                               <div>
                                               <img src="{{url('/images/icon')}}/{{$facility->title}}" width="25" height="25" /> <div>{{$facility->icon_class}} </div>
                                               </div>  
                                           @php } @endphp
                                       
                                        @endforeach
                                         </div>
                                      </div>
                                    <div class="col-md-3 py-3 hr-l">

                                        <div class="rating-star">
                                            <div class="star-visuals">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <a class="js-showcard-link" href="#reviews" target="_blank">
                                            · 1
                                            </a>
                                        </div>

                                        <div class="package-price my-3">
                                            <span class="small">From</span>
                                            <span class="large">₹ {{$training->price}}</span>
                                            <span>per day</span>
                                        </div>

                                        <div class="package-info">
                                            <span class="price-for">Price for: </span>
                                            <div class="showcard__duration__factors"><p>
                                                <i class="fa fa-user-o"></i>
                                                1 person
                                                </p><p class="duration">
                                                <i class="fa fa-calendar"></i>
                                                8 days / 7 nights
                                                </p>
                                            </div>
                                            <a href="{{ url('/training_detail/'.$training->id)}}" class="btn btn-first btn-block mt-2">See Details</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    <!-- Item Repeat -->

                   <?php echo $trainings->render(); ?>
                   
                    

                    </div>
                </div>
            </div>
        </section>



<section class="sub-footer py-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 form-row">
                <svg xmlns="http://www.w3.org/2000/svg" height=140 width=93 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 93 132"><defs><path d="M0 18.87l14.5-13.1 12.74 12.58 5.8-5.87 12.6 12.35H66V0H0z" id=a></path></defs><g fill-rule=evenodd fill=none><path opacity=.2 d="M1.97 92.52a45.4 45.4 0 0 1-.08-19.96c6.3-30.16 39.57-46.5 63.65-39.36.59.18 1.17.37 1.74.57 11.04 3.93 19.79 12.94 23.24 25.58 4.12 15.1.61 32.74-7.78 46.1-11.61 18.48-28.67 30.5-47.03 24.74-13.85-4.34-29.93-21.66-33.74-37.67z" fill="#02A5E8"></path><path stroke-width=4 d="M14.45 60.15V2h66v58.27l3.53 2.93a6 6 0 0 1 4.47 5.8v46a6 6 0 0 1-6 6h-70a6 6 0 0 1-6-6V69a6 6 0 0 1 4.17-5.72l3.83-3.13z" stroke="#53585C"></path><path stroke-width=4 d="M14.45 2h66v71l-33 29.63-33-29.63zm0 34.5h66m-59 8H73.4m-51.95 8H63.4" stroke="#53585C"></path><path stroke-width=4 d="M23.45 62h7v7h-7zm12 0H73.4m-37.95 8h11m3 0H73.4m-37.95 8h20m-16 8h17m2-8h6" stroke="#53585C"></path><path stroke-width=4 stroke-linecap=round d="M14.79 72.89l32.55 29.74 32.79-29.74" stroke="#53585C"></path><path stroke-width=4 stroke-linecap=round d="M14.79 108.74l19.6-17.91 12.95 11.8 13.16-11.7 19.63 17.81" stroke="#53585C"></path><path stroke-width=4 d="M14.45 22.87l14.5-13.1 12.74 12.58 5.8-5.87 12.59 12.35h20.37" stroke="#53585C"></path><g transform="translate(14.45 4)"><mask id=b fill="#fff"><use xlink:href="#a"></use></mask><circle stroke-width=4 mask="url(#b)" cy=12 cx=41 stroke="#53585C" r=8></circle></g></g></svg>

                <div class="info col">
                    <label class="title3">Still searching for that perfect trip?</label>
                    <label class="title4">Get weekly inspiration delivered right to your inbox!</label>
                </div>

            </div>
            <div class="col-md-6">
                <div class="footer-subscribe">
                    <form class="form-flexbox form-single-inline" id="footer-subscribe">
                        <label>Your email address</label>
                        <div class="form-row mb-2">
                            <div class="col-md-9 pr-3">
                                <input name="email" class="form-control" type="email" size="30" placeholder="name@example.com" data-source="footer">
                            </div>
                            <div class="col">
                                <input class="btn btn-primary" type="submit" value="Subscribe">
                            </div>
                        </div>
                    </form>
                    <p class="small">We respect your privacy. We will not publish or share your email address in any way.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')
