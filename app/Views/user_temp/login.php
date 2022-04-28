<div class="login-body">
    <div>
        <?php if(session()->get('success')){?>
            <p><?=session()->get('success')?></p>
        <?php }?>
        <div class="main-cont">
            <h2>LOG IN</h2>
            <form action="/" method="POST">
                <input type="email" placeholder="Email" name="email"  value="<?= set_value('email')?>"class="input-login">
                <input type="password" placeholder="Password" name="password" class="input-login">
                <button type="submit" class="login-btn">Log In</button>
            </form>
            <?php
                if(isset($validation)){
            ?>
                <?= $validation->listErrors()?>
            <?php    
                }
            ?>
        </div>
        <h3>Not a user yet? <a href="/register">Register Here</a></h3>
    </div>    
</div>