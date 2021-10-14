<!DOCTYPE html>
<html lang="en" ng-app="myapp" ng-controller="usercontroller">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/fonts') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url("assets/js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js") ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/validations.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
  
  <title>Livros</title>
  <script>
    $(document).ready(function() {
            $('#cpf').mask('000.000.000-00', {
                reverse: true
            });
        });
  </script> 
</head>

<div id="loading"><img src="<?= base_url('assets/img/load-page.gif') ?>"></div>
<div id="msg_erro"><i class="fas fa-exclamation-triangle"></i> Um ou mais campos obrigatorios, não foram preenchidos corretamente</div>
<div id="msg_cad"><i class="fas fa-check-circle"></i> Cadastrado com sucesso!</div>
<div id="msg_cpf"><i class="fas fa-exclamation-triangle"></i> CPF ja cadastrado em outra inscrição</div>

<div class="mainheader">
  <div class="logocontainer">
    <a href="<?=base_url('home')?>">
    HOME
    </a>
  </div>
  <div class="d-flex justify-content-end ml-auto p-2 bd-highlight">
    <div id="icon_login">
      <?php if (isset($_SESSION['logged'])) {
      ?>
        <a href="<?= base_url('./Logoff') ?>" class="btnadmin"><i class="fas fa-sign-out-alt"></i></a>
      <?php
      } else {
      ?>
        <button type="button" class="ml-auto p-2 bd-highlight btnadmin btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-sign-in-alt"></i>
        </button>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<div id="content">
  <?= $contents ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('home/authentication') ?>">
          <input class="loginadmin" id="user" name="user" type="text" placeholder="Usuario"><br>
          <input class="loginadmin" id="password" name="password" type="password" placeholder="Senha">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
