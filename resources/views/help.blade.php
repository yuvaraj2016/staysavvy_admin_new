@extends('layouts.app')
@section('content')




<style>
p {
    font-family: Roboto, sans-serif;
    /* color: #454545; */
    font-size: 15px;
    line-height: 22px;
margin-bottom: 2px;
    /* font-weight: 400; */
    letter-spacing: -0.2px;
}

.panel,
.panel-body {
  box-shadow: none;
}
.card{
    margin-bottom: 7px!important;
}

.panel-heading {
    padding: 10px 10px !important;
  
}
/* .panel-group .panel-heading {
  padding: 0;
} */

/* .panel-group .panel-heading a {
  display: block;
  padding: 10px 15px;
  text-decoration: none;
  position: relative;
} */

.panel-group .panel-heading a:after {
  content: '-';
  float: right;
  margin-top: 13px;
}

.panel-group .panel-heading a.collapsed:after {
  content: '+';
}
</style>








<div class="page-wrapper" style="background-color: white;">

    <div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-12 offset-4">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4 class="">TERMS AND CONDITIONS</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
     
        </div>
    </div>





<div class="panel-group" id="accordionGroupClosed" role="tablist" aria-multiselectable="true">



<div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingOne">
      <h2 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseClosezero" aria-expanded="true" aria-controls="collapseCloseOne">
        Welcome to Staysavvy!  
        </a>
      </h2>
    </div>
    <div id="collapseClosezero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <address >These Terms of Use govern your access to and use of our website  and application app. Please read these Terms of Use carefully, and contact us if you have any questions. </address>
<address>Your use of our Website and App indicates that you have read and accepted these Terms of Use and you warrant that you have the legal capacity to accept these Terms of Use.</address>
            <address>We are committed to protecting your privacy. Our privacy policy is available at www.staysavvy.net. By agreeing to these Terms of Use, you also agree to the terms in our privacy policy. </address>  
      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingOne">
      <h2 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseOne" aria-expanded="true" aria-controls="collapseCloseOne">
        1. Licence
        </a>
      </h2>
    </div>
    <div id="collapseCloseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <address>1.1 We grant you a non-exclusive, royalty-free, revocable, worldwide, non-transferable right and licence to use our Website and App for your personal use in accordance with these Terms of Use.

‍</address>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseTwo" aria-expanded="false" aria-controls="collapseTwo">
        2. Our intellectual property rights
        </a>
      </h4>
    </div>
    <div id="collapseCloseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      <address>2.1 Our Website and App contain material which is owned by or licensed to us and is protected by international laws, including without limitation the trademarks, trade names, software, content, design, images, graphics, layout, appearance and look of our Website and App. </address>
<address>2.2 We own the copyright which subsists in all creative and literary works displayed on our Website and App. </address>
<address>2.3 As between you and us, we own all the intellectual property rights in our Website and App and nothing in these Terms of Use constitutes a transfer of the ownership of any intellectual property rights to you.</address>
   <address>2.4 Your use of our Website and App does not grant you a licence, or act as a right of use, of any of the intellectual property, whether registered or unregistered, displayed on our Website or App without the express written permission of the owner.</address> 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseThree" aria-expanded="false" aria-controls="collapseThree">
        3. Content 
        </a>
      </h4>
    </div>
    <div id="collapseCloseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <address>3.1 We allow you to post content on our Website and App (User Content). You are solely responsible for the User Content that you post on our Website and App.</address>
<address>3.2 When you add User Content to our Website and App, you:</address>
<address>(a) warrant that you have all necessary rights to post the User Content; </address>
<address>(b) grant us a perpetual, non-exclusive, royalty-free, irrevocable, worldwide and transferable right and licence to use the User Content in any way (including without limitation reproducing, changing and communicating the content to the
public) and permit us to authorise any other person to do the same; and</address>
<address>(c) consent to any act or omission by us or authorised by us which would otherwise constitute an infringement of your moral rights, and if you add any User Content in which any third party has moral rights, you must ensure that the third party consents in the same manner.

