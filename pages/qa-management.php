<!-- <section class="page-intro"><p class="eyebrow">WORKSPACE / MANAGEMENT</p><h1>Quality from planning<br>to <span>release readiness.</span></h1><p class="lead">A practical combination of management discipline and hands-on technical understanding.</p></section>
<section class="editorial-list management-list">
<?php $items = [
['Test planning & strategy','Reviewing scope, requirements, dependencies, risks, environments, timelines, and entry/exit criteria to establish a realistic test approach.'],
['Resource & task coordination','Distributing work by business flow and priority, monitoring capacity, following up progress, and making ownership clear across the team.'],
['Execution & defect control','Monitoring coverage and execution, reviewing test evidence, validating defects, coordinating retests, and escalating blockers with context.'],
['Reporting & release support','Summarizing pass/fail status, outstanding defects, risks, dependencies, and readiness considerations so stakeholders can make informed decisions.']
]; foreach ($items as $i=>$item): ?>
<article class="editorial-row"><div class="row-meta"><span><?= sprintf('%02d',$i+1) ?></span><small>QA DELIVERY</small></div><div class="row-content"><h2><?= e($item[0]) ?></h2><p><?= e($item[1]) ?></p></div></article>
<?php endforeach; ?></section>
<section class="process-strip"><p class="eyebrow">HOW I STRUCTURE QA DELIVERY</p><div>Understand requirements <b>→</b> Assess risks <b>→</b> Plan & prepare <b>→</b> Execute & monitor <b>→</b> Report & improve</div></section>
<p class="confidential-note">This page describes QA management practices. Add anonymized artifacts and verified outcomes before public release.</p> -->

<link rel="stylesheet" href="assets/css/management.css">
<div class="page-intro management-intro">
    <div class="eyebrow">LEADERSHIP &amp; DELIVERY</div>
    <h2>Management</h2>
    <p class="lead">How I lead, organize, and ensure quality in software development through effective QA management, team coordination, and continuous improvement.</p>
</div>

<section class="management-section" aria-labelledby="agile-workflow-title">
    <div class="management-section-heading">
        <div>
            <div class="eyebrow">MY APPROACH</div>
            <h2 id="agile-workflow-title">QA Lead Workflow in Scrum / Agile</h2>
        </div>
        <p>My end-to-end QA management workflow throughout the Agile development lifecycle, from planning to release, in collaboration with the Scrum team.</p>
    </div>

    <div class="qa-workflow">
        <div class="qa-workflow-line" aria-hidden="true"></div>

        <article class="qa-workflow-step">
            <div class="qa-step-content qa-step-empty"></div>
            <div class="qa-step-marker"><span>01</span></div>
            <div class="qa-step-content">
                <div class="qa-step-card">
                    <h3><span>▣</span> Preparation</h3>
                    <ul>
                        <li>Review user stories and acceptance criteria</li>
                        <li>Identify risks and testing needs</li>
                        <li>Define QA strategy and test plan</li>
                        <li>Align scope, timeline, and resources with the Scrum team</li>
                    </ul>
                </div>
                <div class="qa-step-doc"><strong>Key outputs</strong><span>Test Plan</span><span>Test Dashboard</span></div>
            </div>
        </article>

        <article class="qa-workflow-step">
            <div class="qa-step-content">
                <div class="qa-step-card">
                    <h3><span>▱</span> Design</h3>
                    <ul>
                        <li>Review and ensure testability in UI/UX and system design</li>
                        <li>Define test approach</li>
                        <li>Plan regression testing for existing features</li>
                    </ul>
                </div>
                <div class="qa-step-doc"><strong>Key outputs</strong><span>UI Standards &amp; Guidelines</span><span>Existing Bug Report</span></div>
            </div>
            <div class="qa-step-marker"><span>02</span></div>
            <div class="qa-step-content qa-step-empty"></div>
        </article>

        <article class="qa-workflow-step">
            <div class="qa-step-content qa-step-empty"></div>
            <div class="qa-step-marker"><span>03</span></div>
            <div class="qa-step-content">
                <div class="qa-step-card">
                    <h3><span>&lt;/&gt;</span> Development</h3>
                    <ul>
                        <li>Design and prepare test scenarios and test data</li>
                        <li>Set up and maintain test environment</li>
                        <li>Monitor testing progress (coverage, defects, blockers)</li>
                    </ul>
                </div>
                <div class="qa-step-doc"><strong>Key outputs</strong><span>Test Scenario / Test Case</span><span>Test Data</span><span>Environment Readiness</span></div>
            </div>
        </article>

        <article class="qa-workflow-step">
            <div class="qa-step-content">
                <div class="qa-step-card">
                    <h3><span>⚗</span> Testing</h3>
                    <ul>
                        <li>Lead test execution</li>
                        <li>Coordinate functional, integration, regression, API, and performance testing</li>
                        <li>Manage and track defects in JIRA</li>
                    </ul>
                </div>
                <div class="qa-step-doc"><strong>Key outputs</strong><span>Defect / Error List</span><span>API Documentation</span><span>Performance Test Report</span></div>
            </div>
            <div class="qa-step-marker"><span>04</span></div>
            <div class="qa-step-content qa-step-empty"></div>
        </article>

        <article class="qa-workflow-step">
            <div class="qa-step-content qa-step-empty"></div>
            <div class="qa-step-marker"><span>05</span></div>
            <div class="qa-step-content">
                <div class="qa-step-card">
                    <h3><span>♧</span> Review</h3>
                    <ul>
                        <li>Review test results with the Scrum team (Developers, BA, PO)</li>
                        <li>Validate fixes and retest</li>
                        <li>Prepare test summary report</li>
                        <li>Analyze defect trends and quality metrics</li>
                    </ul>
                </div>
            </div>
        </article>

        <article class="qa-workflow-step">
            <div class="qa-step-content">
                <div class="qa-step-card">
                    <h3><span>➤</span> Release</h3>
                    <ul>
                        <li>Validate release readiness based on quality standards</li>
                        <li>Monitor post-release issues</li>
                        <li>Provide improvement recommendations and lessons learned</li>
                    </ul>
                </div>
                <div class="qa-step-doc"><strong>Key outputs</strong><span>QA Test Report</span><span>Release Readiness</span></div>
            </div>
            <div class="qa-step-marker"><span>06</span></div>
            <div class="qa-step-content qa-step-empty"></div>
        </article>
    </div>
