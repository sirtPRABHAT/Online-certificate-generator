<!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="changepassword">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">Change Your Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
            <div class="modal-body">
                <form action="dashboard.php" method="post">
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email"  name="email" class="form-control" id="inputEmail" value="<?php echo $_SESSION['login_user'];?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">New Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" onkeyup='check();' pattern="{.4,}" class="form-control" id="password" placeholder="Password" required>   
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="confirm_password" onkeyup='check();' pattern="{.4,}" class="form-control" id="confirm_password" placeholder="Password" required>   
                            <span id='message'></span>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-lg" name="changeuser_password">Submit</button>
                </form>
            </div>
<!------------------------------------------- Modal footer ---------------------------------------->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-----------------------------------------Modal Ends------------------------------------------------>