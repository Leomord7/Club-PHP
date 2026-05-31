<?php
require_once 'config/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $package_name   = $_POST['package_name'];
    $member_name    = $_POST['member_name'];
    $email          = $_POST['email'];
    $contact_no     = $_POST['contact_no'];
    $address        = $_POST['address'];
    $membership_type = isset($_POST['membership_type'])
                        ? $_POST['membership_type']
                        : '';

    $start_date     = $_POST['start_date'];
    $end_date       = $_POST['end_date'];
    $transaction_id = $_POST['transaction_id'];

    $sql = "INSERT INTO membership_registrations
            (
                package_name,
                member_name,
                email,
                contact_no,
                address,
                membership_type,
                start_date,
                end_date,
                transaction_id
            )
            VALUES
            (
                '$package_name',
                '$member_name',
                '$email',
                '$contact_no',
                '$address',
                '$membership_type',
                '$start_date',
                '$end_date',
                '$transaction_id'
            )";

    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('Registration Submitted Successfully');
                window.location='member-registration.php';
              </script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CLUB THL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
   <?php include 'includes/header.php'; ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
     
   <?php include 'includes/navbar.php'; ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Member Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    
                    <li class="breadcrumb-item text-primary active" aria-current="page">registration</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<div class="col-lg-12  mb-0 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-primary text-center p-5">
                        <h1 >Registration form</h1>
                        <h5 class="mb-4">Club Membership</h5>
                        <div class="container">
                       <form id="membershipForm" method="POST" action="">
                            <div class="row g-3">
                                <div class="col-6">
    <div class="form-floating">
        <select class="form-select border-0" id="package"  name="package_name" required>
            <option value="">Select Package</option>
            <option value="Gold">Gold - ₹7,500</option>
            <option value="Premium">Premium - ₹25,000</option>
            <option value="Premium Plus">Premium Plus - ₹50,000</option>
        </select>
        <label for="package">Select Membership Package</label>
    </div>
</div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="name" placeholder="Member Name" name="member_name" required>
                                        <label for="gname">Member Name</label>
                                         
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="gmail" placeholder="Your Email"  name="email" required>
                                        <label for="gmail">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="tel"  maxlength="10"
               pattern="[0-9]{10}"
               oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control border-0" id="contact" placeholder="Contact number"  name="contact_no" required>
                                        <label for="cname">Contact number</label>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"  name="address" required></textarea>
                                        <label for="message">Address</label>
                                    </div>
                                </div>
                                <input type="hidden"
       id="hiddenTransactionId"
       name="transaction_id">
                              <div class="col-12 mt-4">
            <h4 class="text-dark">Membership Type & Period</h4>
            <hr>
        </div>

        <div class="col-md-4">
           <div class="form-check">
    <input class="form-check-input" type="checkbox" id="annualMembership" name="membership_type" value="Annual">
    <label class="form-check-label" for="annualMembership">
        Annual Membership
    </label>
</div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= date('Y-m-d') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control"  id="end_date" name="end_date">
        </div>

        <!-- Membership Note -->

        <div class="col-12">
            <div class="alert alert-warning">
                <strong>Membership Information</strong><br>
                Membership is free.<br>
                Maintenance charges ₹7500 only (Non-refundable).
            </div>
        </div>

        <!-- Rules -->

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Rules of Membership
                </div>

                <div class="card-body">
                    <ul class="mb-0">

                        <li>Booking should be done through the online application.</li>

                        <li>Club membership is valid for 1 year.</li>

                        <li>Any member violating hotel or resort rules may have their membership cancelled without notice and without refund.</li>

                        <li>Membership must be renewed before one month of expiry.</li>

                        <li>Members must inform the company before organizing any event to receive member discount rates.</li>

                        <li>For resort or hotel bookings, members may be required to complete a video verification call and submit ID proof via WhatsApp.</li>

                        <li>Members receive 10% discount on hotel, resort, or bungalow bookings.</li>

                        <li>Members may provide discount vouchers to family members or friends.</li>

                        <li>If a friend uses a member discount voucher, the member receives 50% of the voucher value.</li>

                        <li>No refund is available for booking cancellations during peak season.</li>

                        <li>Membership cancellation charges are non-refundable.</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Associate Benefits
        </div>

        <div class="card-body">
            <ol class="mb-0">
                <li class="mb-3">
                    The Associate Member has to give cash discount vouchers worth
                    30% of total bill to every Club THL member.
                </li>

                <li class="mb-3">
                    You and your family members will get 10% / 20% discount at
                    any resort, hotel and bungalow associated with the club,
                    using your card and documents.
                </li>

                <li class="mb-3">
                    We will promote you through our digital platform.
                </li>

                <li class="mb-3">
                    The club is not interested if any club member comes directly
                    to you and pays his total bill.
                </li>

                <li>
                    We are pleased to collaborate with our associate partners,
                    sharing relevant wedding and event data and offering mutual
                    support to ensure successful partnerships.
                </li>
            </ol>
        </div>
    </div>