‍</address>
      </div>
    </div>
  </div>




  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseFour" aria-expanded="false" aria-controls="collapseThree">
        4. Prohibited conduct 
        </a>
      </h4>
    </div>
    <div id="collapseCloseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <address>4.1 You must not: </address>
<address>(a) use our Website or App for any activities, or post or transmit any material from our Website or App:</address>
<address>(i) unless you hold all necessary rights, licences and consents to do so;</address>
<address>(ii) that infringes the intellectual property or other rights of any person;</address>

<address>(iii) that would cause you or us to breach any law, regulation, rule, code or other legal obligation;</address>
<address>(iv) that defames, harasses, threatens, menaces or offends any person;</address>
<address>(v) that is or could reasonably be considered to be obscene, inappropriate, defamatory, disparaging, indecent, seditious, offensive, pornographic, threatening, abusive, liable to incite racial hatred, discriminatory,
blasphemous, in breach of confidence or in breach of privacy; or</address>
<address>(vi) that would bring us, or our Website or App, into disrepute;</address>

<address>(b) use our Website or App to transmit, distribute, post or submit any information concerning any other person or entity without their permission (including without limitation photographs, personal contact information or credit card details); </address>
<address>(c) use our Website or App to send unsolicited messages to other users;</address>
<address>(d) perform any acts which would damage, interfere with or inhibit the use of our Website and App; </address>
<address>(e) use or attempt to use any engines, software, tools, or other mechanisms (including without limitation browsers, spiders, robots, avatars or intelligent agents) to navigate or search our Website other than the commonly recognised search engine and agents and other generally available third party web browsers;</address>
<address>(f) attempt to decipher, decompile, disassemble or reverse engineer any of the code or software comprising in or in any way making up a part of our Website or App;  </address>
<address>(g) engage in any screen scraping or data acquisition and consolidation; </address>
<address>(h) alter or modify, or attempt to alter or modify, any of the code or material on our Website or App;</address>
<address>(i) cause any of the material on our Website or App to be framed or embedded in another website; </address>
<address>(j) create derivative works from the contents of our Website or App; or</address>
<address>(k) advocate, encourage or assist any third party in doing any of the foregoing.</address>
<address>4.2 We reserve the right to amend or delete any and all User Content and to block you from our Website and App if we believe that there is a violation of these Terms of Use.  </address>

      </div>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseFive" aria-expanded="false" aria-controls="collapseThree">
        5. Information 
        </a>
      </h4>
    </div>
    <div id="collapseCloseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <address>5.1 Any information made available on our Website or App, including any recommendations, statements and opinions contained on our Website or App whether published by us or any other user (Information), is for general information purposes only. The Information does not take into account your specific circumstances and any reliance you place on the Information is at your own risk. </address>
<address>5.2 Before acting on any Information, we recommend that you:</address>
<address>(a) consider whether it is appropriate for your personal circumstances; </address>
<address>(b) carry out your own research; and </address>
<address>(c) seek professional advice where necessary.</address>
      </div>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseSix" aria-expanded="false" aria-controls="collapseThree">
        6. Third party links 
        </a>
      </h4>
    </div>
    <div id="collapseCloseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
    
<address>6.1 Our Website and App may contain links to third-party websites, advertisers, services, special offers or other events or activities that are not owned or controlled by us. We do not endorse, sponsor or approve any such third-party sites, information, materials, products or services. </address>
<address>6.2 If you access any third party website, service or content via our Website or App, you do so at your own risk. We will have no liability arising from your use of or access to any third-party website, service or content.</address>
      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseSeven" aria-expanded="false" aria-controls="collapseThree">
        7. Accessibility 
        </a>
      </h4>
    </div>
    <div id="collapseCloseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
 
