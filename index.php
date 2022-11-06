<?php
require("inserir.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>
    /* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #4070f4;
    }

    .container {
        position: relative;
        max-width: 900px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .container header {
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .container header::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 80px;
        border-radius: 8px;
        background-color: #4070f4;
    }

    .container form {
        margin-top: 16px;
        min-height: 490px;
        background-color: #fff;
        overflow: hidden;
    }

    .container form .form {
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }

    .container form .form.second {
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }

    form.secActive .form.second {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }

    form.secActive .form.first {
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }

    .container form .title {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }

    .container form .fields {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form .fields .input-field {
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }

    .input-field label {
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field input,
    select {
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }

    .input-field input :focus,
    .input-field select:focus {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
    }

    .input-field select,
    .input-field input[type="date"] {
        color: #707070;
    }

    .input-field input[type="date"]:valid {
        color: #333;
    }

    .container form button,
    .backBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .container form .btnText {
        font-size: 14px;
        font-weight: 400;
    }

    form button:hover {
        background-color: #265df2;
    }

    form button i,
    form .backBtn i {
        margin: 0 6px;
    }

    form .backBtn i {
        transform: rotate(180deg);
    }

    form .buttons {
        display: flex;
        align-items: center;
    }

    form .buttons button,
    .backBtn {
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form {
            overflow-y: scroll;
        }

        .container form::-webkit-scrollbar {
            display: none;
        }

        form .fields .input-field {
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 550px) {
        form .fields .input-field {
            width: 100%;
        }

    }

    .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .popup{
        width: 350px;
        height: 280px;
        padding: 30px 20px;
        background: #f2f2f2;
        border-radius: 10px;
        box-sizing: border-box;
        z-index: 999;
        text-align: center;
        opacity: 0;
        top: -200%;
        transform: translate(-50%, -50%) scale(0.5);
        transition: opacity 300ms ease-in-out,
                        top 1000ms ease-in-out,
                  transform 1000ms ease-in-out;
    }

    .popup.active{
        opacity: 1;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
        transition: transform 300ms cubic-bezier(0.18, 0.89, 0.43, 1.19);
    }

    .popup .icon{
        margin: 5px 0px;
        width: 50px;
        height: 50px;
        border: 2px solid #34f234;
        text-align: center;
        display: inline-block;
        border-radius: 50%;
        line-height: 60px;
    }

    .popup .icon i.fa{
        font-size: 30px;
        color: #34f234;
    }

    .popup .title{
        margin: 5px 0px;
        font-size: 30px;
        font-weight: 600;
    }

    .popup .description{
        color: #222;
        font-size: 15px;
        padding: 5px;
    }

    .popup .dismiss-btn{
        margin-top: 15px;

    }

    .popup .dismiss-btn button{
        padding: 10px 20px;
        background: #111;
        color: #f5f5f5;
        border: 2px solid #111;
        font-size: 16px;
        font-weight: 600;
        outline: none;
        border-radius: 10px;
        transition: all 300ms ease-in-out;
    }

    .popup .dismiss-btn button:hover{
        color: #111;
        background: #f5f5f5;
    }


</style>
<title>Web Service</title>
</head>

<body>
    <div class="container">
        <header>Cadastrar Dados</header>

        <form action="" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Informações</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Descrição</label>
                            <input type="text" name="desc" required>
                        </div>

                        <div class="input-field">
                            <label>Tipo do Cliente</label>
                            <input type="text" name="client" required>
                        </div>

                        <div class="input-field">
                            <label>CPF</label>
                            <input type="text" name="cpf" required>
                        </div>

                        <!-- Button trigger modal -->
                        <button id="open-popup-btn" type="submit" class="submit" name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="btnText">Enviar</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>

        </form>

        <div class="popup center">    
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <div class="title">
                Dados Enviados!
            </div>
            <div class="description">
                Os dados cadastrados foram enviados para o banco de dados com sucesso!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        /*const form = document.querySelector("form"),
            nextBtn = form.querySelector(".nextBtn"),
            backBtn = form.querySelector(".backBtn"),
            allInput = form.querySelectorAll(".first input");


        nextBtn.addEventListener("click", () => {
            allInput.forEach(input => {
                if (input.value != "") {
                    form.classList.add('secActive');
                } else {
                    form.classList.remove('secActive');
                }
            })
        });

        backBtn.addEventListener("click", () => form.classList.remove('secActive'));*/
        
        document.getElementById("open-popup-btn").addEventListener("click", function(){
            document.getElementsByClassName("popup")[0].classList.add("active");
        });

        document.getElementById("dismiss-popup-btn").addEventListener("click", function(){
            document.getElementsByClassName("popup")[0].classList.remove("active");
        });

        
    </script>
</body>

</html>
