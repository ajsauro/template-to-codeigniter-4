<?= $this->extend('master') ?>
<?= $this->section('content') ?>
<section class="vh-100 gradient-custom">
    <div class="container h-100 bg-gray">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration bg-teal" style="border-radius: 15px;">
                    <span class="text text-danger"><?php echo session()->get('user_not_created'); ?></span>
                    <?php if (!session()->has('auth')) : ?>
                        <div class="card-body p-1 p-md-4">
                            <h3 class="mb-2 pb-2 pb-md-0">Registration Form</h3>
                            <hr>
                            <form action="<?= url_to('register.store'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <span class="text text-bg-danger"><?php echo session()->get('errors')['firstName'] ?? ''; ?></span>
                                            <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" value="Antonio" />
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <span class="text text-bg-danger"><?= session()->get('errors')['lastName'] ?? ''; ?></span>
                                            <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" value="João" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <span class="text text-bg-danger"><?= session()->get('errors')['email'] ?? ''; ?></span>
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="emerson83@r7.com" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <span class="text text-bg-danger"><?= session()->get('errors')['password'] ?? ''; ?></span>
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" value="123" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <h6 class="mb-2 pb-1">Gender: </h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="1" checked />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="2" />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender" value="3" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="mt-2 mb-0">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="text fs-2 p-2 text-bg-info text-center">You are alread logged in | <a href="/logout">Logout</a>.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>