<address>7.1 Whilst we take all reasonable steps to minimise any delays and interruptions to your use of our Website and App, we cannot warrant that our Website and App will be available at all times or at any given time. </address>
<address>7.2 We are not responsible for any delays or interruptions which affect your ability to use our Website or App. </address>
<address>7.3 We may, at any time and without notice, discontinue our Website or App, and we are not responsible for any loss, cost, damage or liability which may result from such discontinuance. </address>
      </div>
    </div>
  </div>




  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseeight" aria-expanded="false" aria-controls="collapseThree">
        8. Disclaimer 
        </a>
      </h4>
    </div>
    <div id="collapseCloseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>8.1 To the maximum extent permitted by law, our Website and App are provided to you without warranties, express or implied, including without limitation, implied warranties of merchantability and fitness for a particular purpose. We do not warrant that:</address>
<address>(a) the functions contained in any material in our Website or App or your access to our Website or App will be error free;</address>
<address>(b) any defects on our Website or App will be corrected;</address>
<address>(c) our Website, App or server which stores and transmits material to you, are free of viruses or any other harmful components; or </address>
<address>(d) our Website or App will operate on a continuous basis or be available at any time.</address>
<address>8.2 You acknowledge and agree that we are not responsible for and will not accept liability for any User Content which you or any other user or third party posts or transmits using our Website or App. You understand and agree that you may be exposed to User Content that is inaccurate, inappropriate, defamatory, offensive or otherwise unsuited to your purpose.</address>

<address>8.3  To the maximum extent permitted by law:</address>
<address>(a) we make no representations or warranties (express or implied) in relation to the completeness, accuracy, reliability, suitability or availability of any Information, images, products, services, or graphics published on our Website or App; and</address>
<address>(b) we exclude:</address>
<address>(i) all representations, guarantees, warranties or terms (whether express or implied) other than those expressly set out in these Terms of Use; and</address>
<address>(ii) all liability for any loss, damage, costs or expense, whether direct, indirect, incidental, special and/or consequential including loss of profits, suffered by you or any third party, or claims made against you or any third party which result from your use of our Website or App.</address>
      </div>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseClosenine" aria-expanded="false" aria-controls="collapseThree">
        9. Indemnity 
        </a>
      </h4>
    </div>
    <div id="collapseClosenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>9.1 You indemnify us for all claims, actions, suits, demands, damages, liabilities, costs or expenses (including legal costs and expenses) incurred or suffered by us and any of our officers, employees or agents, which arise out of or are connected to: </address>
<address>(a) your use or access to our Website or App; </address>
<address>(b) a breach of these Terms of Use by you; or </address>
<address>(c) any wilful, unlawful or negligent act or omission by you.</address>
<address>9.2 The indemnity under clause 9.1 will survive the termination of these Terms of Use.

‍</address>
      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseten" aria-expanded="false" aria-controls="collapseThree">
        10. Breach 
        </a>
      </h4>
    </div>
    <div id="collapseCloseten" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>10.1 If you breach these Terms of Use, notwithstanding any other rights we may have, we may, without notice to you,deactivate your account and block from our Website and App.

‍</address>

      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseeleven" aria-expanded="false" aria-controls="collapseThree">
        11. Assignment 
        </a>
      </h4>
    </div>
    <div id="collapseCloseeleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>11.1 These Terms of Use, and any rights and licences granted to you under these Terms of Use, cannot be transferred or assigned by you to a third party. However, these Terms of Use may be assigned by us, at any time, without notice to you.

‍</address>

      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseClosetwele" aria-expanded="false" aria-controls="collapseThree">
        12. Waiver 
        </a>
      </h4>
    </div>
    <div id="collapseClosetwele" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>12.1 If we fail to exercise or delay in exercising the right, power or remedy, we do not waive the right, power or remedy. </address>

