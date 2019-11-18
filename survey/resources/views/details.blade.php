@include('header')
@section('content') 
@php

                         $training=App\Training::where('id',$training_id)->first();
                         $string_instructor = $training->instructor_id;  
                         $str_arr_instructor = explode (",", $string_instructor);
                        
              @endphp 
<section class="gray-bg py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>

        <div class="item-header">
            <label class="title2">{{$training_detail->title}}</label>
            <p>@php
            if($training_detail->address_1!=null){
          echo $training_detail->address_1.',';
              }
               if($training_detail->address_2!=null){
           echo $training_detail->address_2.',';
              }
               if($training_detail->city_name!=null){
            echo $training_detail->city_name.',';
              }
               if($training_detail->state_name!=null){
            echo $training_detail->state_name.',';
              }
               if($training_detail->zip!=null){
            echo $training_detail->zip.',';
              }
               if($training_detail->country_name!=null){
            echo $training_detail->country_name;
              }
              @endphp
          </p>
        </div>

        <div class="row">
            <div class="col-md-8">
              

                    <div id="sliderThumb" class="carousel slide span12 mb-4" data-ride="carousel">


                    <div class="carousel-inner" role="listbox">
                        @foreach($images as $image)
                    <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{url('/images/gallery')}}/{{$image->title}}" >
                    </div>
                   @endforeach
                    <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{url('/images/gallery')}}/{{$image->first()->title}}" >
                    </div>      
                
                    </div>


                    <ol class="carousel-indicators">
                         @foreach($images as $image)
                    <li data-target="#sliderThumb" data-slide-to="3" ><img class="d-block img-fluid" src="{{url('/images/gallery')}}/{{$image->title}}"></li>
                    
                    @endforeach


                    </ol>


                    </div>

                <div class="block">
                    <label class="title-label">Introducing</label>
                    <label class="title5">{{$training_detail->overview_title}}</label>
                    <p>
                       {{$training_detail->overview_detail}}
                    </p>

                    <label class="title2 mb-3">Meet the instructors</label>
                    
                    <div class="instructors-list mb-3">

                        <div class="instructor">
                            @foreach(App\Instructor::take(3)->get() as $instructor)
                            <div class="instructor-portrait" style="background-image:url(/images/instructor_image/{{$instructor->image}})" alt=""></div>
                            @endforeach
                            <div class="plus-number">+2</div>
                            <div class="instructor-name">
                                 @foreach(App\Instructor::where('id',$training_id)->take(3)->get() as $instructor)
                                 <?php $checked=(in_array($instructor->id, $str_arr_instructor)?'checked ="checked"':'');?>
                                <strong>{{$instructor->name}}</strong>,
                                @endforeach
                                &amp; <span class="more-trailing">2 More…</span>
                                <br>
                                <a id="instructor-faces-read-more" href="#instructors">Read more</a>
                            </div>
                        </div>
                    </div>

                    <label class="title2  my-3">Highlights</label>

                    <ul>
                        <li>Pilates practice</li>
                        <li>Daily 3 yoga sessions </li>
                        <li>Daily guided meditation sessions </li>
                        <li>1 Thai massage (for private rooms only)</li>
                        <li>Access to the swimming pool and herbal steam sauna </li>
                        <li>3 nights accommodation </li>
                        <li>3 daily vegan meals</li>
                        <li>Evening events </li>
                    </ul>

                    <label class="title2  my-3">Skills</label>
                    <ul>
                        <li>Beginner</li>
                        <li>Intermediate</li>
                        <li>Advanced</li>
                    </ul>


                    <label class="title2  my-3">Yoga styles</label>
                    <ul>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/hatha-yoga" target="_blank">
                        Hatha
                        </a>
                        </li>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/kundalini-yoga" target="_blank">
                        Kundalini
                        </a>
                        </li>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/vinyasa-yoga" target="_blank">
                        Vinyasa
                        </a>
                        </li>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/yin-yoga" target="_blank">
                        Yin
                        </a>
                        </li>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/nidra-yoga" target="_blank">
                        Nidra
                        </a>
                        </li>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/therapeutic-yoga" target="_blank">
                        Therapeutic
                        </a>
                        </li>
                        <li>
                        <a onclick="gae('ip_hyperlinking','overview_styles');" href="/all/s/alignment-yoga" target="_blank">
                        Alignment
                        </a>
                        </li>
                    </ul>

                    <hr>

                    <div class="listing-overview__notes">
                        <div>
                            <i class="fa fa-calendar"></i>
                            3 days with instruction in&nbsp;<strong style="font-weight:600">English</strong>
                        </div>
                        <div>
                            <i class="fa fa-comment"></i>
                            Spoken languages:&nbsp;Thai, English
                        </div>
                        <div>
                            <i class="fa fa-users"></i>
                            The maximum participants in the group is 30
                        </div>
                    </div>

                </div>



                <div class="block">
                    <div id="accordion">
                        <div class="ac-header">
                          <a class="title5" data-toggle="collapse" href="#collapseOne">
                            <i class="fa fa-automobile"></i> Accommodation
                          </a>
                        </div>

                        <div id="collapseOne" class="collapse py-3 show" data-parent="#accordion">
                          
                          <div class="checkin-out--container"><div class="checkin-out--label">Check-in Time:</div><div class="checkin-out--time">14:00</div></div>
                          <div class="checkin-out--container"><div class="checkin-out--label">Check-out Time:</div><div class="checkin-out--time">14:00</div></div>

                          <label class="title0">Facilities</label>

                            <ul class="listing-overview__facilities__item facilities-list" data-showmore-text="Show all facilities (26)" data-showmore-items-limit="6" data-showless-text="Collapse">
                                <li class="facility"><i class="fa fa-comment" data-icon=""></i> Sauna</li>
                                <li class="facility"><i class="fa fa-grav" data-icon=""></i> Spa</li>
                                <li class="facility"><i class="fa fa-snowflake-o" data-icon=""></i> Steam room</li>
                                <li class="facility"><i class="fa fa-free-code-camp" data-icon=""></i> Swimming pool (outdoor)</li>
                               
                            </ul>

                            <div data-attr="text"><p>You will stay at Wonderland Healing Center's deluxe room or luxury dorm room. Wonderland Healing Center consists of 37 rooms, dorms, and private villas nestled among beautiful gardens with stunning mountain views, and is fully equipped to handle all of your dining and relaxation needs. The property maintains a private swimming pool, herbal steam sauna, two yoga halls, and massage and treatment areas.</p><p>The deluxe pool view rooms are spacious, with king size bed, outside seating area or balcony and they have a private bathroom. They face the swimming pool and has beautifully landscaped gardens to the front, and stunning jungle landscape to the rear. The luxury dorm rooms are the most comfortable and beautiful dorms in Koh Phangan with extra wide very comfortable single mattresses.</p><p>All rooms are equipped with air conditioning, optional colema boards, safe box, Wi-Fi, king size or two single beds with superior mattresses, personal care products, towels, and bed linen.</p></div>

                        </div>
                      </div>
                </div>

                <div class="block">
                    <div id="accordion1">
                        <div class="ac-header">
                          <a class="title5" data-toggle="collapse" href="#collapseTwo">
                            <i class="fa fa-calendar"></i> Program
                          </a>
                        </div>

                        <div id="collapseTwo" class="collapse py-3 show" data-parent="#accordion1">
                            <p>Wonderland's yoga schedule includes Hatha, Vinyasa and Yin styles along with Acro yoga and Therapeutic yoga. The classes are taught by experienced international teachers to assist you in establishing a daily routine of health and wellness or to deepen your existing yoga practice. For those wishing to reset their health with a detox program, the unparalleled tranquility of Wonderland provides you with the space to journey inward, renew and refresh your body, mind, and spirit. </p>

                            <label class="title2  my-3">List of classes (this can be changed from time to time)</label>
                            <ul>
                                <li>Therapeutic Vinyasa Yoga </li>
                                <li>Pilates </li>
                                <li>Vinyasa Flow Yoga </li>
                                <li>Dynamic Hatha Yoga </li>
                                <li>Ashtanga Yoga </li>
                                <li>Meditation </li>
                                <li>Acro Yoga </li>
                                <li>Laughter Yoga </li>
                                <li>Kundalini Yoga </li>
                                <li>Yin Yoga </li>
                                <li>Conscious Breathing </li>
                                <li>Hatha Alignment Yoga </li>
                                <li>Aerial Yoga </li>
                                <li>Chi kung </li>
                                <li>TRE -Trauma Release Exercise </li>
                                <li>Yoga Philosophy Lectures </li>
                                <li>Ayurveda lectures </li>
                                <li>Inner dance </li>
                                <li>Fire Gathering </li>
                                <li>Dance Therapy </li>
                                <li>Rebirthing sessions </li>
                                <li>Nutrition lectures </li>
                                <li>Kirtan gatherings </li>
                                <li>Shamanic Journeys </li>
                                <li>Sound healing </li>
                            </ul>

                            <label class="title2  my-3">Sample daily schedule</label>
                            <ul>
                                <li>07:30 Ashtanga yoga </li>
                                <li>09:00 Vegan breakfast buffet </li>
                                <li>10:00 Hatha / Vinyasa / Dynamic yoga or Qi Gong class, or free time for personal excursions to a local waterfall, and an abundance of beautiful local beaches </li>
                                <li>11:30 Guided meditation class </li>
                                <li>12:30 Vegan lunch buffet </li>
                                <li>13:00 Free time for personal excursions, massage treatments, and healing sessions </li>
                                <li>16:00 Hatha / Yin Yoga class </li>
                                <li>18:00 Kundalini Yoga </li>
                                <li>19:00 Vegan dinner buffet </li>
                                <li>20:30 Occasional evening activity (kirtan, song circle around the fire, movie night, etc depending on the season) </li>
                            </ul>


                            <p>Please note that this retreat can be tailored to the length of your stay. </p>
                        </div>
                    </div>
                </div>


                <div class="block">
                    <div id="accordion2">
                        <div class="ac-header">
                          <a class="title5" data-toggle="collapse" href="#collapsethree">
                            <i class="fa fa-bullhorn"></i> Instructors 
                          </a>
                        </div>

                        <div id="collapsethree" class="collapse py-3 show" data-parent="#accordion2">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ url('front/images/user.png') }}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-10">
                                    <label class="title2">Paula Huolman</label>
                                    <p>Originally from London, Ali Hazel has been studying mindfulness, metta, and Buddhist meditation since 2009, spending the last three years living and volunteering in intentional mindfulness communities throughout South East Asia. Ali's philosophy comes from a place of beginners mind, where one can explore for oneself the truth of who we really are. In teaching meditation and yoga, Ali joyously chose to follow the heart-summons of Rumi who wrote, 'Let the beauty of what you love be what you do.'</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ url('front/images/user.png') }}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-10">
                                    <label class="title2">Paula Huolman</label>
                                    <p>Originally from London, Ali Hazel has been studying mindfulness, metta, and Buddhist meditation since 2009, spending the last three years living and volunteering in intentional mindfulness communities throughout South East Asia. Ali's philosophy comes from a place of beginners mind, where one can explore for oneself the truth of who we really are. In teaching meditation and yoga, Ali joyously chose to follow the heart-summons of Rumi who wrote, 'Let the beauty of what you love be what you do.'</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ url('front/images/user.png') }}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-10">
                                    <label class="title2">Paula Huolman</label>
                                    <p>Originally from London, Ali Hazel has been studying mindfulness, metta, and Buddhist meditation since 2009, spending the last three years living and volunteering in intentional mindfulness communities throughout South East Asia. Ali's philosophy comes from a place of beginners mind, where one can explore for oneself the truth of who we really are. In teaching meditation and yoga, Ali joyously chose to follow the heart-summons of Rumi who wrote, 'Let the beauty of what you love be what you do.'</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ url('front/images/user.png') }}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-10">
                                    <label class="title2">Paula Huolman</label>
                                    <p>Originally from London, Ali Hazel has been studying mindfulness, metta, and Buddhist meditation since 2009, spending the last three years living and volunteering in intentional mindfulness communities throughout South East Asia. Ali's philosophy comes from a place of beginners mind, where one can explore for oneself the truth of who we really are. In teaching meditation and yoga, Ali joyously chose to follow the heart-summons of Rumi who wrote, 'Let the beauty of what you love be what you do.'</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ url('front/images/user.png') }}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-10">
                                    <label class="title2">Paula Huolman</label>
                                    <p>Originally from London, Ali Hazel has been studying mindfulness, metta, and Buddhist meditation since 2009, spending the last three years living and volunteering in intentional mindfulness communities throughout South East Asia. Ali's philosophy comes from a place of beginners mind, where one can explore for oneself the truth of who we really are. In teaching meditation and yoga, Ali joyously chose to follow the heart-summons of Rumi who wrote, 'Let the beauty of what you love be what you do.'</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ url('front/images/user.png') }}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-10">
                                    <label class="title2">Paula Huolman</label>
                                    <p>Originally from London, Ali Hazel has been studying mindfulness, metta, and Buddhist meditation since 2009, spending the last three years living and volunteering in intentional mindfulness communities throughout South East Asia. Ali's philosophy comes from a place of beginners mind, where one can explore for oneself the truth of who we really are. In teaching meditation and yoga, Ali joyously chose to follow the heart-summons of Rumi who wrote, 'Let the beauty of what you love be what you do.'</p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>


                <div class="block">
                    <div id="accordion3">
                        <div class="ac-header">
                          <a class="title5" data-toggle="collapse" href="#collapsefour">
                            <i class="fa fa-map-marker"></i> Retreat location 
                          </a>
                        </div>

                        <div id="collapsefour" class="collapse py-3 show" data-parent="#accordion3">
                            <p>Wonderland Healing Center is located in the heart of Ko Pha Ngan, an island paradise in the Gulf of Thailand. The resort, nestled in a lush tropical forest with stunning mountain views, is a 10-minute drive to several pristine beaches and local attractions. It is the perfect location to indulge in a wellness, yoga, and detox program. Wonderland boasts a beautiful outdoor pool, herbal steam sauna, juice bar, and a vegan restaurant.</p>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152260.66967505787!2d-1.639538402907965!3d53.39563467890515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48790aa9fae8be15%3A0x3e2827f5af06b078!2sSheffield%2C+UK!5e0!3m2!1sen!2sin!4v1563281587868!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <a href="" class="btn btn-second mb-3"><i class="fa fa-paper-plane-o"></i> Share this page</a>


                <div class="block ratings">

                    <div class="all-rating">

                        <span>
                            <div class="star-visuals">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                            </div>
                        </span>

                        <a href="#reviews">369 reviews</a>

                    </div>

                    <hr>

                    <div class="ratings__scores"><div>
                    <span>Value for money</span>
                    <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    </div></div><div>
                    <span>Accommodation &amp; facilities</span>
                    <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    </div></div><div>
                    <span>Food</span>
                    <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    </div></div><div>
                    <span>Location</span>
                    <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    </div></div><div>
                    <span>Quality of activity</span>
                    <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    </div></div><div>
                    <span>Overall impression</span>
                    <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    </div></div></div>
                    <a class="ratings__review-quote" id="ratings__review-quote" onclick="$('html,body').animate({scrollTop: $('#reviews').offset().top});">


                        <div class="review-quote-pre"></div>


                        <div class="review-quote-text mb-3">Wow... this yoga retreat is a hidden gem and an amazing value. I loved the classes, the meditation (with Aly!), and especially the food. Also,...</div>


                        <div class="review-quote-author">Rachel Jordan</div>
                        <div class="review-quote-date">July 15, 2019, United States</div>
                    </a>
                    </div>

                    <div class="block">
                        <div class="listing-price-wrapper">
                            <div class="title6">
                                4 days / 3 nights
                            </div>
                            <span class="price-wrapper">
                                <span class="from">from</span> <span class="title7">US$194</span>
                            </span>
                            <span class="title1">Availability</span>
                            <p>This vacation is available all year round, please select an arrival date below.</p>


                            <span class="title1">Low season</span>
                            <ul>
                                <li>January 3 - July 14&nbsp;</li>
                                <li>September 1&nbsp;- December 14</li>
                            </ul>

                            <span class="title1">High season</span>

                            <ul>
                                <li>July 15 - August&nbsp;31</li>
                                <li>December 15 - December 29</li>
                                <li>December 30 - January 2, 2019</li>
                            </ul>

                            <span class="title1">Select arrival date:</span>

                            <div class="datepicker mb-3"></div>

                            <a href="{{ url('/enquiry')}}" class="btn btn-first btn-block">Enquiry Now</a>
                        </div>
                    </div>

                    <div class="card-block">
                        <img class="img-fluid" alt="" src="https://placeimg.com/1200/687/any">
                        
          
                    </div>
                    <div class="reservation mb-3">
                        <label>Organized by <b>FlyHighYoga</b></label>
                        <hr>
                        <p>
                        FlyHighYoga is a unique, alignment based style of Aerial yoga which allows students to experience yoga postures in a way they never have before. </p>


                        <div class="listing-overview__notes">
                            <div>
                                <i class="fa fa-map-marker"></i>
                                Ubud, Indonesia
                            </div>
                            <div>
                                <i class="fa fa-bullhorn"></i>
                                Speaks English
                            </div>
                        </div>
                         
                    </div>


                    <div class="text-center py-4">
                        <img width="240" src="{{ url('front/images/payments.png') }}">
                        <p>For this organizer you can guarantee your booking through BookYogaTeacherTraining.com. All major credit cards supported.</p>
                    </div>

                    <div class="py-3">
                        <label class="title1">Why choose BookYogaTeacherTraining.com</label>
                        <div class="listing-overview__notes py-2">
                            <div>
                                <i class="fa fa-tag"></i>
                                Largest Selection

                            </div>
                            <div>
                                <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
                                Friendly Customer Service

                            </div>
                            <div>
                                <i class="fa fa-eercast" aria-hidden="true"></i>
                                Offers for every budget

                            </div>
                            <div>
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                Best Price
                            </div>
                        </div>
                    </div>

                    <div class="py-3">
                        <label class="title1">Why choose BookYogaTeacherTraining.com</label>
                        <ul class="list-style1">
                            <li><a href="/all/d/the-americas-and-caribbean/costa-rica/nosara" class="might-be-interested__link">
                                Yoga Teacher Training in Nosara
                                </a></li>
                                <li>
                                <a href="/all/d/the-americas-and-caribbean" class="might-be-interested__link">
                                Yoga Teacher Training in The Americas &amp; Caribbean
                                </a></li>
                                <li><a href="/all/d/the-americas-and-caribbean/costa-rica" class="might-be-interested__link">
                                Yoga Teacher Training in Costa Rica
                                </a></li>
                                <li><a href="/all/c/200-hour" class="might-be-interested__link">
                                200-Hour Yoga Teacher Training
                                </a></li>
                                <li><a href="/all/c/yoga-alliance" class="might-be-interested__link">
                                Yoga Alliance Teacher Training
                                </a></li>
                                <li><a href="/all/s/yoga-vinyasa" class="might-be-interested__link">
                                Yoga Teacher Training Vinyasa
                                </a></li>
                                <li><a href="/all/s/yoga-restorative" class="might-be-interested__link">
                                Yoga Teacher Training Restorative
                                </a>

                                </li>
                                </ul>
                    </div>

                        </div>
                    </div>

                    <div class="block">

                    </div>
            </div>
        </div>
    </div>
</section>
@include('footer')