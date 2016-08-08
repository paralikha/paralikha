<button id="quote" class="btn btn-link text-uppercase pinned-link pinned-bottom-left" data-target="#modal-quoteform" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-quote-left hidden-md-up">&nbsp;</i><span class="hidden-xs-down">Request a Quote</span></button>

<div id="modal-quoteform" class="modal fade animated bounceInUp animated-fast">
    <div class="modal-dialog modal-plain modal-dialog-fluid bg-secondary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <h1 class="modal-title">Request a Quote</h1>
                </div>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <form action="send_message" method="POST">
                                <fieldset>
                                    <legend class="sr-only">Information</legend>
                                    <p>Send us a message, give us a shoutout. Let us know what's on your mind.</p>
                                </fieldset>
                                <fieldset class="row">
                                    <legend class="sr-only">Personal Details</legend>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="sr-only col-form-label">Name</label>
                                            <input id="name" type="text" placeholder="Name" class="form-control-outline form-control-outline-secondary">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="sr-only col-form-label">Email</label>
                                            <input id="email" type="email" name="email" class="form-control-outline form-control-outline-secondary" placeholder="Email">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                    <legend class="sr-only">Message</legend>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="subject" class="sr-only col-form-label">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control-outline form-control-outline-secondary" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message" class="sr-only col-form-label">Message</label>
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" class="form-control-outline form-control-outline-secondary"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline btn-outline-secondary pull-xs-right">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <address class="sidebar">
                                <h2 class="sr-only sidebar-title">Sidebar</h2>
                                <h3 class="sidebar-subtitle">Email</h3>
                                <p><a href="mailto:paralikha@ssagroup.com">paralikha@ssagroup.com</a></p>
                                <h3 class="sidebar-title">Telephone</h3>
                                <p><a href="tel:+639235003433">+63 923 500 3433</a></p>
                                <h3 class="sidebar-subtitle">Address</h3>
                                <p>Units 1103-1106 11/F
                                Tycoon Centre, Pearl Drive St.,
                                Ortigas Center, Pasig City
                                Philippines</p>
                                <ul class="social-menu">
                                    <li><a href="#facebook" class="btn btn-circle"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="close close-center" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>