<address>12.2 If we do not act in relation to a breach by you of these Terms of Use, this does not waive our right to act with respect to that breach or subsequent or similar breaches.</address>

      </div>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseClosethirteen" aria-expanded="false" aria-controls="collapseThree">
        13. Enforceability 
        </a>
      </h4>
    </div>
    <div id="collapseClosethirteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>13.1 If any provision of these Terms of Use is found to be illegal, invalid or unenforceable by a court of law in respect of a jurisdiction, then that provision will not apply in that jurisdiction and is deemed not to have been included in the Terms of Use in that jurisdiction. This will not affect the remainder of the remaining provisions.

‍</address>

      </div>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-heading card" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" style="font-size: 19px;" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#collapseCloseforteen" aria-expanded="false" aria-controls="collapseThree">
        ‍ 14. Governing law
        </a>
      </h4>
    </div>
    <div id="collapseCloseforteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      <address>14.1 These Terms of Use are governed by and construed in accordance with the law for the time being in force in UK and you, by agreeing to these Terms of Use, are deemed to have submitted to the non-exclusive jurisdiction of the courts of UK and courts of appeal from those courts.  </address>

<address>14.2  Our Website and App may be accessible from outside of UK. We make no representation that our Website or App complies with the laws (including intellectual property laws) of any country outside UK. If you access our Website or App from outside UK, you do so at your own risk and you are responsible for complying with the laws in the place where you access our Website or App.
</address>

      </div>
    </div>
  </div>


</div>


    <!-- <div class="page-body card">
        <div class="row">
     
            <div class="col-sm-11 " style="margin-left: 56px;">
       
                <div class="" >
<h5 class="" style="line-height: 2;">Welcome to <b>Staysavvy!  </b></h5>

<address >These Terms of Use govern your access to and use of our website  and application app. Please read these Terms of Use carefully, and contact us if you have any questions. </address>
<address>Your use of our Website and App indicates that you have read and accepted these Terms of Use and you warrant that you have the legal capacity to accept these Terms of Use.</address>
            <address>We are committed to protecting your privacy. Our privacy policy is available at www.staysavvy.net. By agreeing to these Terms of Use, you also agree to the terms in our privacy policy. </address>  
    </div>
             



            </div>
        </div>


        <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>1. Licence</b></h5>

<address>1.1 We grant you a non-exclusive, royalty-free, revocable, worldwide, non-transferable right and licence to use our Website and App for your personal use in accordance with these Terms of Use.

‍</address>
     </div>

     </div>
 </div>




 <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>2. Our intellectual property rights</b></h5>
<address>2.1 Our Website and App contain material which is owned by or licensed to us and is protected by international laws, including without limitation the trademarks, trade names, software, content, design, images, graphics, layout, appearance and look of our Website and App. </address>
<address>2.2 We own the copyright which subsists in all creative and literary works displayed on our Website and App. </address>
<address>2.3 As between you and us, we own all the intellectual property rights in our Website and App and nothing in these Terms of Use constitutes a transfer of the ownership of any intellectual property rights to you.</address>
   <address>2.4 Your use of our Website and App does not grant you a licence, or act as a right of use, of any of the intellectual property, whether registered or unregistered, displayed on our Website or App without the express written permission of the owner.</address> 
</div>
     </div>
 </div>


 <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>3. Content </b></h5>
<address>3.1 We allow you to post content on our Website and App (User Content). You are solely responsible for the User Content that you post on our Website and App.</address>
<address>3.2 When you add User Content to our Website and App, you:</address>
<address>(a) warrant that you have all necessary rights to post the User Content; </address>
<address>(b) grant us a perpetual, non-exclusive, royalty-free, irrevocable, worldwide and transferable right and licence to use the User Content in any way (including without limitation reproducing, changing and communicating the content to the
public) and permit us to authorise any other person to do the same; and</address>
<address>(c) consent to any act or omission by us or authorised by us which would otherwise constitute an infringement of your moral rights, and if you add any User Content in which any third party has moral rights, you must ensure that the third party consents in the same manner.

‍</address>

     </div>
     </div>
 </div>

 <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>4. Prohibited conduct  </b></h5>

