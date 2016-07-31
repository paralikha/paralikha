            <div data-step="1" data-intro="Please fill out the Registration Form" role="tabpanel" class="tab-pane active" id="inquiry">
                <form id="<?php echo $options->ID ?>_reg" <?php /*action="<?php echo $options->fallbackurl ?>"*/ ?> method="POST" role="form" class="contact-form">
                    <input name="action" type="hidden" value="send_message" />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="contact[name]">Name</label>
                                <a class="btn-transparent-circle highlight pull-right white" role="button"><i class="fa fa-question-circle"></i></a>
                                <input value="<?php echo @$Name ?>" type="text" class="form-control" id="contact[name]" name="contact[name]" placeholder="Name">
                            </div>
                        </div>
                        <div data-step="3" data-intro="Also, check your email's spelling" class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="contact[email]">Email</label>
                                <input value="<?php echo @$Email ?>" type="email" class="form-control" id="contact[email]" name="contact[email]" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="contact[phone]">Phone</label>
                                <input value="<?php echo @$Phone ?>" type="text" class="form-control input-medium bfh-phone" data-format="+63 ddd-ddd dddd" id="contact[phone]" name="contact[phone]" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div data-step="2" data-intro="<strong>Important:</strong> Select your desired course" class="row courses-offered">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="contact[subject]">Course to Register to</label>
                                <select multiple name="contact[course][]" class="selectpicker form-control course-picker" title="Courses" data-live-search="true" data-header="Select Course and Course Level">
                                    <optgroup data-max-options="1" label="HiCPTA" data-subtext="The Certificate to Training Success">
                                        <option title="HiCPTA | Basic" value="HiCPTA | Basic HiCPTA Certificate of Attainment (CU1 - CU4)" data-subtext="HiCPTA Certificate of Attainment (CU1 - CU4)">Basic</option>
                                        <option title="HiCPTA | Advanced" value="HiCPTA | Advanced HiCPTA (CU1 - CU7)" data-subtext="HiCPTA (CU1 - CU7)">Advanced</option>
                                        <option title="HiCPTA | Master" value="HiCPTA | Master Trainer - Design and Develop a Competency-Based Blended Learning Program (CU1 - CU8)" data-subtext="Design and Develop a Competency-Based Blended Learning Program (CU1 - CU8)">Master Trainer</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="contact[note]">Note</label>
                                <textarea id="contact[note]" class="form-control" name="contact[note]" placeholder="Any message or inquiry..." rows="2"><?php echo @$Note ?></textarea>
                            </div>
                            <button data-step="4" data-intro="Then when your through, click the register button. Got it? Thanks." type="submit" name="contact[submit]" class="pull-right ladda-button btn btn-gold btn-lg text-uppercase progress-button" data-style="expand-left">Register</button>
                        </div>
                    </div>
                </form>
            </div>
