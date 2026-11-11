<?php
$name = trim((string)($profile['display_name'] ?? ''));
if ($name === '' || $name === 'Your Name') $name = '- Since 2020';
$summary = trim((string)($profile['summary'] ?? ''));
if ($summary === '' || str_contains($summary, 'Replace with')) {
  $summary = 'A quality assurance professional with a foundation in software development and system analysis, connecting business requirements, technical implementation, and structured testing to help teams deliver reliable software.';
}

$aboutStats = [
    [
        'value' => '6+',
        'label' => 'YEARS OF EXPERIENCE',
        'detail' => 'Software development, system analysis & quality assurance'
    ],
    [
        'value' => '20+',
        'label' => 'FEATURED PROJECTS',
        'detail' => 'Enterprise projects across banking, finance & business systems'
    ],
    [
        'value' => '5,000+',
        'label' => 'TEST SCENARIOS',
        'detail' => 'Designed, Manage and Executed Test Case'
    ],
];
?>
<section class="page-intro about-intro">
  <div><p class="eyebrow">ABOUT</p><h1>QA Engineer <span>Anisa Almahfudi.</span></h1>
  <strong style="margin-top:40px; color:#77756f">Quality Engineering · System Integration · QA Leadership</strong>
</div>
  <p class="intro-statement">Connecting the dots between business needs and software quality - Quality is not just a final check, It is built into every step.</span></p>