<address>4.1 You must not: </address>
<address>(a) use our Website or App for any activities, or post or transmit any material from our Website or App:</address>
<address>(i) unless you hold all necessary rights, licences and consents to do so;</address>
<address>(ii) that infringes the intellectual property or other rights of any person;</address>

<address>(iii) that would cause you or us to breach any law, regulation, rule, code or other legal obligation;</address>
<address>(iv) that defames, harasses, threatens, menaces or offends any person;</address>
<address>(v) that is or could reasonably be considered to be obscene, inappropriate, defamatory, disparaging, indecent, seditious, offensive, pornographic, threatening, abusive, liable to incite racial hatred, discriminatory,
blasphemous, in breach of confidence or in breach of privacy; or</address>
<address>(vi) that would bring us, or our Website or App, into disrepute;</address>

<address>(b) use our Website or App to transmit, distribute, post or submit any information concerning any other person or entity without their permission (including without limitation photographs, personal contact information or credit card details); </address>
<address>(c) use our Website or App to send unsolicited messages to other users;</address>
<address>(d) perform any acts which would damage, interfere with or inhibit the use of our Website and App; </address>
<address>(e) use or attempt to use any engines, software, tools, or other mechanisms (including without limitation browsers, spiders, robots, avatars or intelligent agents) to navigate or search our Website other than the commonly recognised search engine and agents and other generally available third party web browsers;</address>
<address>(f) attempt to decipher, decompile, disassemble or reverse engineer any of the code or software comprising in or in any way making up a part of our Website or App;  </address>
<address>(g) engage in any screen scraping or data acquisition and consolidation; </address>
<address>(h) alter or modify, or attempt to alter or modify, any of the code or material on our Website or App;</address>
<address>(i) cause any of the material on our Website or App to be framed or embedded in another website; </address>
<address>(j) create derivative works from the contents of our Website or App; or</address>
<address>(k) advocate, encourage or assist any third party in doing any of the foregoing.</address>
<address>4.2 We reserve the right to amend or delete any and all User Content and to block you from our Website and App if we believe that there is a violation of these Terms of Use.  </address>


     </div>
     </div>
 </div>

 <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>5. Information   </b></h5>
<address>5.1 Any information made available on our Website or App, including any recommendations, statements and opinions contained on our Website or App whether published by us or any other user (Information), is for general information purposes only. The Information does not take into account your specific circumstances and any reliance you place on the Information is at your own risk. </address>
<address>5.2 Before acting on any Information, we recommend that you:</address>
<address>(a) consider whether it is appropriate for your personal circumstances; </address>
<address>(b) carry out your own research; and </address>
<address>(c) seek professional advice where necessary.</address>

     </div>
     </div>
 </div>
 <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>6. Third party links   </b></h5>

<address>6.1 Our Website and App may contain links to third-party websites, advertisers, services, special offers or other events or activities that are not owned or controlled by us. We do not endorse, sponsor or approve any such third-party sites, information, materials, products or services. </address>
<address>6.2 If you access any third party website, service or content via our Website or App, you do so at your own risk. We will have no liability arising from your use of or access to any third-party website, service or content.

‍</address>

     </div>
     </div>
 </div>
 <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>7. Accessibility  </b></h5>

<address>7.1 Whilst we take all reasonable steps to minimise any delays and interruptions to your use of our Website and App, we cannot warrant that our Website and App will be available at all times or at any given time. </address>
<address>7.2 We are not responsible for any delays or interruptions which affect your ability to use our Website or App. </address>
<address>7.3 We may, at any time and without notice, discontinue our Website or App, and we are not responsible for any loss, cost, damage or liability which may result from such discontinuance. </address>

     </div></div></div>
     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>8. Disclaimer   </b></h5>

