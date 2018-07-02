<?php $this->template->header(); ?>

<div class="page">
        <div class="page-main">
            <?php $this->get('header') ?>

            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning"><b>T-Rex was developed to you develop FASTER!!</b></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-wrap p-lg-6">
                                        <h1 class="mt-0 mb-4">Welcome to T-REX</h1>
                                        <hr>

                                        <p>We're implementing Tabler!</p>

                                        <pre><?php var_dump($this->data) ?></pre>

                                        <div class="d-flex align-items-center pt-5 mt-auto">
                                            <div class="avatar avatar-md mr-3" style="background-image: url(https://avatars0.githubusercontent.com/u/12994414?s=460&v=4)"></div>
                                            <div>
                                                <a href="https://github.com/samuelfaj" class="text-default" data-toggle="tooltip" data-placement="top" title="See my Github!">
                                                    Samuel Fajreldines
                                                </a>
                                                <small class="d-block text-muted">3 days ago</small>
                                            </div>
                                            <div class="ml-auto text-muted">
                                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->template->footer(); ?>