</section>
<link rel="stylesheet" href="assets/css/style.css">
<section class="about-highlights"
             aria-label="Professional highlights">

        <?php foreach ($aboutStats as $stat): ?>

            <article class="about-highlight">

                <span class="about-highlight-label">
                    <?= htmlspecialchars(
                        $stat['label'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </span>

                <strong>
                    <?= htmlspecialchars(
                        $stat['value'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </strong>

                <small>
                    <?= htmlspecialchars(
                        $stat['detail'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </small>

            </article>

        <?php endforeach; ?>

    </section>
<section class="about-bio editorial-rule">
  <figure class="portrait">
    <div class="portrait-placeholder"><span>QA</span><small>YOUR PROFESSIONAL PORTRAIT</small></div>
    <figcaption><span> <?= e(strtoupper($name)) ?> </span><span>BASED IN JAKARTA-INDONESIA</span></figcaption>
  </figure>
  <div class="bio-copy">
    <h2>A little about my work</h2>
    <p> My professional journey began in software development, where I learned how applications are structured, built, and connected. I later moved into system analysis, translating business needs into functional requirements and technical specifications.</p>
    <p>Since 2023, my focus has shifted to Quality Assurance. Combining my development, analysis, and testing experience allows me to look beyond individual test cases—to understand the complete flow, identify risks earlier, and make quality a shared responsibility throughout delivery.</p>
    <p>Each role has given me a different perspective: how applications are built, how business needs are translated into systems, and how to validate that delivered solutions work as intended.</p>
    <p> Today, as a QA Lead, I lead and coordinate a team of five QA members, overseeing test planning, scenario design, execution monitoring, defect management, stakeholder communication, and quality reporting across enterprise projects. I also evaluate testing results, assess release readiness, and make Go/No-Go decisions to support production deployment.</p>
  </div>
</section>


<section class="career-perspective">

    <div class="career-header">
        <span class="career-eyebrow">
            CAREER PERSPECTIVE
        </span>

        <span class="career-index">
            MY JOURNEY
        </span>
    </div>

    <!-- <h2 class="career-title">
        From building software to
        ensuring its quality.
    </h2> -->

    <!-- <p class="career-description">
        A career shaped by understanding how software
        is developed, how business requirements become
        systems, and how quality is maintained throughout
        the process.
    </p> -->

    <div class="career-timeline">

        <article class="career-stage">
            <span class="career-year">2020</span>
            <span class="career-role">DEVELOPER</span>
            <p class="career-stage-description">
                Full-stack development using PHP and .NET,
                Scrum practices, Git version control,
                and CI/CD workflow management.
            </p>
        </article>

        <span class="career-arrow">&rarr;</span>

        <article class="career-stage">
            <span class="career-year">2021</span>
            <span class="career-role">SYSTEM ANALYST</span>
            <p class="career-stage-description">
                 Business requirements analysis, software
                design, system blueprints, workflow analysis,
                and database design.
            </p>
        </article>

        <span class="career-arrow">&rarr;</span>

        <article class="career-stage">
            <span class="career-year">2023 - Now</span>
            <span class="career-role">QUALITY ASSURANCE</span>
            <p class="career-stage-description">
                Leading end-to-end QA activities across various method of testing. Developing test scenarios and test plans, managing test execution and resources, establishing QA standards.
            </p>
        </article>

    </div>

</section>

<!-- PROFESSIONAL FOCUS -->
<section class="professional-focus">

    <div class="focus-header">
        <span class="focus-eyebrow">
            PROFESSIONAL FOCUS
        </span>

        <span class="focus-index">
            EXPERTISE
        </span>
    </div>

    <!-- <h2 class="focus-title">
        What I bring to software quality.
    </h2> -->

    <!-- <p class="focus-description">
        Combining technical expertise, structured testing,
        and quality leadership to deliver reliable
        software solutions.
    </p> -->

    <div class="focus-grid">

        <!-- 01 Quality Engineering -->
        <article class="focus-card">
            <!-- <span class="focus-number">01</span> -->

            <div class="focus-icon">
                <i data-lucide="shield-check"></i>
                <h2 style="margin-top:20px; margin-left:10px">Software Testing & Quality Engineering</h2>
            </div>


            <p>
                Experienced in manual, functional, performance, integration, and automation testing to ensure software reliability and quality.
            </p>

            <div class="focus-tags">
                <span>Manual Testing</span>
                <span>Performance Testing</span>
                <span>Automation Testing</span>
                <span>SIT/UAT</span>
            </div>
        </article>


        <!-- 02 System Integration -->
        <article class="focus-card">
            <!-- <span class="focus-number">02</span> -->

            <div class="focus-icon">
                <i data-lucide="workflow"></i>
                <h2 style="margin-top:20px; margin-left:10px">  System Integration</h2>
            </div>

            <p>
                Validating communication, data exchange,
                and processing across interconnected
                applications and services.
            </p>
            <div class="focus-tags">
                <span>REST API</span>
                <span>Middleware (ESB)</span>
                <span>Database Validation</span>
                <span>Scheduler & Batch</span>
            </div>
        </article>


        <!-- 03 QA Governance -->
        <article class="focus-card">
            <!-- <span class="focus-number">03</span> -->

            <div class="focus-icon">
                <i data-lucide="clipboard-check"></i>
                <h2 style="margin-top:20px; margin-left:10px">Business Process & Domain Knowledge</h2>
            </div>

            <p>
                Understanding diverse enterprise business processes, including banking, financial services, procurement, and enterprise systems.
            </p>
            <div class="focus-tags">
                <span>Procurement</span>
                <span>Banking</span>
                <span>ERP (SAP & Oracle)</span>
                <span>Finance</span>
            </div>
        </article>


        <!-- 04 Delivery & Leadership -->
        <article class="focus-card">
            <!-- <span class="focus-number">04</span> -->

            <div class="focus-icon">
                <i data-lucide="users"></i>
                <h2 style="margin-top:20px; margin-left:10px">Leadership & Collaboration</h2>
            </div>

            <p>
               Leading QA teams, establishing quality processes, managing testing activities, and collaborating with technical and business stakeholders.
            </p>
            <div class="focus-tags">
                <span>Team Leadership</span>
                <span>QA Strategy</span>
                <span>Test Management</span>
                <span>Stakeholder Collaboration</span>
            </div>
        </article>

    </div>

</section>

<!-- <section class="belief-block editorial-rule">
  <p class="eyebrow">PROFESSIONAL BELIEF / 01</p>
  <div><h2>Good quality comes from <em>clear thinking</em>, disciplined execution, and shared ownership.</h2><p>I value practical processes that help teams work with clarity: requirements that can be tested, responsibilities that are understood, evidence that can be reviewed, and risks that are communicated early.</p></div>
</section> -->
<section class="education-strip editorial-rule">
  <p class="eyebrow">EDUCATION<br><strong>2016-2020</strong></p><div><h2>Bachelor of Applied Computer</h2><p style="margin-left:-60px">State Polytechnic of Malang | Study Program: Informatics Engineering</p></div><strong>GPA 3.73 / 4.00</strong>
</section>
