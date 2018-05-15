<header class="main-header">
    <?php
      require_once ("../../controller/cMenu.php");
  
      $codigoUsuario = $_SESSION["usuario"];
  
      $result = $Usuario->GetUsuarioByCodigoUsuario($codigoUsuario);
  
      while($dataResult = $result->fetch(PDO::FETCH_OBJ)) {
        
        $nomeUsuario = $dataResult->NOME;
  
        $cargoUsuario = $dataResult->FUNCAO;
  
        $imagemUsuario = $dataResult->IMAGEM;

        $imagemUsuario = "../../".$imagemUsuario;

        $dataInclusaoUsuario = $dataResult->DATA_INCLUSAO;
      }
  
    ?>

        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                <b>S</b>G E</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <b>Smart</b> Gestão</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less -->
                    <!-- 
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data 
                  <ul class="menu">
                    <li><!-- start message 
                      <a href="#">
                        <div class="pull-left">
                          <img src="#" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message 
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          AdminLTE Design Team
                          <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Developers
                          <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Sales Department
                          <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Reviewers
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            -->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!--
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data 
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            -->
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!--
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data 
                  <ul class="menu">
                    <li><!-- Task item 
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item 
                    <li><!-- Task item 
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item 
                    <li><!-- Task item 
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item 
                    <li><!-- Task item 
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item 
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $imagemUsuario ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php echo $nomeUsuario ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $imagemUsuario ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php 
                      echo ("$nomeUsuario"); 
                      echo ("<small>Membro Desde $dataInclusaoUsuario</small>");
                    ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="controller/cLogout.php" class="btn btn-default btn-flat" id="logout">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar">
                            <i class="fa fa-gears"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $imagemUsuario ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo $nomeUsuario ?>
                </p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Procurar...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU NAVEGAÇÃO</li>
            <!--
              <li class="treeview"><a href="#"> <i class="fa  fa-dollar"></i> <span>Venda</span>
                      <span class="pull-right-container"> <i
                          class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
          <li><a href="?menu=create_sale"><i class="fa fa-circle-o"></i>
                              Criar Venda</a></li>
                      <li><a href="?menu=venda&acao=venda_lista"><i class="fa fa-circle-o"></i>
                              Vendas</a></li>
            <li><a href="?menu=add_product_sale"><i class="fa fa-circle-o"></i>
                              Add Produto</a></li>
                  </ul>
      
          <li class="treeview"><a href="#"> <i class="fa fa-cubes"></i> <span>Estoque</span>
                      <span class="pull-right-container"> <i
                          class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
                      <li><a href="?menu=estoque&acao=estoque_listar"><i class="fa fa-circle-o"></i>
                              Estoque Atual</a></li>
                  </ul></li>
        -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Cliente</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="?menu=cad_cliente">
                            <i class="fa fa-circle-o"></i>
                            Cadastro</a>
                    </li>
                    <li>
                        <a href="?menu=list_cliente">
                            <i class="fa fa-circle-o"></i>
                            Clientes</a>
                    </li>
                </ul>
            </li>
            <!--
              <li class="treeview"><a href="#"> <i class="fa fa-truck"></i> <span>Fornecedor</span> <span class="pull-right-container"> <i
                          class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
                      <li><a href="?menu=fornecedor&acao=fornecedorlistar"><i class="fa fa-circle-o"></i>
                              Fornecedores</a></li>
                      <li><a href="?menu=fornecedorcadastro&acao=fornecedorlistar"><i class="fa fa-circle-o"></i>
                              Cadastro</a></li>
                  </ul></li>
                  
                  <li class="treeview"><a href="#"> <i class="fa fa-cube"></i> <span>Produto</span> <span class="pull-right-container"> <i
                          class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
                      <li><a href="?menu=produto_lista&acao=produto_lista"><i class="fa fa-circle-o"></i>
                              Produtos</a></li>
                      <li><a href="?menu=produto_cadastro"><i class="fa fa-circle-o"></i>
                              Cadastro</a></li>
                  </ul></li>
                  
          <li class="treeview"><a href="#"> <i class="fa fa-cube"></i> <span>Recebimento</span> <span class="pull-right-container"> <i
                          class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
                      <li><a href="?menu=criar_recebimento"><i class="fa fa-circle-o"></i>
                              Criar Recebimento</a></li>
                      <li><a href="?menu=produto_cadastro"><i class="fa fa-circle-o"></i>
                              Cadastro</a></li>
                  </ul></li>
        -->
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-user-plus">
                    </i>
                    <span>
                        Usuário
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="?menu=cad_usuario">
                            <i class="fa fa-circle-o"></i>
                            Cadastro</a>
                    </li>
                    <li>
                        <a href="?menu=list_usuario">
                            <i class="fa fa-circle-o"></i>
                            Usuários</a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Propriedade</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="?menu=cad_propriedade">
                            <i class="fa fa-circle-o"></i>
                            Cadastro Propriedade</a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li>
                        <a href="?menu=list_propriedade">
                            <i class="fa fa-circle-o"></i>
                            Propriedades</a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li>
                        <a href="?menu=link_image">
                            <i class="fa fa-circle-o"></i>
                            Vincular Imagem</a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li>
                        <a href="?menu=edit_image">
                            <i class="fa fa-circle-o"></i>
                            Editar Imagem</a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>