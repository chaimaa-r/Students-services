<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
    <style>
        
        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        
        .banner{
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(pngtree-illustration-of-a-flying-graduation-cap-in-3d-render-celebratory-banner-image_3634765.jpg);
            background-size: cover;
            background-position: center;
        }

        
        .navbar{
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        
        .logo{
            width: 120px;
            height: 120px;
            cursor: pointer;
            
        }

        
        .navbar ul li{
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

       
        .navbar ul li a{
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
        }

       
        .navbar ul li::after{
            content: '';
            height: 3px;
            width: 0%;
            background: #009688;
            position: absolute;
            left: 0;
            bottom: -10px;
            transition: 0.5s;
        }

        .navbar ul li:hover::after{
            width: 100%;
        }

       
        .content{
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            color: #fff;
        }

      
        .content h1{
            font-size: 70px;
            margin-top: 60px;
            margin-bottom:30px;
        }

       
        .content p{
            margin: 20px auto;
            font-weight: 100;
            line-height: 25px;
        }

        
        button{
            width: 200px;
            padding: 15px 0;
            text-align: center;
            margin: 20px 10px;
            border-radius: 25px;
            font-weight: bold;
            border: 2px solid #d5bdaf;
            background: transparent;
            color: #fff ;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        
        span{
            background: #d5bdaf;
            height: 100%;
            width: 0%;
            border-radius: 25px;
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: 0.5s;
        }

        button:hover span{
            width: 100%;
        }

        button:hover{
            border: none;
        }
    </style>
</head>
<body>
   
    <div class="banner">
        
        <div class="navbar">
            
            <a href="acceuill.php"><img src="Capture_d_écran_2024-12-03_011855-removebg-preview.png" class="logo"></a>
        </div>
    
        <div class="content">
           
            <h1>Bienvenue dans E-Services</h1>
            
            <div>
                <a href="etudient/Student.php"><button type="button"><span></span>Etudiant</button></a>
                <a href="administrateur/connexion.php"><button type="button"><span></span>Administrateur</button></a>
            </div> 
        </div>
    </div>
</body>
</html>