</div>

        <!-- Acceptance -->

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accept_rules" required>
                <label class="form-check-label" for="accept_rules">
                    I have read and agree to the Membership Rules and Conditions.
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accept_rules" required>
                <label class="form-check-label" for="accept_rules">
                    I have read and agree to the Associate Benefits.
                </label>
            </div>
        </div>

        <!-- Submit -->

        <div class="col-12">
            <button type="button" class="btn btn-dark w-100 py-3"  onclick="showPaymentModal()">
                Payment
            </button>
        </div>

    </div>

</form>
        <!-- Membership Section -->

        
                        </div>
                    </div>
                </div> 
      <!-- </div> -->

  <div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title text-light">Membership Payment</h5>
                <button type="button" class="btn-close btn-close-white"
                    data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">

                <!-- QR Code -->
                <img src="img/qr-code.png"
                     alt="QR Code"
                     class="img-fluid mb-3"
                     style="max-width:250px;">

                <!-- Amount -->
                <h4>
                    Amount:
                    <span id="paymentAmount" class="text-success">
                        ₹0
                    </span>
                </h4>

                <div class="mt-4">
                    <label class="form-label fw-bold">
                        Transaction ID
                    </label>

                    <input type="text"
                           class="form-control"
                           id="transactionId"
                           placeholder="Enter UPI Transaction ID"
                            name="transaction_id"
                           required>
                </div>

                <div class="alert alert-warning mt-4 mb-0">
                    <strong>Note:</strong><br>
                    After 24 hours your membership will be activate.
                </div>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Close
                </button>

                <button type="submit"
                        class="btn btn-dark"
                        onclick="submitMembership()">
                    Submit Registration
                </button>
            </div>

        </div>
    </div>
</div>


  


    <!-- Footer Start -->
    <?php include 'includes/footer.php'; ?>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
(() => {
    'use strict';

    const form = document.getElementById('membershipForm');

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    }, false);
})();
</script>
<script>
function showPaymentModal() {
    let packageValue = document.getElementById("package").value;
    let memberName = document.getElementById("name").value.trim();
    let email = document.getElementById("gmail").value.trim();
    let contact = document.getElementById("contact").value.trim();
    let address = document.getElementById("message").value.trim();

    console.log("Package:", packageValue);
console.log("Member Name:", memberName);
console.log("Email:", email);
console.log("Contact:", contact);
console.log("Address:", address);

    // Package Validation
    if(packageValue === ""){
        alert("Please select Membership Package");
        return;
    }

    // Name Validation
    if(memberName === ""){
        alert("Please enter Member Name");
        return;
    }

    // Email Validation
    if(email === ""){
        alert("Please enter Email");
        return;
    }

    // Contact Validation
    if(contact === ""){
        alert("Please enter Contact Number");
        return;
    }

    // Address Validation
    if(address === ""){
        alert("Please enter Address");
        return;
    }

    let startDate = document.getElementById("start_date").value;
    let endDate = document.getElementById("end_date").value;

    if(startDate && endDate && endDate < startDate){
        alert("End Date cannot be less than Start Date");
        return;
    }


    // Rules validation
    let rules = document.querySelectorAll('.form-check-input[required]');
    for(let i = 0; i < rules.length; i++){
        if(!rules[i].checked){
            alert("Please accept all Terms & Conditions");
            return;
        }
    }

   
    let amount = "₹0";

    if(packageValue === "Gold"){
        amount = "₹7,500";
    }
    else if(packageValue === "Premium"){
        amount = "₹25,000";
    }
    else if(packageValue === "Premium Plus"){
        amount = "₹50,000";
    }

    document.getElementById("paymentAmount").innerText = amount;

    let paymentModal = new bootstrap.Modal(
        document.getElementById('paymentModal')
    );

    paymentModal.show();
}

function submitMembership(){

    let txnId = document.getElementById("transactionId").value;

    if(txnId.trim() === ""){
        alert("Please enter Transaction ID");
        return;
    }
    document.getElementById("hiddenTransactionId").value = txnId;

    document.getElementById("membershipForm").submit();
}
</script>

<script>
const membership = document.getElementById("annualMembership");
const startDate = document.getElementById("start_date");
const endDate = document.getElementById("end_date");

membership.addEventListener("change", function () {

    if (this.checked) {

        let today = new Date();

        let start = today.toISOString().split('T')[0];
        startDate.value = start;

        let end = new Date(today);
        end.setMonth(end.getMonth() + 12);

        endDate.value = end.toISOString().split('T')[0];

        // Prevent changes
        startDate.readOnly = true;
        endDate.readOnly = true;

    } else {
        let today = new Date();

        let start = today.toISOString().split('T')[0];

        startDate.readOnly = false;
        endDate.readOnly = false;

        startDate.value = start;
        endDate.value = "";
    }
});
</script>
</body>

</html>