<div class="remodal" data-remodal-id="modal">
    <a data-remodal-action="close" class="remodal-close"></a>
    <!-- // order-details-form  -->
    <form class="order-details-form" id="bookingForm" name="bookingform" method="post" novalidate>
        <div class="inner-form">
            <h3>Order Form</h3>
            <div class="clearfix">
                <div id="successBooking">
                    <p>Your message was sent successfully!</p>
                </div>
                <div id="errorBooking">
                    <p>Something went wrong, try refreshing and submitting the form again.</p>
                </div>
            </div>
            <div class="inner-form__elements">
                <div class="inner-half">
                    <h5>New Reservation</h5>
                    <div class="location">
                        <input type="text" id="location1" name="location" placeholder="Your pickup location">
                        <i class="icon-placeholder-for-map"></i>
                    </div>
                    <div class="text-element stop-location">
                        <a href="#" class="add" id="add-stop"><i class="icon-plus-black-symbol"></i> <span>Click here to add a stop</span></a>
                    </div>
                    <div class="location-drop-off">
                        <input type="text" name="locationdropoff" id="location2" placeholder="Enter drop-off location">
                        <i class="icon-placeholder-for-map"></i>
                    </div>
                    <div class="text-element checkbox-div">
                        <div class="wishes">
                            <div class="box-checkbox">
                                <input type="checkbox" name="takeback" id="checkbox-01" value="yes">
                                <label for="checkbox-01">I would like the driver to wait and take me back</label>
                            </div>
                            <div class="box-checkbox">
                                <input type="checkbox" name="takeback" id="checkbox-02" value="yes">
                                <label for="checkbox-02">I would like to go by the hours</label>
                            </div>
                        </div>
                    </div>

                    <div class="inner-half__width">
                        <div class="input-date datetimepicker-wrap">
                            <input type="text" name="date" id="datetimepicker1" class="datetimepicker" placeholder="Pick-up date">
                            <i class="icon-calendar-with-a-clock-time-tools"></i>
                        </div>
                        <div class="input-time">
                            <input type="text" name="time" id="timepicker1" class="timepicker" placeholder="Pick-up time">
                            <i class="icon-clock"></i>
                        </div>
                    </div>
                    <div class="inner-half__width">
                        <div class="input-date datetimepicker-wrap">
                            <input type="text" name="date1" class="datetimepicker" id="datetimepicker2" placeholder="Drop-off date">
                            <i class="icon-calendar-with-a-clock-time-tools"></i>
                        </div>
                        <div class="input-time">
                            <input type="text" name="time1" id="timepicker2" class="timepicker" placeholder="Drop-off time">
                            <i class="icon-clock"></i>
                        </div>
                    </div>

                    <div class="select-vehicle">
                        <select name="selectvehicle">
                            <option value="Vehicle class">Vehicle class</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="passengers-luggage">
                        <div class="passengers">
                            <span>Passengers*</span>
                            <select name="passengers">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="luggage">
                            <span>Luggage*</span>
                            <select name="luggage">
                                <option value="0">0</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="carseat">
                            <span></span>
                            <div class="box-checkbox">
                                <input type="checkbox" name="carseat" id="checkbox-03" value="yes">
                                <label for="checkbox-03">Car Seat</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner-half">
                    <h5>Passenger's Contact Info</h5>
                    <div class="inner-half__width">
                        <div class="first-name">
                            <input type="text" name="firstname" placeholder="First Name*">
                        </div>
                        <div class="last-name">
                            <input type="text" name="lastname" placeholder="Last Name*">
                        </div>
                    </div>

                    <div class="inner-half__width">
                        <div class="your-phone">
                            <input type="tel" name="phone" placeholder="Your phone">
                        </div>
                        <div class="email">
                            <input type="text" name="email" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="specialreguests">
                        <textarea name="specialreguests" placeholder="Special Requests"></textarea>
                        <span class="textarea-text">(Maximum characters: 250)</span>
                    </div>
                    <div class="payment">
                        <span>Payment</span>
                        <select name="payment">
                            <option value="Pay with Cash">Pay with Cash</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Visa">Visa</option>
                            <option value="MasterCard">MasterCard</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">CONTINUE</button>
        </div>
    </form>
    <!-- // order-details-form  -->
</div>

