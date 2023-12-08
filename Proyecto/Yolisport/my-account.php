
<div class="mdk-drawer-layout__content page">

<div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
                            <div class="bg-primary"
                                 style="min-height: 150px;">
                               <h1 style="text:center;"><center> Profile </center> <h1>
                            </div>
                        </div>


                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="tab-content">
                                        <div class="tab-pane active"
                                             id="activity">

                                            <div class="card">
                                                <div class="px-4 py-3">
                                                    <div class="d-flex mb-1">
                                                        
                                                        <div class="flex">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Email: </strong>
                                                                <small class="ml-2 "><?php echo $_SESSION['user_email'] ; ?></small>
                                                            </div>

                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Name: </strong>
                                                                <small class="ml-2 "><?php echo $_SESSION['user_name'];  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Weight: </strong>
                                                                <small class="ml-2 "><?php   echo $_SESSION['user_weight'];  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Age: </strong>
                                                                <small class="ml-2 "><?php   echo $_SESSION['user_age'];  ?></small>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <strong class="text-15pt">Contact: </strong>
                                                                <small class="ml-2 "><?php echo $_SESSION['user_contact'];  ?></small>
                                                            </div>
                                                           
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>

                    </div>