
                <div class="container hidden-lg hidden-md visible-xs visible-sm">
                    <h1>Rent A Cars</h1>
                    <div class="swiper-container swiper-container-blog">
                        <div class="swiper-wrapper gallery">

                            <?php
                            $RENT_A_CARS = RentACar::all();

                            foreach ($RENT_A_CARS as $key => $car) {
                                if ($key < 6) {
                                    $RENT_A_CAR_PHOTOS = RentACarPhoto::getRentACarPhotosByRentACar($car['id']);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="gallery__item">
                                            <figure class="gallery__item__image">
                                                <?php
                                                foreach ($RENT_A_CAR_PHOTOS as $key => $img) {
                                                    if ($key === 0) {
                                                        ?>
                                                        <img src="upload/rent-car-photos/thumb/<?php echo $img['image_name'] ?>" alt=""/>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </figure>
                                            <div class="gallery__item__content">
                                                <h6><a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" title="<?php echo $car['name']; ?>"><?php
                                                        if (strlen($car['name']) > 26) {
                                                            echo substr($car['name'], 0, 23) . '...';
                                                        } else {
                                                            echo $car['name'];
                                                        }
                                                        ?></a></h6>
                                                <ul class = "tt-list-descriptions">
                                                    <li>
                                                        <i class = "tt-icon icon-car"></i>
                                                        Vehicle Type: <span>
                                                            <?php
                                                            foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                                if ($key == $car['mainTypes']) {
                                                                    echo $VEHICLE_TYPE;
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class = "tt-icon icon-logo"></i>
                                                        Request Type: 
                                                        <?php
                                                        foreach (VehicleType::requestTypes() as $key => $REQUEST_TYPE) {
                                                            if ($key == $car['requestTypes']) {
                                                                ?>
                                                                <span title="<?php echo $REQUEST_TYPE; ?>">
                                                                    <?php
                                                                    if (strlen($REQUEST_TYPE) > 21) {
                                                                        echo substr($REQUEST_TYPE, 0, 20) . '...';
                                                                    } else {
                                                                        echo $REQUEST_TYPE;
                                                                    }
                                                                    ?>
                                                                </span>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </li>
                                                    <li>
                                                        <i class = "tt-icon icon-manual_g"></i>
                                                        Fuel Type: <span>
                                                            <?php
                                                            foreach (VehicleType::fuelTypes() as $key => $FUEL_TYPE) {
                                                                if ($key == $car['fuelType']) {
                                                                    echo $FUEL_TYPE;
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </li>
                                                    <li class="icon-list">
                                                        <ul class="inline">
                                                            <li title="Passengers">
                                                                <i class = "tt-icon icon-group"></i>
                                                                <span><?php echo $car['noOfPassengers']; ?></span>
                                                            </li>
                                                            <li title="Baggages">
                                                                <i class = "tt-icon icon-luggage"></i>
                                                                <span><?php echo $car['noOfBaggage']; ?></span>
                                                            </li>
                                                            <li title="Doors">
                                                                <i class = "tt-icon icon-car-door"></i>
                                                                <span><?php echo $car['noOfDoors']; ?></span>
                                                            </li>
                                                            <li title="Air Conditioned">
                                                                <i class = "tt-icon icon-snowflake"></i>
                                                                <span>
                                                                    <?php
                                                                    if ($car['airConditioned'] == 1) {
                                                                        echo 'Yes';
                                                                    } else {
                                                                        echo 'No';
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </li>
                                                        </ul>


                                                    </li>

                                                </ul>
                                                <a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" class="btn">View More</a></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-blog"></div>
                        
                    </div>
                    <span class="swiper-button-next2 swiper-button-next"><i class="icon-left-arrow2"></i></span>
                    <span class="swiper-button-prev2 swiper-button-prev"><i class="icon-left-arrow"></i></span>
                </div>
                
                <div class="container hidden-xs hidden-sm">
                    <h1>Rent A Cars</h1>
                    <div class="swiper-container swiper-container-blog">
                        <div class="swiper-wrapper gallery">

                            <?php
                            $RENT_A_CARS = RentACar::all();

                            foreach ($RENT_A_CARS as $car) {
                                    $RENT_A_CAR_PHOTOS = RentACarPhoto::getRentACarPhotosByRentACar($car['id']);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="gallery__item">
                                            <figure class="gallery__item__image">
                                                <?php
                                                foreach ($RENT_A_CAR_PHOTOS as $key => $img) {
                                                    if ($key === 0) {
                                                        ?>
                                                        <img src="upload/rent-car-photos/thumb/<?php echo $img['image_name'] ?>" alt=""/>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </figure>
                                            <div class="gallery__item__content">
                                                <h6><a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" title="<?php echo $car['name']; ?>"><?php
                                                        if (strlen($car['name']) > 26) {
                                                            echo substr($car['name'], 0, 23) . '...';
                                                        } else {
                                                            echo $car['name'];
                                                        }
                                                        ?></a></h6>
                                                <ul class = "tt-list-descriptions">
                                                    <li>
                                                        <i class = "tt-icon icon-car"></i>
                                                        Vehicle Type: <span>
                                                            <?php
                                                            foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                                if ($key == $car['mainTypes']) {
                                                                    echo $VEHICLE_TYPE;
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class = "tt-icon icon-logo"></i>
                                                        Request Type: 
                                                        <?php
                                                        foreach (VehicleType::requestTypes() as $key => $REQUEST_TYPE) {
                                                            if ($key == $car['requestTypes']) {
                                                                ?>
                                                                <span title="<?php echo $REQUEST_TYPE; ?>">
                                                                    <?php
                                                                    if (strlen($REQUEST_TYPE) > 21) {
                                                                        echo substr($REQUEST_TYPE, 0, 20) . '...';
                                                                    } else {
                                                                        echo $REQUEST_TYPE;
                                                                    }
                                                                    ?>
                                                                </span>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </li>
                                                    <li>
                                                        <i class = "tt-icon icon-manual_g"></i>
                                                        Fuel Type: <span>
                                                            <?php
                                                            foreach (VehicleType::fuelTypes() as $key => $FUEL_TYPE) {
                                                                if ($key == $car['fuelType']) {
                                                                    echo $FUEL_TYPE;
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </li>
                                                    <li class="icon-list">
                                                        <ul class="inline">
                                                            <li title="Passengers">
                                                                <i class = "tt-icon icon-group"></i>
                                                                <span><?php echo $car['noOfPassengers']; ?></span>
                                                            </li>
                                                            <li title="Baggages">
                                                                <i class = "tt-icon icon-luggage"></i>
                                                                <span><?php echo $car['noOfBaggage']; ?></span>
                                                            </li>
                                                            <li title="Doors">
                                                                <i class = "tt-icon icon-car-door"></i>
                                                                <span><?php echo $car['noOfDoors']; ?></span>
                                                            </li>
                                                            <li title="Air Conditioned">
                                                                <i class = "tt-icon icon-snowflake"></i>
                                                                <span>
                                                                    <?php
                                                                    if ($car['airConditioned'] == 1) {
                                                                        echo 'Yes';
                                                                    } else {
                                                                        echo 'No';
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </li>
                                                        </ul>


                                                    </li>

                                                </ul>
                                                <a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" class="btn">View More</a></div>
                                        </div>
                                    </div>
                                    <?php
                            }
                            ?>
                        </div>
                    </div>
                    <span class="swiper-button-next2 swiper-button-next"><i class="icon-left-arrow2"></i></span>
                    <span class="swiper-button-prev2 swiper-button-prev"><i class="icon-left-arrow"></i></span>
                </div>