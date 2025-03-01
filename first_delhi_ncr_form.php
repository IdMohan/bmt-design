     <form id="delhiNCR-form" method="post" action="getleadData"> 
        <?php $lp_bmt_name = "MBA in Delhi NCR College"; ?>
        <input type="hidden" name="lp_name" value="<?php echo $lp_bmt_name; ?>">

        <div id="main-form-section">
            <div class="dtr-form-row dtr-form-row-2col clearfix"> 
                <div class="dtr-m-5 mb-3"> 
                       <input name="user_name" type="text" placeholder="Name*"> 
                </div> 
                <div class="dtr-m-5">
                    <p class="dtr-form-field mb-2">
                        <input name="user_number" type="text" placeholder="Number*">
                    </p>
                </div> 
                <div class="dtr-m-5">
                    <p class="dtr-form-field mb-2">
                        <input name="user_email" type="text" placeholder="Email*">
                    </p>
                </div>
                <div class="dtr-form-column">
                    <input name="city_name" type="text" placeholder="City Name*" >
                </div>
                <div class="dtr-form-column">
                    <select name="course_name" >
                        <option value="">Select*</option>
                        <option value="mba">MBA</option>
                        <option value="pgdm">PGDM</option>
                        <option value="online-mba">Online MBA</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <p class="dtr-form-field">
                <input name="user_message" type="text" placeholder="Message">
            </p>

            <p class="text-center">
                <button class="dtr-btn btn-theme1 w-100" type="submit">Submit</button>
            </p>

            <div class="checkbox text-center"> 
                <span class="small"><strong>I agree to receive information regarding my submitted enquiry</strong></span> 
            </div>
        </div> 
        <div id="result"></div>
    </form>

    <form action="verifyOTP" method="post"> 
        <div id="otp-section" style="display: none;">
            <p class="text-center">
                <strong>Enter OTP sent to your mobile number</strong>
            </p>
            <p class="dtr-form-field">
                <input name="user_otp " type="text" placeholder="Enter OTP*" >
            </p>
            <p class="text-center">
                <button class="dtr-btn btn-theme1 w-100" id="verify-otp">Verify OTP</button>
            </p>
            <p class="text-center">
                <span id="otp-error" style="color: red;"></span>
            </p>
        </div>
    </form>


    <style>
        .error-message{
            color: red;
            font-size: 12px;
        }
    </style>
 
<script>
    $(document).ready(function () {
        $("#delhiNCR-form").submit(function (event) {
            event.preventDefault(); // Prevent full page reload

            let isValid = true;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let phonePattern = /^[6-9]\d{9}$/; // Indian mobile number validation

            $(".error-message").remove(); // Clear previous errors

            let name = $("input[name='user_name']").val().trim();
            let email = $("input[name='user_email']").val().trim();
            let number = $("input[name='user_number']").val().trim();
            let city = $("input[name='city_name']").val().trim();
            let course = $("select[name='course_name']").val();

            if (name === "") {
                $("input[name='user_name']").after("<span class='error-message' >Name is Required</span>");
                isValid = false;
            }

            if (email === "" || !emailPattern.test(email)) {
                $("input[name='user_email']").after("<span class='error-message' >Enter a valid email</span>");
                isValid = false;
            }

            if (number === "" || !phonePattern.test(number)) {
                $("input[name='user_number']").after("<span class='error-message'>Enter a valid mobile number</span>");
                isValid = false;
            }

            if (city === "") {
                $("input[name='city_name']").after("<span class='error-message' >City Name is </span>");
                isValid = false;
            }

            if (course === "") {
                $("select[name='course_name']").after("<span class='error-message' >Please select a course</span>");
                isValid = false;
            }

            if (!isValid) return false;

            // Submit form via AJAX
            $.ajax({
                url: "getleadData",
                type: "POST",
                data: $("#delhiNCR-form").serialize(),
                success: function (response) {
                    if (response.status === "success") {
                        $("#main-form-section").hide(); // Hide main form
                        $("#otp-section").show(); // Show OTP input
                    } else {
                        $("#result").html("<span >Error: " + response.message + "</span>");
                    }
                },
                error: function () {
                    $("#result").html("<span >Error submitting form.</span>");
                }
            });
        });

    
    
        // OTP Verification
    $("#verify-otp").click(function (event) {
        event.preventDefault();

        let otp = $("input[name='user_otp']").val().trim();

        if (otp === "" || !/^\d{4,6}$/.test(otp)) {
            $("#otp-error").text("Enter a valid OTP (4-6 digits)");
            return false;
        }

        $.ajax({
            url: "verifyOTP",
            type: "POST",
            data: { otp: otp },
            success: function (response) {
                if (response.status === "success") {
                    $("#result").html("<span style='color: green;'>OTP Verified! Form submitted successfully.</span>");
                    $("#otp-section").hide();
                } else {
                    $("#otp-error").text(response.message);
                }
            },
            error: function () {
                $("#otp-error").text("Error verifying OTP.");
            }
        });
    });
});
</script>
