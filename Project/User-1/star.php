<html>
    <head>
        <title>Rating</title>        
        <link rel="stylesheet" href="../Assets/Template/Homepage-User/css/style-starter.css">
        <style>
            .checked{
                color:orange;
            }
            .unchecked{
	            color:#e9ecef;
            }
        </style>
    </head>
    <body>
        <div class="rating">
            <?php 
                $s=0;
                $n=3;           
                while($s<$n)
                { ?>
                <span class="fa fa-star checked"></span>
                <?php
                $s++;
                }
                while($s<5)
                { ?>
                <span class="fa fa-star unchecked"></span>
                <?php
                $s++;
                }

            ?>
        </div>
    </body>
</html>