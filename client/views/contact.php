<style>
        .error-message {
            color: red;
            font-size: 80%;
            margin-top: 5px;
            margin-bottom: 1em;
        }
    </style>

<body>
    
<div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">HÃY LIÊN HỆ VỚI CHÚNG TÔI</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group text-dark">
                            <label for="name">Họ và Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và Tên" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group text-dark">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group text-dark">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group text-dark">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group text-dark">
                            <label for="message">Thắc mắc của bạn</label>
                            <textarea class="form-control" rows="8" id="message" name="message" placeholder="Thắc mắc của bạn" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-danger py-2 px-4" type="submit" id="sendMessageButton">Gửi Tin Nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51974.65430294727!2d105.7366667103181!3d20.60011025942087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313433272518ce69%3A0x801ec3badbb117f5!2zSMawxqFuZyBTxqFuLCBN4bu5IMSQ4bupYywgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1658632803627!5m2!1sen!2s"
                        width="100%" height="460" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+0987 333 6666</p>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Contact End -->
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("contactForm").addEventListener("submit", function (event) {
                var name = document.getElementById("name");
                var email = document.getElementById("email");
                var phone = document.getElementById("phone");
                var address = document.getElementById("address");
                var message = document.getElementById("message");

                var isValid = true;

                if (name.value.trim() === "") {
                    displayErrorMessage(name, "Vui lòng nhập họ và tên của bạn.");
                    isValid = false;
                } else {
                    hideErrorMessage(name);
                }

                if (email.value.trim() === "") {
                    displayErrorMessage(email, "Vui lòng nhập địa chỉ email của bạn.");
                    isValid = false;
                } else {
                    hideErrorMessage(email);
                }

                if (phone.value.trim() === "") {
                    displayErrorMessage(phone, "Vui lòng nhập số điện thoại của bạn.");
                    isValid = false;
                } else {
                    hideErrorMessage(phone);
                }

                if (address.value.trim() === "") {
                    displayErrorMessage(address, "Vui lòng nhập địa chỉ của bạn.");
                    isValid = false;
                } else {
                    hideErrorMessage(address);
                }

                if (message.value.trim() === "") {
                    displayErrorMessage(message, "Vui lòng nhập nội dung tin nhắn của bạn.");
                    isValid = false;
                } else {
                    hideErrorMessage(message);
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });

            function displayErrorMessage(element, message) {
                var errorElement = document.createElement("p");
                errorElement.className = "error-message";
                errorElement.textContent = message;

                var existingErrorMessage = element.nextElementSibling;
                if (existingErrorMessage && existingErrorMessage.className === "error-message") {
                    existingErrorMessage.textContent = message;
                } else {
                    element.parentNode.insertBefore(errorElement, element.nextElementSibling);
                }
            }

            function hideErrorMessage(element) {
                var existingErrorMessage = element.nextElementSibling;
                if (existingErrorMessage && existingErrorMessage.className === "error-message") {
                    existingErrorMessage.parentNode.removeChild(existingErrorMessage);
                }
            }
        });
    </script>

  


 