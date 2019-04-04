<?php include 'inc/header.php'; ?>
<div class="jumbotron">
  <h1 class="display-3">Last Jobs</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>

<?php foreach ($jobs as $job) : ?>
  <div class="row">
    <div class="col-d-10">
      <h4><?php echo $job->job_title; ?></h4>
        <p><?php echo $job->description; ?></p>
        </div>
        <div class="col-md-2">
          <a href="#" class="btn btn-primary">View</a>
        </div>
      </div>
    <?php endforeach; ?>

<?php include 'inc/footer.php'; ?>