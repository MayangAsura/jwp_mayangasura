

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> New Password </title>

        <style>

            @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format('ttf'), url(../font/Nunito-Regular.ttf) format('truetype')
            }

            html {
                position: relative;
                /* min-height: 100%; */
                font-family: Nunito
            }


            table{
                border-collapse: separate;
                border-spacing: 10px; 
            }

            td {
            border: 2px solid black;
            /* margin: 50px; */
            /* padding: 30px; */
            }

            h2 {
                text-align: center;
            }
            .text-center{
                text-align: center;
            }

            
        </style>
    </head>
    <body>
        
        <div style="text-align:center">
            <h3>Hello <?= $data['name'] ?>!, Your password was reset</h3>
            <p>Your new password is 
                <h3> <b> <?= $data['password'] ?> </b> </h3>
            </p>

            
        </div>

    </body>
</html>