</section>

<section class="management-role-strip">
    <div class="management-role-heading">
        <div class="eyebrow">TEAM CONTRIBUTION</div>
        <h2>My Role in the Scrum Team</h2>
    </div>
    <p>Act as QA Lead who ensures quality is built in throughout the sprint by planning, coordinating, and driving testing activities in collaboration with the Product Owner, Scrum Master, Developers, and Business stakeholders.</p>
    <div class="management-deliverables">
        <h3>Key Deliverables</h3>
        <ul>
            <li>QA Strategy &amp; Test Plan</li>
            <li>Test Report &amp; Quality Metrics</li>
            <li>Test Scenario &amp; Test Case</li>
            <li>Release Readiness Validation</li>
            <li>Test Execution &amp; Defect Management</li>
            <li>Improvement &amp; Lessons Learned</li>
        </ul>
    </div>
</section>

<section class="management-competencies-section">
    <div class="management-section-heading">
        <div>
            <div class="eyebrow">LEADERSHIP CAPABILITIES</div>
            <h2>Management Competencies</h2>
        </div>
        <p>My key management capabilities to ensure effective, efficient, and high-quality QA delivery.</p>
    </div>

    <div class="management-competency-grid">
        <article class="management-competency panel">
            <span class="management-competency-icon">◎</span>
            <h3>QA Strategy &amp; Governance</h3>
            <p>Define QA strategy, standards, SOPs, and quality guidelines.</p>
            <div class="management-example"><strong>Example in practice</strong><p>Established QA department operations by developing SOPs, defining testing standards, and setting quality measurement criteria.</p></div>
            <a class="text-link" href="index.php?page=documentation">Related documentation ↗</a>
        </article>

        <article class="management-competency panel">
            <span class="management-competency-icon">♧</span>
            <h3>Team &amp; Resource Management</h3>
            <p>Coordinate the QA team, assign tasks, manage workload, and drive team performance.</p>
            <div class="management-example"><strong>Example in practice</strong><p>Coordinated Trade Finance testing activities and managed the distribution and progress of approximately 6,000 test scenarios across LC, Bank Guarantee, and Trade Finance.</p></div>
            <a class="text-link" href="index.php?page=documentation">Related documentation ↗</a>
        </article>

        <article class="management-competency panel">
            <span class="management-competency-icon">▦</span>
            <h3>Test Planning &amp; Delivery</h3>
            <p>Plan testing activities, define scope and timeline, coordinate SIT/UAT, and ensure release readiness.</p>
            <div class="management-example"><strong>Example in practice</strong><p>Prepared test plans and schedules, reviewed business requirements, coordinated SIT/UAT, and prepared test data using SQL.</p></div>
            <a class="text-link" href="index.php?page=documentation">Related documentation ↗</a>
        </article>

        <article class="management-competency panel">
            <span class="management-competency-icon">▥</span>
            <h3>Quality Monitoring &amp; Performance</h3>
            <p>Define KPIs, monitor test coverage and defect metrics, maintain quality dashboards, and report progress.</p>
            <div class="management-example"><strong>Example in practice</strong><p>Monitored execution results for approximately 6,000 Trade Finance scenarios, tracked pass/fail/drop status, and supported performance testing using JMeter.</p></div>
            <a class="text-link" href="index.php?page=documentation">Related documentation ↗</a>
        </article>

        <article class="management-competency panel">
            <span class="management-competency-icon">⬡</span>
            <h3>Risk &amp; Issue Management</h3>
            <p>Identify risks, prioritize defects, escalate blockers, and drive mitigation plans.</p>
            <div class="management-example"><strong>Example in practice</strong><p>Logged and tracked defects in JIRA during SIT/UAT, coordinated issue clarification, followed up unresolved defects, and supported regression after fixes.</p></div>
            <a class="text-link" href="index.php?page=documentation">Related documentation ↗</a>
        </article>

        <article class="management-competency panel">
            <span class="management-competency-icon">⌁</span>
            <h3>Stakeholder Collaboration</h3>
            <p>Work closely with Developers, BA, PO, PM, and Business Users to align quality and delivery goals.</p>
            <div class="management-example"><strong>Example in practice</strong><p>Collaborated with technical and business teams to clarify requirements, review UAT results and evidence, validate fixes, and communicate testing status.</p></div>
            <a class="text-link" href="index.php?page=documentation">Related documentation ↗</a>
        </article>
    </div>
</section>
