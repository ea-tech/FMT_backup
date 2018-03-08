<?php
/* Template Name: Faq Page */

get_header(); 
?>
<?php while ( have_posts() ) : the_post(); ?>

<div id="primary" class="content-area">
<content>
  <section id="faq">
    <div class="container-fluid">
      <div class="heading">
        <?php the_title('<h1>','</h1>');?>
      </div>
    </div>
    <div class="tabPannel">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav_list" role="tablist">
        <li role="presentation" class="active box_type"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <img class="img-responsive chat" src="<?php echo get_stylesheet_directory_uri()?>/images/chat-11.png" >
          <p style="margin-left:10px;">General</p>
          </a></li>
        <li role="presentation" class="box_type"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> <img class="img-responsive chat" src="<?php echo get_stylesheet_directory_uri()?>/images/customer.png">
          <p>Customers-centric</p>
          </a></li>
        <li role="presentation" class="box_type"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"> <img class="img-responsive chat" src="<?php echo get_stylesheet_directory_uri()?>/images/techie.png">
          <p>Techie-centric</p>
          </a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
          <div class="content">
            <div class="line_question">
              <div class="question">
                <p>What does FMT(FindMeTechie) do? </p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>FMT(FindMeTechie) is a managed freelancing platform, which helps Employers find, hire and onboard leading Tech freelancers. FindMeTechie facilitates freelance engagements with active profile validation and ongoing project management support to eliminate risks in Freelancing. </p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>Where are you based? </p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>FMT is based out of Milpitas California, We have operations in Miami, Florida, New Delhi, India and Singapore as well. Our Project management team is based out of New Delhi, India.</p>
              </div>
            </div>
            
            
            <div class="line_question">
              <div class="question">
                <p>How does FMT engage with Techies? </p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>W​e maintain a ​curated ​database of Techies from across the world to serve diverse customer requirements. ​All profiles are validated before these are matched with employer opprtunities. </p>
                <p>If you have any specific question, please email us at <a href="mailto: support@findmetechie.com">admin@findmetechie.com</a> and we’ll get back to you shortly.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Tab pane -->
        <div role="tabpanel" class="tab-pane" id="profile">
          <div class="content">
            <div class="line_question">
              <div class="question">
                <p>How do you match Techies with Employers?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Upon receiving the employer requirements, we run a skill matching algorithm ​on​ our Techie database. Result are further fine tuned by the Project Manager for specific assignment​. PMs reconfirm availability and recommend a shortlist of profiles to the employer. Customers can seek further information and conduct Phone or Video interviews with the Techies. It is also possible to run test assignments or ask about standardized test scores from the Techies.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>How do you handle project delivery?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>FMTs differentiation lies in the additional project management support it offers to employers and tech freelancers. Our relationship with our customers begins with a Service Level Agreement (SLA) with well-defined deliverables and time-lines. Using various project management tools, our Techies follow agile engagement and project managers monitor the progress in an on-going manner.Employers have visibility in real time on both the progress and quality of the work.
</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>What customer engagement options do you have?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Our customers engage with the Techies on Full Time, Part Time and on Project basis. Given existing commitments some Techies are only available for Part Time roles or some may only undertake fixed fee projects and work on their own ​shedules​.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>Do you work with other Agencies and Companies?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>FMT caters exclusively to individual Techies. Our business model require that Techies work on our platform and our employers always have direct access to Techies they are working with.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>What should I do after I register as an employer?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Define your assignment or project. Outline your objectives, deliverables, the skills you're looking for, and required timelines.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>What is most critical part of an Freelancing engagement?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Writing a clear and concise job requirement. More you know what you need easier it will be delivered. A clear assignment requirement helps FMT PMs select right resources, and monitor deliveries as well.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>What if I'm not satisfied with the outcome?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Active on going project management ensures that you are able to see the gaps early on and initiate remedial actions along with FMT PMs. As a back stop you pay only when you are happy with the work and sig off on the delivery.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>How can I ensure that my IP is safe?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>The Master Service Agreement terms state that you own any intellectual property that you pay for, and ourTerms of Service contain default Non-Disclosure Agreement (NDA) which many clients consider sufficient for this purpose.</p>
              </div>
            </div>
             <div class="line_question">
              <div class="question">
                <p>How do I know my freelancer is accurately billing for my project?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Techie billing is fairly evolved process at FMT. We have parameters that techies are expected to match in terms of what they bill. You can evaluate your freelancer's activity through daily report which are validated by project managers and also access the work submitted in real time.</p>
              </div>
            </div>
             <div class="line_question">
              <div class="question">
                <p>Who owns the legal rights to the work or  product developed by a freelancer engaged through FMT</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>FMT Terms of Service specify that ownership of the work commisioned for and paid  by the employer always transfers to the client.</p>
              </div>
            </div>
             <div class="line_question">
              <div class="question">
                <p>How do I pay my freelancer and what does it cost?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>You make payments to FMT as per the price agreed according to your project scope and budget. FMT makes payments to freelancers. FMT Invoices contain instructins for making payments as per payment mechanism suitable to you.</p>
              </div>
            </div>
             <div class="line_question">
              <div class="question">
                <p>How often will I be charged?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Billing frequency is agreed at the time of signing agreements. Most customers pay on weekly or monthly basis depending upoin the credit assigned to them by FMT. Fixed-price projects are divided into agreed-upon milestones and payments are expected accordingly.</p>
              </div>
            </div>
             <div class="line_question">
              <div class="question">
                <p>Can I get an official invoice?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Yes, all payments to freelancers are through FMT invoices that can be downloaded or printed.</p>
              </div>
            </div>
             <div class="line_question">
              <div class="question">
                <p>Do I have to file tax forms for my freelancer?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>You are not responsible for filing 1099-MISC forms for your freelancer. They are not your employees. Your contract is with FMT and all your obligations are over with payment to FMT as per agreed terms.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>What do I look for in a freelancer?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Most clients look for freelancers who have 1. The skills to get your job done and 2. Relevant experience in delivering similar projects.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Tab pane -->
        <div role="tabpanel" class="tab-pane" id="messages">
          <div class="content">
            <div class="line_question">
              <div class="question">
                <p>Do you display all Techie profiles on the website?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>1. ​No. FMT does not display individuals techie profiles with identifying details and photographs on the website.<br />