<address>8.1 To the maximum extent permitted by law, our Website and App are provided to you without warranties, express or implied, including without limitation, implied warranties of merchantability and fitness for a particular purpose. We do not warrant that:</address>
<address>(a) the functions contained in any material in our Website or App or your access to our Website or App will be error free;</address>
<address>(b) any defects on our Website or App will be corrected;</address>
<address>(c) our Website, App or server which stores and transmits material to you, are free of viruses or any other harmful components; or </address>
<address>(d) our Website or App will operate on a continuous basis or be available at any time.</address>
<address>8.2 You acknowledge and agree that we are not responsible for and will not accept liability for any User Content which you or any other user or third party posts or transmits using our Website or App. You understand and agree that you may be exposed to User Content that is inaccurate, inappropriate, defamatory, offensive or otherwise unsuited to your purpose.</address>

<address>8.3  To the maximum extent permitted by law:</address>
<address>(a) we make no representations or warranties (express or implied) in relation to the completeness, accuracy, reliability, suitability or availability of any Information, images, products, services, or graphics published on our Website or App; and</address>
<address>(b) we exclude:</address>
<address>(i) all representations, guarantees, warranties or terms (whether express or implied) other than those expressly set out in these Terms of Use; and</address>
<address>(ii) all liability for any loss, damage, costs or expense, whether direct, indirect, incidental, special and/or consequential including loss of profits, suffered by you or any third party, or claims made against you or any third party which result from your use of our Website or App.</address>


     </div>
     </div>
     </div>

     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>9. Indemnity    </b></h5>

<address>9.1 You indemnify us for all claims, actions, suits, demands, damages, liabilities, costs or expenses (including legal costs and expenses) incurred or suffered by us and any of our officers, employees or agents, which arise out of or are connected to: </address>
<address>(a) your use or access to our Website or App; </address>
<address>(b) a breach of these Terms of Use by you; or </address>
<address>(c) any wilful, unlawful or negligent act or omission by you.</address>
<address>9.2 The indemnity under clause 9.1 will survive the termination of these Terms of Use.

‍</address>

     </div>
     </div>
     </div>

     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>10. Breach </b></h5>

<address>10.1 If you breach these Terms of Use, notwithstanding any other rights we may have, we may, without notice to you,deactivate your account and block from our Website and App.

‍</address>

     </div>
     </div>
     </div>

     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>11. Assignment </b></h5>

<address>11.1 These Terms of Use, and any rights and licences granted to you under these Terms of Use, cannot be transferred or assigned by you to a third party. However, these Terms of Use may be assigned by us, at any time, without notice to you.

‍</address>

     </div>
     </div>
     </div>


     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>12. Waiver </b></h5>
<address>12.1 If we fail to exercise or delay in exercising the right, power or remedy, we do not waive the right, power or remedy. </address>

     <address>12.2 If we do not act in relation to a breach by you of these Terms of Use, this does not waive our right to act with respect to that breach or subsequent or similar breaches.</address>


     </div>
     </div></div>


     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>13. Enforceability  </b></h5>

<address>13.1 If any provision of these Terms of Use is found to be illegal, invalid or unenforceable by a court of law in respect of a jurisdiction, then that provision will not apply in that jurisdiction and is deemed not to have been included in the Terms of Use in that jurisdiction. This will not affect the remainder of the remaining provisions.

‍</address>

     </div>
     </div>
     </div>


     <div class="row">
     
     <div class="col-sm-11 " style="margin-left: 56px;">
     <div class="" >
<h5 class="" style="line-height: 2;"><b>‍
14. Governing law</b></h5>
<address>14.1 These Terms of Use are governed by and construed in accordance with the law for the time being in force in UK and you, by agreeing to these Terms of Use, are deemed to have submitted to the non-exclusive jurisdiction of the courts of UK and courts of appeal from those courts.  </address>

<address>14.2  Our Website and App may be accessible from outside of UK. We make no representation that our Website or App complies with the laws (including intellectual property laws) of any country outside UK. If you access our Website or App from outside UK, you do so at your own risk and you are responsible for complying with the laws in the place where you access our Website or App.
</address>


     </div>
     </div>
     </div>









                        




    </div> -->

    </div>




<script>
  function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
</section>
@endsection