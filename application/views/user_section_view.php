<?php if(isset($user)): ?>
    <div class="col-12 bg-info pt-3 pb-2">
        <h3 class="text-white">Hello <?php echo $user->name; ?>!</h3>
        <p class="text-small text-white">Delivery Address <?php echo $user->address; ?></p>
    </div>
<?php else: ?>
    <div class="col-12">
        <h3><button class="btn btn-link" onclick="newuser();">New User?</button><button class="btn btn-link" onclick="olduser();">Returning User</button></h3>
        <div class="register_user row d-none">
            <div class="col-12">
                <div class="form-group name">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your Phone">
                </div>
                <div class="form-group address">
                    <label for="address">Address</label>
                    <textarea type="address" class="form-control" id="address" name="address" placeholder="Enter your address">

                    </textarea>
                </div>
                <button type="button" id="btnRegisterUser" class="btn btn-primary">Register</button>    
            </div>
        </div> <!-- register_user -->
    </div>
<?php endif; ?>