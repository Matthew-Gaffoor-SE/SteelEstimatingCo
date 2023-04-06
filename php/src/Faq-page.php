<?php
    include_once "header.php";
    require_once 'includes/conn.inc.php';
?>
    <header class="header-body">

        <div class="profile-box">
            <div class="Faq-box-container">
                <section>
                    <h1 class="faq-title">FAQs</h1>

                    <div class="faq">
                        <div class="question">
                            <h3>How do i change my email address?</h3>

                            <svg width="15" height="10" viewbox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" fill="transparent" stroke-width="10" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p class="answer-text">
                                Unfortunatly with Email addresses being unique the only way to change it would
                                be to contact an admin to confirm your identity then they will hande the change.
                            </p>
                        </div>
                    </div>
                    <div class="faq">
                        <div class="question">
                            <h3>Can i refuse an offer?</h3>

                            <svg width="15" height="10" viewbox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" fill="transparent" stroke-width="10" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p class="answer-text">
                                A job will only start once both parties are happy with the quotes. Once you post
                                for a job, an estimator will message you with an offer and if you accept only then
                                will the progress start.
                            </p>
                        </div>
                    </div>
                    <div class="faq">
                        <div class="question">
                            <h3>I cant find my previous jobs?</h3>

                            <svg width="15" height="10" viewbox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" fill="transparent" stroke-width="10" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p class="answer-text">
                                If you go to jobs -> show all jobs there you can search for the desired job or
                                if you search nothing it will display all jobs in that section.
                            </p>
                        </div>
                    </div>
                    <div class="faq">
                        <div class="question">
                            <h3>How do i know i can trust the estimator?</h3>

                            <svg width="15" height="10" viewbox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" fill="transparent" stroke-width="10" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p class="answer-text">
                                All our estimators are CRB checked and when you partake in a job you can view their details
                                and the progress of your connected job. If any issues were to arise we will ensure your details
                                and funds are safe.
                            </p>
                        </div>
                    </div>
                    <div class="faq">
                        <div class="question">
                            <h3>How do i get in touch with issues?</h3>

                            <svg width="15" height="10" viewbox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" fill="transparent" stroke-width="10" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p class="answer-text">
                                In the header bar you can find the link to get in touch. filling out that and submitting that
                                form will automatically send to the business owner for review. We will normally reply within 24
                                hours
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="footer-info">
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>HOW TO FIND US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>ABOUT US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>FREQUENTLY ASKED QUESTIONS</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>Privacy & Cookies</div>
        </div>
    </header>
</body>
<script>
    const faqs = document.querySelectorAll(".faq");

    faqs.forEach(faq => {
        faq.addEventListener("click", () => {
            faq.classList.toggle("active");
        });
    });
</script>
</html>