<style>
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        line-height: 60px;
        /* background-image: linear-gradient(15deg, #80d0c7 0%, #13547a 100%);
        background-image: linear-gradient(15deg, #0a346d 0%, #1598ef 100%); */
        background-image: linear-gradient(15deg, #1598ef 0%, #0a346d 100%);
    }


    <?php if (isset($color)) {
        echo ('h2, h1,th {                
                color: ' . $color . ';
        }');

        echo ('#cad, .btn, #card-footer, #card-header  {                
            background-color: ' . $colorSecundaria . ';
        }');

        echo ('.bg-custom, .footer {
            background-image: linear-gradient(15deg,  ' . $colorFH . '  0%, ' . $colorSecundariaFH . ' 100%);
        }');
    } ?>
</style>
<?php
if (session()->get('isLoggedIn')) : ?>
    <footer class="footer">
        <div class="container">
            <span class="text-muted"></span>
        </div>
    </footer>
    </body>

    </html>
<?php endif; ?>