<?php

$user  = new Applications();
if($user->isLoggedIn()){ ?>


        <h4>Please log out to continue application.</h4>
        <a href="<?php echo SITE_URL; ?>/login/logout"  class="btn btn-primary" >Log Out</a>

<?php    return;
}

?>


<script type="text/javascript">
    var RecaptchaOptions = {
        lang : 'en',
        theme : 'custom',
        custom_theme_widget: 'recaptcha_widget'
    };
</script>


    <?php
    if(Session::exists('form_error')){
        $ERRORRS = Session::flush('form_error');
        foreach ($ERRORRS as $err){
            echo $err.'<br>';
        }
    }
    ?>


    <div class="col-md-12 text-center">
        <h3>Online Application Form</h3> <br/>
    </div>
    <form action="<?php echo SITE_URL; ?>/apply/run"  method="post" class="form-horizontal" >


        <table class="table table-bordered apply-table">

            <tbody>
                <tr>
                    <th colspan="2" class="apply-heading">Admission Info</th>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td>
                        <select name="semester">
                            <option value="1">Autumn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td>
                        <select name="program">
                            <option selected="selected" value="">Select</option>
                            <option value="1">Bachelor of Business Administration (BBA)</option>
                            <option value="2">BSS in Economics</option>
                            <option value="3">BA in English</option>
                            <option value="4">LLB (Hons)</option>
                            <option value="5">B.Sc. in CSE</option>
                            <option value="6">B.Sc. in ICE</option>
                            <option value="7">B.Sc. in ETE</option>
                            <option value="8">B.Sc. in EEE</option>
                            <option value="9">BS in Applied Statistics</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>


        <table class="table table-bordered apply-table">
            <tbody>
            <tr>
                <th colspan="2" class="apply-heading">Personal Information</th>
            </tr>
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="name" class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td>
                    <input type="text" name="father"  class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Mother's Name</th>
                <td>
                    <input type="text" name="mother" class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                    <select name="gender" >
                        <option selected="selected" value="">Select</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>
                    <input type="text" name="dob" class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Cell Phone</th>
                <td>
                    <input type="text" name="mobile" class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" name="email"  class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>
                    <input type="text" name="nationality" class="apply-input" />
                </td>
            </tr>
            <tr>
                <th>Present Adress</th>
                <td>
                    <textarea name="present" cols="40" rows="4"></textarea>
                </td>
            </tr>
            <tr>
                <th>Permanent Adress</th>
                <td>
                    <textarea name="permanent" cols="40" rows="4"></textarea>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="table table-bordered apply-table">
            <thead>
                <tr>
                    <th colspan="7" class="apply-heading">Academic History</th>
                </tr>
                <tr>
                    <th>Exam</th>
                    <th>Institution</th>
                    <th>Roll</th>
                    <th>Passing Year</th>
                    <th>Group</th>
                    <th>Board</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>S.S.C/O-Level</td>
                    <td><input type="text" name="ssc-school" /></td>
                    <td ><input type="text" name="ssc-roll" style="width: 90px;" /></td>
                    <td><input type="text" name="ssc-year"  style="width: 75px;"/></td>
                    <td>
                        <select type="text" name="ssc-group" >
                            <option selected="selected" value="">Select</option>
                            <option value="1">Science</option>
                            <option value="2">Humanities</option>
                            <option value="3">Business Studies</option>
                        </select>
                    </td>
                    <td>
                        <select type="text" name="ssc-board" >
                            <option selected="selected" value="">Select</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Rajshahi</option>
                            <option value="3">Chittagong</option>
                            <option value="4">Comilla</option>
                            <option value="5">Jessore</option>
                            <option value="6">Barisal</option>
                            <option value="7">Sylhet</option>
                            <option value="8">Dinajpur</option>
                            <option value="9">Other</option>
                            <option value="10">Madrasah</option>
                            <option value="11">Technical-HSC(Vocational)</option>
                            <option value="12">Technical-HSC(Business Management)</option>
                            <option value="13">Technical-Diploma in Commerce</option>
                            <option value="14">Diploma in Business Studies</option>
                        </select>
                    </td>
                    <td><input type="number" name="ssc-gpa" style="width: 70px;" /></td>
                </tr>

                <tr>
                    <td>H.S.C/A-Level</td>
                    <td><input type="text" name="hsc-school" /></td>
                    <td><input type="text" name="hsc-roll" style="width: 90px;" /></td>
                    <td><input type="text" name="hsc-year" style="width: 75px;" /></td>
                    <td>
                        <select type="text" name="hsc-group" >
                            <option selected="selected" value="">Select</option>
                            <option value="1">Science</option>
                            <option value="2">Humanities</option>
                            <option value="3">Business Studies</option>
                        </select>
                    </td>
                    <td>
                        <select type="text" name="hsc-board" >
                            <option selected="selected" value="">Select</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Rajshahi</option>
                            <option value="3">Chittagong</option>
                            <option value="4">Comilla</option>
                            <option value="5">Jessore</option>
                            <option value="6">Barisal</option>
                            <option value="7">Sylhet</option>
                            <option value="8">Dinajpur</option>
                            <option value="9">Other</option>
                            <option value="10">Madrasah</option>
                            <option value="11">Technical-HSC(Vocational)</option>
                            <option value="12">Technical-HSC(Business Management)</option>
                            <option value="13">Technical-Diploma in Commerce</option>
                            <option value="14">Diploma in Business Studies</option>
                        </select>
                    </td>
                    <td><input type="number" name="hsc-gpa" style="width: 70px;" /></td>
                </tr>

            </tbody>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr><th class="apply-heading"></th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="agree" /> I certify that all the above mentioned information in the form is correct. In case of any fraudulent data East West University, Bangladesh  reserves the right to cancel the admission at any time.
                    </td>
                </tr>
                <tr>
                    <td>

                        <!-- Google Recaptcha -->
                        <div id="recaptcha_widget" style="display:none">
                            <div id="recaptcha_image"></div>
                            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" placeholder="type the words above" class="validate[required]" data-prompt-position="bottomRight:0,12" /><br/>
                            <input type="button" value="" class="v-btn" id="var-btn" style="cursor:default;display:none;" />
                            <a  title="Get a new challenge" href="javascript:Recaptcha.reload()"><img style="background:#0988CB;border-radius:3px;" src="<?php echo SITE_URL; ?>/public/img/reload.png" alt="Get a new challenge"></a>
                            <a  href="javascript:Recaptcha.showhelp()"><img style="background:#0988CB;border-radius:3px;" src="<?php echo SITE_URL; ?>/public/img/help.png" alt="Get a new challenge"></a>
                            <img src="http://www.google.com/recaptcha/api/img/clean/logo.png" id="recaptcha_logo" alt="" style="height:36px; width:71px; margin-left:50px;" />
                        </div>

                        <script type="text/javascript"
                                src="http://www.google.com/recaptcha/api/challenge?k=6LeMXwoTAAAAAA0gW3cRzwrtlLT1tQmaCAkVynG5">
                        </script>
                        <noscript>
                            <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeMXwoTAAAAAA0gW3cRzwrtlLT1tQmaCAkVynG5"height="300" width="500" frameborder="0"></iframe><br>
						   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
						   </textarea>
                            <input type="hidden" name="recaptcha_response_field"value="manual_challenge">
                        </noscript>
                        <!--   ***********       -->

                    </td>
                </tr>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
                <tr>

                    <td><input type="submit" class="btn btn-primary" value="Submit Application" /></td>
                </tr>
            </tbody>
        </table>





    </form>

