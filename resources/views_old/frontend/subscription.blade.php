@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')
 
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">

         <section class="inner_banner_sec" style="
            background-image: url(assets/images/inr-bnr.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            ">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-banner-text">
                        <h1>Subscription</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="subscription_page">
            <div class="container">
               <div class="row mb-5">
                  <div class="col-lg-12">
                     <div class="heading_hp mb-3">
                        <h2>Subscription Plans for Rent Hub:</h2>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div id="">
                        <!--price tab-->
                        <div class="row">
                           <div class="col-xl-3 col-lg-6">
                              <div class="plan">
                                 <div class="plan-inner">
                                    <div class="entry-title">
                                       <h3>Basic Subscription</h3>
                                       <h6>Ideal for new users or those with occasional rental or listing needs.</h6>
                                       <div class="price">$25<span>/Per Month</span>
                                       </div>
                                    </div>
                                    <div class="entry-content">
                                       <h5>Features:</h5>
                                       <ul>
                                          <li>Ability to list or rent up to 5 properties or items per month.</li>
                                          <li>Basic customer support via email.</li>
                                          <li>Access to standard listings.</li>
                                       </ul>
                                       <h5>Best For:</h5>
                                       <ul>
                                          <li>Individuals or small businesses starting out with rentals or sales.</li>
                                       </ul>
                                    </div>
                                    <div class="subscri">
                                       <a href="#" class="red_btn"><span>Subscribe</span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--price tab-->
                           <div class="col-xl-3 col-lg-6">
                              <div class="plan basic">
                                 <div class="plan-inner">
                                    <div class="hot">hot</div>
                                    <div class="entry-title">
                                       <h3>Pro Subscription</h3>
                                       <h6>Designed for frequent renters or active agents with higher transaction volumes.</h6>
                                       <div class="price">$50<span>/Per Month</span>
                                       </div>
                                    </div>
                                    <div class="entry-content">
                                       <h5>Features:</h5>
                                       <ul>
                                          <li>Unlimited listings and rentals.</li>
                                          <li>Enhanced listing features such as additional images and priority placement.</li>
                                          <li>Access to analytics tools to track rental performance.</li>
                                          <li>Phone and email support.</li>
                                       </ul>
                                       <h5>Best For:</h5>
                                       <ul>
                                          <li>Active agents, property managers, and mid-sized rental businesses.</li>
                                       </ul>
                                    </div>
                                    <div class="subscri">
                                       <a href="#" class="red_btn"><span>Subscribe</span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end of price tab-->
                           <!--price tab-->
                           <div class="col-xl-3 col-lg-6">
                              <div class="plan standard">
                                 <div class="plan-inner">
                                    <div class="entry-title">
                                       <h3>Premium Subscription</h3>
                                       <h6>Tailored for top-tier professional users who need advanced features and maximum exposure.</h6>
                                       <div class="price">$75<span>/Per Month</span>
                                       </div>
                                    </div>
                                    <div class="entry-content">
                                       <h5>Features:</h5>
                                       <ul>
                                          <li>All features of the Pro Subscription.</li>
                                          <li>Featured listings on the homepage and top of search results.</li>
                                          <li>Personalized consultation services for property management and investment strategies.</li>
                                          <li>Premium customer support with dedicated account management.</li>
                                       </ul>
                                       <h5>Best For:</h5>
                                       <ul>
                                          <li>Large rental agencies, professional property investors, and high-volume equipment rental businesses.</li>
                                       </ul>
                                    </div>
                                    <div class="subscri">
                                       <a href="#" class="red_btn"><span>Subscribe</span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end of price tab-->
                           <!--price tab-->
                           <div class="col-xl-3 col-lg-6">
                              <div class="plan ultimite">
                                 <div class="plan-inner">
                                    <div class="entry-title">
                                       <h3>Enterprise Solutions</h3>
                                       <h6>Customizable solutions for large enterprises or specialized markets.</h6>
                                       <div class="price">$100<span>/Per Month</span>
                                       </div>
                                    </div>
                                    <div class="entry-content">
                                       <h5>Features:</h5>
                                       <ul>
                                          <li>Customized integration with existing business systems.</li>
                                          <li>Tailored marketing and sales strategies.</li>
                                          <li>Bulk transaction capabilities and advanced security features.</li>
                                          <li>On-site training and continuous support.</li>
                                       </ul>
                                       <h5>Best For:</h5>
                                       <ul>
                                          <li>Corporate clients, large-scale investors, and international property management firms.</li>
                                       </ul>
                                    </div>
                                    <div class="subscri">
                                       <a href="#" class="red_btn"><span>Subscribe</span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end of price tab-->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="row">
                        <div class="col-lg-12">
                           <div id="">
                              <!--price tab-->
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="plan basic">
                                       <div class="plan-inner">
                                          <div class="entry-title">
                                             <h3>Additional Services:</h3>
                                             <h6>Ideal for new users or those with occasional rental or listing needs.</h6>
                                             <div class="price">$150<span>/Per Month</span>
                                             </div>
                                          </div>
                                          <div class="entry-content">
                                             <h5>Pay-Per-Use Options:</h5>
                                             <ul>
                                                <li>For users who don't want a monthly subscription, offer single-use fees for listing or featuring a property.</li>
                                             </ul>
                                             <h5>Add-On Services:</h5>
                                             <ul>
                                                <li>Offer additional services such as professional photography, virtual tours, legal assistance, or premium ad placements that can be added to any plan for an extra fee.</li>
                                             </ul>
                                          </div>
                                          <div class="subscri">
                                             <a href="#" class="red_btn"><span>Subscribe</span></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end of price tab-->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="row">
                        <div class="col-lg-12">
                           <div id="">
                              <!--price tab-->
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="plan ultimite">
                                       <div class="plan-inner">
                                          <div class="entry-title">
                                             <h3>Considerations for Plan Development:</h3>
                                             <h6>Ideal for new users or those with occasional rental or listing needs.</h6>
                                             <div class="price">$200<span>/Per Month</span>
                                             </div>
                                          </div>
                                          <div class="entry-content">
                                             <h5>Flexible Pricing:</h5>
                                             <ul>
                                                <li>Consider local market conditions and competitive pricing strategies to attract a broad range of users.</li>
                                             </ul>
                                             <h5>Trial Periods:</h5>
                                             <ul>
                                                <li>Provide a trial period for new users to test the platform with limited features before committing to a subscription.</li>
                                             </ul>
                                             <h5>Feedback Mechanisms:</h5>
                                             <ul>
                                                <li>Regularly gather user feedback on subscription plans and adjust offerings as needed to meet changing customer needs and preferences.</li>
                                             </ul>
                                          </div>
                                          <div class="subscri">
                                             <a href="#" class="red_btn"><span>Subscribe</span></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end of price tab-->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
        
@include('frontend.includes.footer')

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content bg_f7f7f7">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="propety-type mb-div">
                     <div class="tour-form">
                        <form>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">First & last name</label>
                                    <input type="text" class="form-control" id="" value="" placeholder="First & last name"
                                       required="">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" id="" value="" placeholder="Phone" required="">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="" value="" placeholder="Email" required="">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea class="form-control form-control-1" id="" placeholder="Message"
                                       rows="4"></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">Interested In</label>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                       <label class="form-check-label" for="flexRadioDefault1">
                                       Request a tour
                                       </label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                       <label class="form-check-label" for="flexRadioDefault2">
                                       Apply
                                       </label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                       <label class="form-check-label" for="flexRadioDefault3">
                                       Enquire
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">Select a preferred date for tour <span>(optional)</span></label>
                                    <input type="date" class="form-control" id="" value="" placeholder="Email" required="">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-12">
                                    <div class="request-btn text-center">
                                       <a href="#" class="">Inquire Now</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>

@endsection