<section class="page-intro"><p class="eyebrow">WORKSPACE / DOCUMENTATION</p><h1>Making quality<br><span>visible and traceable.</span></h1><p class="lead">Examples of documentation used to plan, execute, monitor, and communicate testing.</p></section>
<section class="editorial-list">
<?php $docs = [
['TP','Test Plan','Scope, objectives, approach, environment, schedule, risks, dependencies, and exit criteria.'],
['TC','Test Scenarios & Cases','Business-flow coverage, preconditions, test data, execution steps, expected results, and traceability.'],
['DR','Defect Reports','Reproducible steps, actual and expected results, severity, priority, evidence, and retest status.'],
['TS','Test Summary Reports','Execution status, pass/fail trends, defect position, residual risks, and recommendations.'],
['RT','Risk & Issue Tracking','Testing dependencies, environment constraints, blockers, owners, mitigation, and follow-up actions.'],
['API','API Test Collections','Request examples, positive and negative cases, reusable assertions, and execution results.']
]; foreach ($docs as $doc): ?>
<article class="editorial-row doc-editorial"><div class="doc-code"><?= e($doc[0]) ?></div><div class="row-content"><h2><?= e($doc[1]) ?></h2><p><?= e($doc[2]) ?></p></div><span class="doc-status">SAMPLE / PLANNED</span></article>
<?php endforeach; ?></section>
<p class="confidential-note">Public sample documents can be added after sensitive business information and organization-specific details have been removed.</p>
