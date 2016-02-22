<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-no-p contact-details">
            <div class="p-50">

                <div class="form-content col-sm-8 col-sm-offset-2">
                    <h2>$Title</h2>
                </div>

                <div class="clearfix"></div>

                <% with $SiteConfig %>
                <!-- Contact Information -->
                <div class="contact-address">
                    <!-- Street -->
                    <div data-sr="enter top over 1s and move 65px" class="col-sm-4x text-center">
                        <p><span class="icon-map"></span></p>
                        <span><b>Location</b></span>
                        <address>
                            <small>$Address</small>
                        </address>
                    </div>

                    <!-- Phone -->
                    <div data-sr="enter top over 1s and move 65px" class="col-sm-4x text-center">
                        <p><span class="icon-phone"></span></p>
                        <span><b>Phone</b></span>
                        <address>
                            <small>$Phone</small>
                        </address>
                    </div>

                    <!-- Email -->
                    <div data-sr="enter top over 1s and move 65px" class="col-sm-4x text-center">
                        <p><span class="icon-envelope"></span></p>
                        <span><b>Email</b></span>
                        <address>
                            <small><a href="mailto:$Email">$Email</a></small>
                        </address>
                    </div>
                </div>
                <% end_with %>

                <%-- <div class="clearfix"></div>

                <!-- Contact Form -->
                <div data-sr="enter bottom over 1s and move 100px" class="contact-form">
                    <div class="form-content col-sm-8 col-sm-offset-2">
                        <h2>Say Hello</h2>
                    </div>
                    <div id="contact-form">
                        <div class="col-sm-12 text-center" id="contact">
                            <div id="message"></div>
                            <form method="post" action="contact.php" name="contactform" id="contactform">
                                <fieldset>
                                    <!-- Name Input -->
                                    <div class="col-sm-6">
                                        <input name="name" type="text" id="name" size="30" value="" placeholder="Name"/>
                                    </div>
                                    <!-- Phone Input -->
                                    <div class="col-sm-6">
                                        <input name="phone" type="text" id="phone" size="30" value="" placeholder="Phone"/>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <!-- Test Area -->
                                        <div class="contact-form-text">
                                            <textarea name="comments" cols="40" rows="3" id="comments" placeholder="Message"></textarea>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="contact-form-btn">
                                            <input type="submit" class="btn btn-black" id="submit" value="Submit" />
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div> --%>

            </div>
        </div>

        <!-- Google Maps -->
        <div class="col-sm-6 col-no-p">
            <div id="map-canvas"></div>
        </div>

    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
