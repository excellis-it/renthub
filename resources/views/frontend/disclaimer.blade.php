@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')

<section class="inner_banner_sec" style="
    background-image: url({{asset('frontend_assets/assets/images/inr-bnr.jpg')}});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-text">
                    <h1>Disclaimer for Rent Hub Services LLC</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="property-details-sec">
    <div class="container">

        <div class="row">
            <h2>General Use Disclaimer</h2>
            <p>Rent Hub Services LLC provides an online listing platform where users can list and browse various types of properties, vehicles, machinery, parts, and other miscellaneous items. While we strive to maintain accurate and up-to-date information, we do not verify the content posted by our users and are not responsible for the accuracy of listings on our platform. Users are encouraged to conduct their own due diligence before engaging in any transaction.</p>

            <h4>Mandatory Due Diligence</h4>
            <p>Users must perform due diligence to verify the accuracy and legitimacy of listings before engaging in renting, purchasing, or selling goods or services through Rent Hub Services LLC. This includes, but is not limited to, verifying the identity of other users, the legal status of goods or properties, and the accuracy of listing details. Rent Hub Services LLC emphasizes that due diligence is a mandatory step for all users to help safeguard against fraudulent or misleading listings.</p>
            <h4>Platform Due Diligence Efforts</h4>
            <p>Rent Hub Services LLC undertakes efforts to ensure that users and listers on our platform are trustworthy. We do our best to verify the identities of listers and users to enhance transaction security. However, we rely completely on our community to conduct themselves with honesty and to provide reliable and accurate content. Rent Hub Services LLC does not bear responsibility for any inaccuracies, misrepresentations, or fraudulent content provided by users.</p>
            <h4>Limitation of Liability for False Listings</h4>
            <p>Rent Hub Services LLC is not liable for any false advertisements or misrepresentations made in listings on our platform. Responsibility for ensuring the accuracy, completeness, and truthfulness of listing information rests solely with the individual users who create those listings. Rent Hub Services LLC does not guarantee the quality, safety, legality, or availability of any items listed, nor does it guarantee the accuracy of listings or user communications.</p>

            <h4>Non-Brokerage Declaration</h4>
            <p>Rent Hub Services LLC is not a licensed real estate broker and does not engage in brokering real estate transactions. The platform serves solely as a venue to facilitate connections between sellers and buyers. If your locality requires a licensed broker for real estate transactions, it is the responsibility of the user to ensure compliance with all applicable laws.</p>
            <h4>User Responsibility</h4>
            <p>Users of Rent Hub Services LLC agree to use caution and practice safe trading when engaging in transactions. Users are solely responsible for all communications, agreements, and transactions made with other users through our platform.</p>
            <h4>Agreement to Terms Before Listing</h4>
            <p>Listers must explicitly agree to the terms outlined in this disclaimer before posting any listings on Rent Hub Services LLC. This agreement affirms their understanding and commitment to uphold the accuracy and legality of their listings and their responsibility for the content they post.</p>
            <h4>No Endorsement</h4>
            <p>Rent Hub Services LLC does not endorse any of the listings on its platform. The appearance of a listing on this site does not imply endorsement of the seller or the quality of the goods offered. Users are advised to verify the credentials and reliability of other users independently.</p>
            <h4>Unlawful Content and Hacking</h4>
            <p>Rent Hub Services LLC is not responsible for any unauthorized access to or alterations of the platform’s content, or for any unlawful or inappropriate content posted by users, including but not limited to pornography, nudity, or other illicit materials. Users posting such content will be subject to immediate account termination and potential legal action. Users noticing such content are encouraged to report it immediately to <a href="mailto:info@rentishhub.com">info@rentishhub.com</a>.</p>
            <h4>Changes and Amendments</h4>
            <p>Rent Hub Services LLC reserves the right to modify this disclaimer at any time, effective upon posting of an updated version of this disclaimer on the platform. Users are encouraged to frequently review this disclaimer to ensure their understanding of the terms under which they are permitted to use this platform.</p>
            <h4>Acknowledgment</h4>
            <p>By using Rent Hub Services LLC, you acknowledge that you have read this disclaimer and agree to all its terms and conditions. By accessing Rent Hub Services LLC you agree to be bound by this disclaimer. If you do not agree to abide by the terms of this disclaimer, you are not authorized to use or access Rent Hub Services LLC.</p>
        </div>
    </div>
</section>


@include('frontend.includes.footer')
@endsection