​2. ​We list only Skil​l​ and experience profiles on the platform. Personal details are only shared at the time of interviews or assigning the work, till then FMT PMs and potential employers work through FMT IDs only. </p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>How do you ensure privacy of Techie profiles?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>Upon receiving a Techie profile, each Techie is given a unique FindMeTechie (FMT) ID, which is displayed on the website along with the skill-set. Personal details such as Name, Email, Phone, Company or address are not displayed for public viewing.</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>How do I get started freelancing through FMT?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>​1. ​All you need to get started are Tech skills that are relevant to our employers.<br />

​2. ​Your next step is creating an outstanding freelancer profile to showcase your capabilities. This shucked highlight, Professional skills, experience, and portfolio Education and accomplishments Online skills test results<br />

​3. ​The best profiles are complete, well-written, error-free, and feature a professional, friendly-looking picture. (Complete profiles and photographs are not shared on website)</p>
              </div>
            </div>
            <div class="line_question">
              <div class="question">
                <p>What’s the best way to work with an employer at FMT?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>In many ways, working with a employer online through FMT  is just like working with any other client you may have worked with.</p>
                <p>To be successful, you should choose work you're qualified for, communicate well with your  project manager and the client and take the time to build a good working relationship. </p>
                <p>1. ​Select your projects and clients carefully <br />
When you interview for  project do ask questions about the project and what result is expected.
Be sure the needs of the job are in line with the desired deadline, and fits into your availability and schedule. Do not get into projects you are not confident of extending your best. </p>
<p>2. ​Communicate and post regular updates <br />
Be proactive. Even if they don't ask for it. Let them know what you're working on, and what your schedule will be for delivering work.
Respect time lines. Agree on deadlines with your client and make sure you keep them. If you won't be able to meet a deadline, inform you FMT project manager and client immediately to let them know when you'll be able to complete the work.</p>
<p>​3. ​Respond quickly and consistently. Clients may get concerned if they don't hear from a freelancer. Make them aware if you are going to be away on a vacation or there is a local holiday that will keep you away from the work. </p>
<p>​4. ​Ensure client satisfaction.<br />

Start with the first submission early on. Ask your client if the work product meets their needs.
As you submit intermediate deliverables, ensure that the client is happy with the delivery before you move on to the next step.
At the end of the contract, make sure your client has everything they should have  , take time to document minor details so the project can be continued without your active support. 
</p>
              </div>
            </div>
            
            <div class="line_question">
              <div class="question">
                <p>How do you pay your techies?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer"> 
              <p>The payment structure is mutually agreed based on the nature of engagement. Our full time Techies are paid on standard monthly basis following 40 hours workweek. If the engagement is milestone based, we pay upon satisfactory completion of each milestone. If the engagement is task based, the payment is made upon satisfactory delivery of the task and sign off.</p>
              </div>
            </div>
            
            <div class="line_question">
              <div class="question">
                <p>What kind of career growth path FindMeTechie can offer?</p>
              </div>
            </div>
            <div class="line_answer">
              <div class="answer">
                <p>FMT offers an extremely attractive alternate to jobs with run of the mill IT outsourcing or service companies. We have been able to attract, retain and manage talented IT professionals in a way that our clients continuously derive value and enhance their productivity and efficiency in their ongoing IT projects and new initiatives. FMT offers Techies to manage their own careers, work on the Technologies they like and choose the clients and projects that further their career objectives.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--tabPannel -->
    </div>
  </section>
</content>
<?php endwhile; ?>
<?php get_footer(); ?>
